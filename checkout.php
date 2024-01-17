<?php
    session_start();
    include __DIR__ .'/./function/functions.php';

    $konek = connect();
    
    date_default_timezone_set("Asia/Jakarta");
    $tg = date("Y-m-d-h-m-s");

    $sql = "INSERT INTO pesanan(tanggal_pesanan) VALUES('$tg')";
    $pesanan = mysqli_query($konek, $sql);
    $id_t = mysqli_insert_id($konek);
    

    foreach($_SESSION['items'] as $key => $val){
        $query = mysqli_query ($konek,"SELECT * FROM produk WHERE id_produk = '$key'");
        $result = mysqli_fetch_array ($query);
        $subtotal= $result['harga_produk'] * $val;
        $sql = "INSERT INTO detailpesanan(id_pesanan, id_produk,qty,Harga) VALUES(".$id_t.",".$key.",".$val.",".$subtotal.")";
        $db = mysqli_query($konek, $sql);
    }

    unset($_SESSION["items"]);

    header("location: index.php");
?>