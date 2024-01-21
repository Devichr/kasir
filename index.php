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
$page = "sales";
    ?>
<div class="top-section">
<button class="toggle" onclick="toggle()">=</button>
<div class="app-name"><h3>DEVSTORE</h3></div>
<h4>Cart</h4>
</div>
<nav id="nav">
<ul>
    <hr class="nav-separator">
    <li><a href="index.php?page=sales">Sales</a></li>
    <hr class="nav-separator">
    <li><a href="index.php?page=item">Item List</a></li>
    <hr class="nav-separator">
</ul>
</nav>
<div class="cover"></div>
<?php 
if (isset($_GET['page'])){
    $page = $_GET['page'];
    if ($page == "sales"){
        include 'sales.php';
    }else if ($page == "item"){
        include 'item.php';
}elseif ($page == "detail") {
    include 'detail.php';
}
}else {
    include 'sales.php';
}
?>
</body>
</html>      