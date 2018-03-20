<?php
//載入資料庫與處理的方法
require_once '../php/db.php';
require_once '../php/functions.php';

del_order($_GET['d']);
header("Location: shopping_cart.php");
?>
