<?php
//載入 db.php 檔案，讓我們可以透過它連接資料庫，另外後台都會用 session 判別暫存資料，所以要請求 db.php 因為該檔案最上方有啟動session_start()。
require_once '../php/db.php';
require_once '../php/functions.php';
//print_r($_SESSION); //查看目前session內容

//如過沒有 $_SESSION['is_login'] 這個值，或者 $_SESSION['is_login'] 為 false 都代表沒登入
if(!isset($_SESSION['is_login']) || !$_SESSION['is_login'])
{
	//直接轉跳到 login.php
	header("Location: login.php");
}

$data = show_shop($_SESSION['login_user_id']);
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
    <link rel="stylesheet" href="../css/style.css"/>
		<link rel="stylesheet" href="../css/index.css"/>
    <link rel="shortcut icon" href="../images/favicon.ico">
  </head>

  <body>
		<?php include_once 'menu.php'; ?>
    <div class="content">
      <div class="container">
        <!-- 建立第一個 row 空間，裡面準備放格線系統 -->
				<!-- 更改商店名稱-->
        <div class="row">
					<div class="col-xs-2">
						<h3>商店名稱<h3>
					</div>
					<div class="col-xs-4">
						<div class="panel panel-primary">
							<div class="panel-body">
								<div>
									<?php
										echo $data['shop_name'];
									?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-4">
						<form class="add" action="member/shop_name_edit.php" method="GET">
							<input type="text" class="panel panel-primary panel-body" name="shop_name" placeholder="請輸入更改名稱" required>
							&nbsp;&nbsp;&nbsp;
							<button type="submit" class="btn btn-default">
                確認更改
              </button>
						</form>
					</div>
				</div>
				<!-- 更改商店地址-->
				<div class="row">
					<div class="col-xs-2">
						<h3>商店地址<h3>
					</div>
					<div class="col-xs-4">
						<div class="panel panel-primary">
							<div class="panel-body">
								<div>
									<?php
										echo $data['address'];
									?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-4">
						<form class="add" action="member/address_edit.php" method="GET">
							<input type="text" class="panel panel-primary panel-body" name="address" placeholder="請輸入更改名稱" required>
							&nbsp;&nbsp;&nbsp;
							<button type="submit" class="btn btn-default">
                確認更改
              </button>
						</form>
					</div>
				</div>
				<!-- 更改關於商店-->
				<div class="row">
					<div class="col-xs-2">
						<h3>關於商店<h3>
					</div>
					<div class="col-xs-4">
						<div class="panel panel-primary">
							<div class="panel-body">
								<div>
									<?php
										echo $data['about'];
									?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-4">
						<form class="add" action="member/about_edit.php" method="GET">
							<input type="text" class="panel panel-primary panel-body" name="about" placeholder="請輸入更改訊息" required>
							&nbsp;&nbsp;&nbsp;
							<button type="submit" class="btn btn-default">
                確認更改
	            </button>
						</form>
					</div>
				 </div>
				<!-- 更改商店電話-->
 				<div class="row">
 					<div class="col-xs-2">
 						<h3>商店電話<h3>
 					</div>
 					<div class="col-xs-4">
 						<div class="panel panel-primary">
 							<div class="panel-body">
 								<div>
 									<?php
 										echo $data['tel'];
 									?>
 								</div>
 							</div>
 						</div>
 					</div>
 					<div class="col-xs-4">
 						<form class="add" action="member/tel_edit.php" method="GET">
 							<input type="text" class="panel panel-primary panel-body" name="tel" placeholder="請輸入電話號碼" required>
 							&nbsp;&nbsp;&nbsp;
 							<button type="submit" class="btn btn-default">
                 確認更改
 	            </button>
 						</form>
 					</div>
 				 </div>
				 <!-- 更改商店FB-->
	 			<div class="row">
	 				<div class="col-xs-2">
	 					<h3>商店FB<h3>
	 				</div>
	 				<div class="col-xs-4">
	 					<div class="panel panel-primary">
	 						<div class="panel-body">
	 							<div>
	 								<?php
	 									echo $data['fb'];
	 								?>
	 							</div>
	 						</div>
	 					</div>
	 				</div>
	 				<div class="col-xs-4">
	 					<form class="add" action="member/fb_edit.php" method="GET">
	 						<input type="text" class="panel panel-primary panel-body" name="fb" placeholder="請輸入FB網址" required>
	 						&nbsp;&nbsp;&nbsp;
	 						<button type="submit" class="btn btn-default">
	 							 確認更改
	 						</button>
	 					</form>
	 				</div>
	 			 </div>
				 <!-- 更改商店E-MAIL-->
				 <div class="row">
					 <div class="col-xs-2">
						 <h3>商店E-MAIL<h3>
					 </div>
					 <div class="col-xs-4">
						 <div class="panel panel-primary">
							 <div class="panel-body">
								 <div>
									 <?php
										 echo $data['mail'];
									 ?>
								 </div>
							 </div>
						 </div>
					 </div>
					 <div class="col-xs-4">
						 <form class="add" action="member/mail_edit.php" method="GET">
							 <input type="email" class="panel panel-primary panel-body" name="mail" placeholder="請輸入E-MAIL" required>
							 &nbsp;&nbsp;&nbsp;
							 <button type="submit" class="btn btn-default">
									確認更改
							 </button>
						 </form>
					 </div>
					</div>



        </div>
      </div>
    </div>

    <!-- 頁底 -->
    <?php include_once 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

  </body>
</html>
