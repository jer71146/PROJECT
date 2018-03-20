<?php
//載入資料庫與處理的方法
require_once '../php/db.php';
require_once '../php/functions.php';

order_step_3($_GET['order_id_3']);
header("Location: order_list.php");
?>
