<?php
//載入資料庫與處理的方法
require_once '../php/db.php';
require_once '../php/functions.php';
my_order($_GET['shop_id']);
header("Location: order_list.php");
?>
