<?php 
        if (!isset($_SESSION)) {
            session_start();
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEVSTORE</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <?php 
include __DIR__ .'/./function/functions.php';

$connect = connect();
$show = showprod();

        if (isset($_GET['act'])) {
            $act = $_GET['act'];
            if ($act == "delete") {
                $del = deleteproduk();
                header('Location:item.php');
            }
        }
    ?>
<div class="top-section">
<button class="toggle" onclick="toggle()">=</button>
<h3>DEVSTORE</h3>
</div>
<nav id="nav">
<ul>
    <hr class="nav-separator">
    <li><a href="index.php">Sales</a></li>
    <hr class="nav-separator">
    <li><a href="receive.php">Receive</a></li>
    <hr class="nav-separator">
    <li><a href="item.php">Stock Opname</a></li>
    <hr class="nav-separator">
</ul>
</nav>
<div class="cover"></div>
<div class="item-section">
    <a href="add-item.php" class="add-btn">Add New</a>
    <div class="itemlist">
        <table style="border-collapse:collapse; width:98vw; margin-top:10px;">
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Opsi</th>
            </tr>
            <?php
            $no=1;
            while ($data = mysqli_fetch_assoc($show)) {
                ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><img src="asset/<?php echo $data['gambar'] ?>" alt="" class="product-img"></td>
                <td><?php echo $data['nama_produk'] ?></td>
                <td><?php echo $data['stok_produk'] ?></td>
                <td> Rp<?php echo number_format($data['harga_produk']) ?></td>
                <td>
                    <a class="option-btn" href="update-item.php?id=<?php echo $data['id_produk'] ?>">Update</a>
                    <a class="option-btn" href="item.php?act=delete&amp;id=<?php echo $data['id_produk'] ?>">Delete</a>
                </td>
            </tr>
            <?php }?>
        </table>
    </div>
</div>