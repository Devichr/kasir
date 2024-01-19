<?php
include __DIR__ .'/./function/functions.php';

$connect = connect();



if (isset($_POST['Update'])) {
    $allowed = array('jpg', 'png');
    $namaproduk = $_POST['nama_produk'];
    $hargaproduk = $_POST['harga_produk'];
    $stok = $_POST['stok_produk'];
    $old = $_POST['gambar_produk_lama'];
    $idproduk = $_POST['id_produk'];
    $file_name = $_FILES['gambar_produk']['name'];
    $x = explode('.', $file_name);
    $extension = strtolower(end($x));
    $size = $_FILES['gambar_produk']['size'];
    $tmp = $_FILES['gambar_produk']['tmp_name'];

    if ($file_name == '') {
        $file_name = $old;
        $updateitem = updateproduk($idproduk, $namaproduk, $hargaproduk, $stok, $file_name);
        header ("location:item.php");
    }else if (in_array($extension, $allowed) === true) {
            if ($size < 5120000) {
                $file_name = uniqid(). '.'. $extension;
                $file_path = 'asset/'. $file_name;
                move_uploaded_file($tmp, $file_path);
                $updateitem = updateproduk($idproduk, $namaproduk, $hargaproduk, $stok, $file_name);
                header ("location:item.php");
            } else {
                echo "File size is too big";
            }
        } else {
            echo "File extension is not allowed";
        }
    }

    $find = findproduk();
?>
<a href="item.php">BACK</a>
<?php while ($data = mysqli_fetch_assoc($find)) { ?>
<div class="form">
    <div class="form-wrap">
<form action="update-item.php?id=<?php echo $_GET['id'] ?>" method="post" enctype="multipart/form-data">
    Nama Produk <br>
    <input type="text" name="nama_produk" id="" value="<?php echo $data['nama_produk']  ?>"><br>
    Harga <br>
    <input type="number" name="harga_produk" id="" value="<?php echo $data['harga_produk']  ?>"><br>
    Stok <br>
    <input type="number" name="stok_produk" id="" value="<?php echo $data['stok_produk']  ?>"><br>
    Gambar <br>
    <input type="file" name="gambar_produk" id=""><br>
    <input type="hidden" name="id_produk" id="" value="<?php echo $data['id_produk']  ?>"><br>
    <input type="hidden" name="gambar_produk_lama" id="" value="<?php echo $data['gambar']  ?>"><br>
    <input type="submit" name="Update" value="Update">
</form>
<?php }?>

</div>
</div>