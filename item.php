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
    <li><a href="receive.php">Receive</a></li>
    <hr class="nav-separator">
    <li><a href="item.php">Stock Opname</a></li>
    <hr class="nav-separator">
</ul>
</nav>