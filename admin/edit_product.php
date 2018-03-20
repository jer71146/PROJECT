<?php
//載入資料庫與處理的方法
require_once '../php/db.php';
require_once '../php/functions.php';
edit_product($_GET['product_name'], $_GET['price'], $_GET['size'], $_GET['product_category'], $_GET['e']);
header("Location: product_manage.php");
?>
