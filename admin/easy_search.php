<?php
//載入資料庫與處理的方法
require_once '../php/db.php';
require_once '../php/functions.php';


//執行新增使用者的方法，直接把整個 $_POST個別的照順序變數丟給方法。
//if(empty($_GET['h_c'])
$datas = easy_search($_GET['h_c'], $_GET['d_e'], $_GET['p']);
if(empty($_GET['h_c']) && empty($_GET['d_e']) && empty($_GET['p']))
  header("Location: shopping_list.php");
else
  header("Location: shopping_list.php?h_c={$_GET['h_c']}"."&d_e={$_GET['d_e']}"."&p={$_GET['p']}");
?>
