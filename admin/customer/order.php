<?php
//載入資料庫與處理的方法
require_once '../../php/db.php';
require_once '../../php/functions.php';


//執行新增使用者的方法，直接把整個 $_POST個別的照順序變數丟給方法。
//if(empty($_GET['h_c'])
$datas = array();
if(($_GET['product_quantity']) == 0)
  header("Location: ../shopping_list.php");
else
{
  $datas = order($_GET['user_id'], $_GET['product_id'], $_GET['product_quantity']);
  header("Location: ../shopping_list.php");
}
?>
