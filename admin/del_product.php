<?php
//載入資料庫與處理的方法
require_once '../php/db.php';
require_once '../php/functions.php';

del_product($_GET['d']);
header("Location: product_manage.php");
?>
