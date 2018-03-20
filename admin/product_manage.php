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

?>
<!DOCTYPE html>
<html lang="zh-TW">
  <head>
    <title>商品管理</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<!-- 給行動裝置或平板顯示用，根據裝置寬度而定，初始放大比例 1 -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- 載入 bootstrap 的 css 方便我們快速設計網站-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="../bootstrap-3.3.1-dist/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/index.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" defer></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" defer></script>
    <script src="../bootstrap-3.3.1-dist/dist/js/bootstrap.min.js" defer></script>


	</head>

	<body>
		<!-- 頁首 -->
		<?php include_once 'menu.php';$datas = search_by_shop_name($_SESSION['login_user_id']); ?>
    <!-- 網站內容 -->
		<div class="content">
			<table>
					<tr>
						<td class = "left-part" valign="top">
								<div class="btn-group">
								</div>
						</td>
						<td class = "center-part" valign="top">
              <button type="button" class="btn btn-black">
                <a href="add.php">
                  新增商品
                </a>
              </button>
              <br>
              <br>
							<!-- 建立第一個 row 空間，裡面準備放格線系統 -->
							<div class="row">
								<?php if(!empty($datas)):?>
								<?php foreach($datas as $row):?>
								<div class="col-xs-7">
										<!-- 使用 bootstrap 的 panel 來呈現 http://getbootstrap.com/components/#panels-->
										<div class="panel panel-primary">
			 								<div class="panel-body">
									        	<p>
																<span class="label label-danger" style="font-size:0.7cm;">
																	<?php echo $row['product_name'];?>
																</span>
																<br>
																<br>
																<br>
										        		<span class="label label-info" style="font-size:0.7cm;">
																	<?php
																		switch ($row['size']) {
																			case '1':
																				echo "SIZE:小";
																				break;
																			case '2':
																				echo "SIZE:中";
																				break;
																			case '3':
																				echo "SIZE:大";
																				break;
																			case '4':
																				echo "SIZE:特大";
																				break;
																			default:
																				# code...
																				break;
																		}
																	 ?>
															 	 </span>
															 	<br>
																<br>
																<br>
			 						        			<span class="label label-default" style="font-size:0.7cm;">
																	價格:<?php echo $row['price']; ?>
																</span>&nbsp;
									        	</p>
			               </div>
									 </div>
								</div>
                <div class="col-xs-3">
                  <br><br><br>
                  <button border-radius="2px;">
                    <a href="http://localhost/ZZZ/admin/del_product.php?d=<?php echo $row['product_id']?>" onclick="return confirm('是否確定要刪除？');">
                      刪除
                    </a>
                  </button>
                  <br><br><br>
                  <button>
                    <a href="http://localhost/ZZZ/admin/edit.php?d=<?php echo $row['product_id']?>"  >
                      修改
                    </a>
                  </button>
                </div>

							 <?php endforeach; ?>
							 <?php else: ?>
								 <h2 style="width: 200px" >&nbsp&nbsp沒有資料</h2>
							 <?php endif; ?>
						 </div>
					 </td>
				 </tr>
				 <table>
			</div>
		</div>

		<!-- 頁底 -->
    <?php include_once 'footer.php'; ?>
	</body>
</html>
