<?php 
    function connect(){
        $hostname = "localhost";
        $user = "root";
        $password = "";
        $database = "kasir";
    
        $connect = mysqli_connect($hostname, $user, $password, $database);
        return $connect;
    }

    function createDB(){
        $conn = connect();
        $query = "CREATE DATABASE kasir";
        $db = mysqli_query($conn, $query);
        return $db;
    }

    function createTB(){
        $connect = connect();
        $query = "CREATE TABLE detailpesanan(
            id_detailpesanan INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
            id_pesanan INT NOT NULL,
            id_produk INT NOT NULL,
            qty INT NOT NULL
        )";
        $db = mysqli_query($connect, $query);
        return $db;
    }

    function showprod(){
        $connect = connect();
        $query = "SELECT * FROM produk";
        $db = mysqli_query($connect, $query);
        return $db;
    }
    function addtocart(){
        
        if (isset($_GET['id'])) {
            $barang_id = $_GET['id'];
            if (isset($_SESSION['items'][$barang_id])) {
               return $_SESSION['items'][$barang_id] += 1;
            } else {
             return $_SESSION['items'][$barang_id] = 1; 
            }
        }

    }

    function plus(){
        if (isset($_GET['id'])) {
            $barang_id = $_GET['id'];
            if (isset($_SESSION['items'][$barang_id])) {
               return $_SESSION['items'][$barang_id] += 1;
            }
        }
    }
    function minus(){
        if (isset($_GET['id'])) {
           $barang_id = $_GET['id'];
            if (isset($_SESSION['items'][$barang_id])) {
             return   $_SESSION['items'][$barang_id] -= 1;
            }
        }
    }
    function delete(){
        if (isset($_GET['id'])) {
             $barang_id = $_GET['id'];
            if (isset($_SESSION['items'][$barang_id])) {
                unset($_SESSION['items'][$barang_id]);
            }
        }
    }
    function updatestokadd(){
        $conn = connect();
        if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM produk WHERE id_produk='$id'";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($result);
        $stok = $data['stok_produk'];
        $sisa = $stok-1;
        $query = "UPDATE produk SET stok_produk='$sisa' WHERE id_produk='$id' ";
        $upstok = mysqli_query($conn,$query);
        return $upstok;
    }

    }
    function updatestokmin(){
        $conn = connect();
        if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM produk WHERE id_produk='$id'";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($result);
        $stok = $data['stok_produk'];
        $sisa = $stok+1;
        $query = "UPDATE produk SET stok_produk='$sisa' WHERE id_produk='$id' ";
        $upstok = mysqli_query($conn,$query);
        return $upstok;
    }

    }

    function updatestokdel(){
        $conn = connect();
        if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM produk WHERE id_produk='$id'";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($result);
        $stok = $data['stok_produk'];
        $sisa = $stok+$_SESSION['items'][$id];
        $query = "UPDATE produk SET stok_produk='$sisa' WHERE id_produk='$id' ";
        $upstok = mysqli_query($conn,$query);
        return $upstok;
        }
    }
    function updatestokclear(){
        $conn = connect();
        if(isset($_SESSION['items'])){
        foreach ($_SESSION['items'] as $key => $val) {
        $sql = "SELECT * FROM produk WHERE id_produk='$key'";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($result);
        $stok = $data['stok_produk'];
        $sisa = $stok+$val;    
        $query = "UPDATE produk SET stok_produk='$sisa' WHERE id_produk='$key' ";
        $upstok = mysqli_query($conn,$query);
        return $upstok;
        }
        }
    }

    function additem($namaproduk, $hargaproduk, $stok, $file_name){
        $conn = connect();
        $query = "INSERT INTO produk(nama_produk, harga_produk, stok_produk , gambar) VALUES('$namaproduk','$hargaproduk','$stok','$file_name')";
        $result = mysqli_query($conn,$query);
        return $result;
    }

    function deleteproduk(){
        $conn = connect();
        $id = $_GET["id"];
        $query = "DELETE FROM produk WHERE id_produk=$id ";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    function findproduk(){
        $id = $_GET['id'];
        $conn = connect();
        $query = "SELECT * FROM produk WHERE id_produk='$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    function updateproduk($idproduk, $namaproduk, $hargaproduk, $stok, $file_name){
        $conn = connect();
        $id = $_GET['id'];
        $query = "UPDATE produk set nama_produk='$namaproduk', harga_produk='$hargaproduk', stok_produk='$stok', gambar='$file_name' WHERE id_produk = '$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

?>