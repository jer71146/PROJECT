<?php
//載入資料庫與處理的方法
require_once '../../php/db.php';
require_once '../../php/functions.php';


//執行新增使用者的方法，直接把整個 $_POST個別的照順序變數丟給方法。
about_edit( $_SESSION['login_user_id'] , $_GET['about']);
header("Location: ../member_list.php");
?>
