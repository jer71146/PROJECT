<?php
//載入 db.php 檔案，讓我們可以透過它連接資料庫，另外後台都會用 session 判別暫存資料，所以要請求 db.php 因為該檔案最上方有啟動session_start()。
require_once 'php/db.php';
//print_r($_SESSION); //查看目前session內容
require_once 'php/functions.php';
//如過沒有 $_SESSION['is_login'] 這個值，或者 $_SESSION['is_login'] 為 false 都代表沒登入
?>
<!DOCTYPE html>
<html lang="zh-TW">
  <head>
    <title>攤聯網</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!-- 給行動裝置或平板顯示用，根據裝置寬度而定，初始放大比例 1 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 載入 bootstrap 的 css 方便我們快速設計網站-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/style.css"/>
		<link rel="stylesheet" href="css/index.css"/>
    <link rel="shortcut icon" href="images/favicon.ico">
  </head>

  <body>
    <!-- 頁首 $datas = get_shop_info(); -->
		<?php include_once 'menu.php'; $datas = get_shop_info($_GET['u_i']); $datas_1 = show_shop($_GET['u_i']);?>
    <?php
      if($_GET['choose_value'] > 0)
        echo $_GET['choose_value'];
    ?>
    <!-- 網站內容 -->
    <div class="content">
      <div class="container">
        <!-- 建立第一個 row 空間，裡面準備放格線系統 -->
        <div class="row">
          <!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
          <div class="col-xs-12">
            <!--<div class="alert alert-success text-center" role="alert">

            </div>-->
            <div class="row">
   					 <div class="col-xs-3">
   						 <h3>商店名稱<h3>
   					 </div>
   					 <div class="col-xs-5">
   						 <div class="panel panel-primary">
   							 <div class="panel-body">
   								 <div>
   									 <?php
   										 echo $datas_1['shop_name'];
   									 ?>
   								 </div>
   							 </div>
   						 </div>
   					 </div>
   					</div>
            <div class="row">
   					 <div class="col-xs-3">
   						 <h3>商店地址<h3>
   					 </div>
   					 <div class="col-xs-5">
   						 <div class="panel panel-primary">
   							 <div class="panel-body">
   								 <div>
   									 <?php
   										 echo $datas_1['address'];
   									 ?>
   								 </div>
   							 </div>
   						 </div>
   					 </div>
   					</div>
            <div class="row">
   					 <div class="col-xs-3">
   						 <h3>關於商店<h3>
   					 </div>
   					 <div class="col-xs-5">
   						 <div class="panel panel-primary">
   							 <div class="panel-body">
   								 <div>
   									 <?php
   										 echo $datas_1['about'];
   									 ?>
   								 </div>
   							 </div>
   						 </div>
   					 </div>
   					</div>
            <div class="row">
   					 <div class="col-xs-3">
   						 <h3>商店電話<h3>
   					 </div>
   					 <div class="col-xs-5">
   						 <div class="panel panel-primary">
   							 <div class="panel-body">
   								 <div>
   									 <?php
   										 echo $datas_1['tel'];
   									 ?>
   								 </div>
   							 </div>
   						 </div>
   					 </div>
   					</div>
            <div class="row">
   					 <div class="col-xs-3">
   						 <h3>商店FB<h3>
   					 </div>
   					 <div class="col-xs-5">
   						 <div class="panel panel-primary">
   							 <div class="panel-body">
   								 <div>
   									 <?php
   										 echo $datas_1['fb'];
   									 ?>
   								 </div>
   							 </div>
   						 </div>
   					 </div>
   					</div>
            <div class="row">
   					 <div class="col-xs-3">
   						 <h3>商店E-MAIL<h3>
   					 </div>
   					 <div class="col-xs-5">
   						 <div class="panel panel-primary">
   							 <div class="panel-body">
   								 <div>
   									 <?php
   										 echo $datas_1['mail'];
   									 ?>
   								 </div>
   							 </div>
   						 </div>
   					 </div>
   					</div>
            <?php if(!empty($datas)):?>
              <?php $temp = 'NULL';foreach($datas as $row):?>
              <?php endforeach; ?>
            <?php else: ?>
              <h3 class="text-center">沒有資料</h3>
            <?php endif; ?>
            <iframe  width='800' height='600' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='http://maps.google.com.tw/maps?f=q&hl=zh-TW&geocode=&q=<?php echo $row["address"];?>&z=16&output=embed&t=' >
            </iframe>
          </div>
        </div>
      </div>
    </div>

    <!-- 頁底 -->
    <?php include_once 'footer.php'; ?>
  </body>
</html>
