<?php
//載入 db.php 檔案，讓我們可以透過它連接資料庫
require_once 'php/db.php';
//載入 functions.php 檔案，透過裡面的方法取得資料庫的資料
require_once 'php/functions.php';

?>
<!DOCTYPE html>
<html lang="zh-TW">
	<head>
		<title>文章列表</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<!-- 給行動裝置或平板顯示用，根據裝置寬度而定，初始放大比例 1 -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- 載入 bootstrap 的 css 方便我們快速設計網站-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="bootstrap-3.3.1-dist/dist/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/index.css"/>
		<link rel="shortcut icon" href="images/favicon.ico">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" defer></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" defer></script>
    <script src="bootstrap-3.3.1-dist/dist/js/bootstrap.min.js" defer></script>


	</head>

	<body>
		<!-- 頁首 -->
		<?php include_once 'menu.php';$datas = get_ALL(); ?>
		<!-- 網站內容 -->

		<?php
		if (empty($_GET['c'])){
			$datas = get_ALL();
			$index = 0;
		}
		else{
			switch ($_GET['c']) {
				case "0":
					$datas = get_ALL();
					$index = 0;
					break;
				case "1":
					$datas = get_FOOD();
					$index = 1;
					break;
				case "2":
					$datas = get_DRINK();
					$index = 2;
					break;
				case "3":
					$datas = get_category('1');//get hot
					$index = 3;

					break;
				case "4":
					$datas = get_category('2');//get cold
					$index = 4;
					break;
				default:
					$datas = get_ALL();
					$index = 0;
					break;
			}
		}
		?>
		<div class="content">
			<table>
					<tr>
						<td class = "left-part" valign="top">
								<div class="btn-group">
									<div class="btn-group-vertical">
										分類
										<button type="button" class="btn btn-secondary"><a href="http://localhost/ZZZ/product_list.php?c=0" <?php echo ($index == 0)?'class="active"':'';?>> 全部  </a></button>
										<br>
										<button type="button" class="btn btn-secondary"><a href="http://localhost/ZZZ/product_list.php?c=1" <?php echo ($index == 1)?'class="active"':'';?>> 吃  </a></button>
										<button type="button" class="btn btn-secondary"><a href="http://localhost/ZZZ/product_list.php?c=2" <?php echo ($index == 2)?'class="active"':'';?>> 喝  </a></button>
										<br>
										<button type="button" class="btn btn-secondary"><a href="http://localhost/ZZZ/product_list.php?c=3" <?php echo ($index == 3)?'class="active"':'';?>> 冷  </a></button>
										<button type="button" class="btn btn-secondary"><a href="http://localhost/ZZZ/product_list.php?c=4" <?php echo ($index == 4)?'class="active"':'';?>> 熱  </a></button>

									</div>
								</div>
						</td>
						<td class = "center-part" valign="top">
							<!-- 建立第一個 row 空間，裡面準備放格線系統 -->
							<div class="row">
								<!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
								<?php if(!empty($datas)):?>
									<?php $temp = 'NULL';foreach($datas as $row):?>
										<?php if($temp!=$row['shop_name']):?>
											<div class="col-xs-10">
												<a href="shop_info.php?u_i=<?php echo $row['user_id'] ?>">
													<div class = "shop">
														<?php if($temp!=$row['shop_name'])echo $row["shop_name"]; ?>
													</div>
												</a>
											</div>
										<?php endif; ?>
								<div class="col-xs-5">
										<!-- 使用 bootstrap 的 panel 來呈現 http://getbootstrap.com/components/#panels-->
										<div class="panel panel-primary">
			 								<div class="panel-body">
									        	<p>
																<?php echo $row['product_name'];?>
																<br>
										        		<span class="label label-danger">
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
			 						        			<span class="label label-info">價格:<?php echo $row['price']; ?></span>&nbsp;
									        	</p>
									          <?php $temp = $row['shop_name'];?>
			               </div>
									 </div>
								</div>

								 <?php endforeach; ?>
							 <?php else: ?>
								 <h3 class="text-center">沒有資料</h3>
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
