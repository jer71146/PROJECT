<?php
//載入資料庫與處理的方法
require_once '../php/db.php';
require_once '../php/functions.php';
edit_order($_GET['product_id'], $_GET['product_quantity']);
header("Location: shopping_cart.php");
?>
