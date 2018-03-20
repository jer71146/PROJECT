<?php
//載入資料庫與處理的方法
require_once '../php/db.php';
require_once '../php/functions.php';
submit_order($_GET['o_i'], $_GET['s_i'], $_GET['c_i'], $_GET['p_i'], $_GET['p_q']);
header("Location: shopping_cart.php");
?>
