<?php 
    session_start();
    include __DIR__ .'/./function/functions.php';

    $konek = connect();
    $total=0;
    $no = 1;
    $payment = $_POST['payment'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pembelian</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-color:rgb(238, 235, 235);">
    
<div class="container-receipt">
    <div class="wrap-receipt">
    <div class="receipt" id="receipt">
        <h1><center>DEVSTORE</center></h1>
        <h2><center>Jl Antariksa Pluto no 69</center></h2><br>
        <hr>
        <table style="border-collapse:collapse;">
            <tr>
            <th style="width:8%; border-bottom:1px solid grey ;">No</th>
            <th style="border-bottom:1px solid grey ;">Nama Barang</th>
            <th style="width:15%; border-bottom:1px solid grey ;" >Harga</th>
            <th style="width:20%;border-bottom:1px solid grey ;">Qty</th>
            <th style=" width:15%; border-bottom:1px solid grey ;">Subtotal</th>
            </tr>
            <?php 
    foreach($_SESSION['items'] as $key => $val){
        $query = mysqli_query ($konek,"SELECT * FROM produk WHERE id_produk = '$key'");
        $result = mysqli_fetch_array ($query);
        $subtotal= $result['harga_produk'] * $val;
        $total += $subtotal;
        
    if(empty($payment)){
        echo "<script> alert('Tolong Masukan Payment Terlebih Dahulu') ;
        window.location.assign('index.php');
        </script>";
    } else if($payment < $total) {
        echo "<script> alert('Uang anda kurang') 
        window.location.assign('index.php');
        </script>";
    }else {
    
            ?>
            <tr>
                <td ><?php echo $no++ ?></td>
                <td><?php echo $result['nama_produk'] ?></td>
                <td style="text-align:left;">Rp <?php echo number_format($result['harga_produk']) ?></td>
                <td style="text-align:center;"><?php echo $val?></td>
                <td style="text-align:left;">Rp <?php echo number_format($subtotal) ?></td>
            </tr>
            <?php

    }
}
?>
        </table><br>
        <table style="border-collapse:collapse;">
            <tr>
                <th style="width : 85%; text-align:right; border-top:1px grey solid">Total :</th>
                <th style="border-top:1px solid grey; text-align:left;">Rp <?php echo number_format($total) ?></th>
            </tr>
            <tr>
                <th style="width : 85%; text-align:right; border-bottom:1px grey solid"">Bayar :</th>
                <th style="border-bottom:1px grey solid; text-align:left;">Rp <?php echo number_format($payment) ?></th>
            </tr>
            <tr>
                <th style="width : 85%; text-align:right;">Kembalian :</th>
                <th style="text-align:left;">Rp <?php echo number_format($payment-$total) ?></th>
            </tr>
        </table>
        <hr>
        <h3><center>*** TERIMA KASIH ***</center></h3>
        </div>

    </div>
    <div class="opsi">
<a class="confirm-btn" href="checkout.php">Confirm Payment</a>
<a class="confirm-btn" href="index.php">Cancel</a>
    </div>
</div>
</body>
</html>