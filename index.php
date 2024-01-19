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
    <li><a href="item.php">Stock Opname</a></li>
    <hr class="nav-separator">
</ul>
</nav>
<div class="cover"></div>
<div class="container">
    <div class="kiri">
    <h2>List Product</h2>
<div class="content-kiri">
<?php while($data = mysqli_fetch_assoc($show)){ ?>
    <div class="card">
        <img src="asset\<?php echo $data['gambar'] ?>" alt="Dummy Pic" class="product-img">
        <p class="product-detail"><?php echo  $data['nama_produk'] ?></p>
        <p class="product-detail">Stok : <?php echo  $data['stok_produk'] ?></p>
        <p class="product-detail">Rp <?php echo number_format($data['harga_produk']) ?></p>
        <button class="add">  <a href="proses.php?act=add&amp;id=<?php echo $data['id_produk'] ?>" class="add" name="add">Add</a></button>  
    </div>
<?php }?>
</div>
    </div>
    <div class="kanan">
    <div class="content-kanan">
        <div class="kanan-atas">
    <h2>CheckOut</h2>
    <?php       
        $total = 0;
            ?> 
    <table class="checkout-table">
        <tr>
            <th style="width:8%;">No</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th style="width:20%;">Qty</th>
            <th>Jumlah</th>
            <th style="width:5%;">Option</th>
        </tr>
        <?php
            $no=1;
            if (isset($_SESSION['items'])) {
                foreach ($_SESSION['items'] as $key => $val){
                    $query = mysqli_query ($connect,"SELECT id_produk, nama_produk, harga_produk FROM produk WHERE id_produk = '$key'");
                    $result = mysqli_fetch_array ($query);  
                    $subtotal= $result['harga_produk'] * $val;
                    $total += $subtotal;
            ?>
            <td><?php echo $no++; ?></td>
            <td><?php echo $result["nama_produk"]; ?></td>
            <td>Rp <?php echo number_format($result["harga_produk"])?></td>
            <td>
            <button class="add"><a href="proses.php?act=min&amp;id=<?php echo $key ?>">-</a></button>        
            <?php echo $val; ?>
            <button class="add"><a href="proses.php?act=plus&amp;id=<?php echo $key ?>">+</a></button>  
        </td>
            <td>Rp <?php echo number_format($subtotal); ?></td>
            <td><a href="proses.php?act=del&amp;id=<?php echo $key ?>">
            <svg class="trash" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
    <path d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z"/>
  </svg>  </svg>
        </a></td>
        </tr>
    
        <?php
            mysqli_free_result($query);
        }
  }else{
    echo("
    <tr>
    <td style='border-style:none;' colspan='6'>Keranjang Anda Masih Kosong</td>
    </tr>
    ") ;
  }
  ?>
</table>
</div>



<div class="checkout">
    <table class="total">
        <tr>
            <th style="width:70%;">Total</th>
            <th><h2 style="color:red;">Rp <?php echo number_format($total); ?></h2></th>
        </tr>
        <tr style="height:6vh;">
            <th>Payment</th>
            <th><form action="receipt.php" method="post">
                <input type="number" name="payment"></th>
        </tr>
        <tr>
            
            <td><a href="proses.php?act=clear" class="confirm-btn">Clear</a></td>
        <td style="border: none; text-align:right; height:10vh; padding-right: 20px;"><button class="confirm-btn"type="submit" name="pay">CheckOut</button></td>
        </tr>
        </form>
    </table>
</div>
    </div>
    </div>
</div>
<?php 

?>
</body>
</html>      