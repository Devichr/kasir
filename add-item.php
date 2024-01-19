<?php
include __DIR__ .'/./function/functions.php';

$connect = connect();




if (isset($_POST['add'])) {
    $allowed = array('jpg', 'png');
    $namaproduk = $_POST['nama_produk'];
    $hargaproduk = $_POST['harga_produk'];
    $stok = $_POST['stok_produk'];
    $file_name = $_FILES['gambar_produk']['name'];
    $x = explode('.', $file_name);
    $extension = strtolower(end($x));
    $size = $_FILES['gambar_produk']['size'];
    $tmp = $_FILES['gambar_produk']['tmp_name'];

    if (in_array($extension, $allowed) === true) {
        if ($size < 5120000) {
            $file_name = uniqid(). '.'. $extension;
            $file_path = 'asset/'. $file_name;
            move_uploaded_file($tmp, $file_path);
            $additem = additem($namaproduk, $hargaproduk, $stok, $file_name);
            header ("location:item.php");
        } else {
            echo "File size is too big";
        }
    } else {
        echo "File extension is not allowed";
    }
    
}
?>
<a href="item.php">BACK</a>
<div class="form">
    <div class="form-wrap">
<form action="add-item.php" method="post" enctype="multipart/form-data">
    Nama Produk <br>
    <input type="text" name="nama_produk" id=""><br>
    Harga <br>
    <input type="number" name="harga_produk" id=""><br>
    Stok <br>
    <input type="number" name="stok_produk" id=""><br>
    Gambar <br>
    <input type="file" name="gambar_produk" id=""><br>
    <input type="submit" name="add" value="Add">
</form>
</div>
</div>