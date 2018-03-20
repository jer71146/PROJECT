<?php
//載入 db.php 檔案，讓我們可以透過它連接資料庫
require_once '../php/db.php';
//載入 functions.php 檔案，透過裡面的方法取得資料庫的資料
require_once '../php/functions.php';
if (!isset($_SESSION['customer_is_login']) || !$_SESSION['customer_is_login'])
{
  //直接轉跳到 login.php
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="zh-TW">
	<head>
		<title>訂單列表</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<!-- 給行動裝置或平板顯示用，根據裝置寬度而定，初始放大比例 1 -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- 載入 bootstrap 的 css 方便我們快速設計網站-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="../bootstrap-3.3.1-dist/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/index.css">
		<link rel="shortcut icon" href="../images/favicon.ico">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" defer></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" defer></script>
    <script src="../bootstrap-3.3.1-dist/dist/js/bootstrap.min.js" defer></script>


	</head>

	<body>
		<!-- 頁首 -->
		<?php
        include_once 'customer_menu.php';
        $h_c = 0;
        $d_e = 0;
        $p = 0;
				$counter = 0;
				$fuck_array = array_fill(0, 100, 0);
        $datas = array();
    ?>
		<!-- 網站內容 -->

		<?php
		if (empty($_GET['h_c']) || empty($_GET['d_e']) || empty($_GET['p'])){
			$datas = get_ALL();
			$index = 0;
		}
    else {
      $datas = easy_search($_GET['h_c'], $_GET['d_e'], $_GET['p']);
    }
		?>
		<div class="content">
			<table>
					<tr>
						<td class = "left-part" valign="top">
              <div class="btn-group">
                <div class="btn-group-vertical">
                  <form class="add" action="easy_search.php" method="GET">
                    <div class="form-group">
                      <label for="h_c">冷or熱</label>
                      <br>
                      <label><input type="radio" name="h_c" value="1" class="btn btn-secondary"/>&nbsp熱</label>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label><input type="radio" name="h_c" value="2" class="btn btn-secondary"/>&nbsp冷</label>
                    </div>
                    <div class="form-group">
                      <label for="d_e">吃or喝</label>
                      <br>
                      <label><input type="radio" name="d_e" value="1" class="btn btn-secondary"/>&nbsp喝</label>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label><input type="radio" name="d_e" value="2" class="btn btn-secondary"/>&nbsp吃</label>
                    </div>
                    <div class="form-group">
                      <label for="p">價位</label>
                      <br>
                      <label><input type="radio" name="p" value="1" class="btn btn-secondary"/>&nbsp50以下</label>
                      <br>
                      <label><input type="radio" name="p" value="2" class="btn btn-secondary"/>&nbsp50-100</label>
                      <br>
                      <label><input type="radio" name="p" value="3" class="btn btn-secondary"/>&nbsp100以上</label>
                    </div>
                    <button type="submit" class="btn btn-default">
                      搜尋店家
                    </button>
                    <br>
                    <br>
                    <button class="btn btn-default">
                      <a href="shopping_list.php">取消</a>
                    </button>
                  </form>
                </div>
              </div>
							<br>
							<br>
							<div class="col-xs-12">
								<form class="add" action="to_shopping_cart.php" method="GET">
								<div class="panel panel-primary">
									<div class="panel-body">
										<p>
											<span class="label label-danger" style="font-size:0.7cm; display:block;">購物車清單<span>
										</p>

										<?php
											$data1 = check_shopping_cart($_SESSION['customer_login_user_id']);
										?>
										<div style="text-align:right;">
										<?php if(!empty($data1)):?>
											<div class="col-xs-6">
												商品名稱
											</div>
											<div class="col-xs-3">
												數量
											</div>
											<div class="col-xs-3">
												小計
											</div>
											<?php $temp1 = 'NULL';foreach($data1 as $row1):?>
												<div class="col-xs-2">
													<?php if($row1['in_order'] == 1):?>
														<font color="red" size="2">送出</font>
													<?php endif?>
												</div>
												<div class="col-xs-4">
												<?php if($temp1!=$row1['product_name']) echo $row1['product_name'];?>
												</div>
												<div class="col-xs-3">
												<?php if($temp1!=$row1['product_quantity']) echo $row1['product_quantity'];?>
												</div>
												<div class="col-xs-3">
												<?php if($temp1!=$row1['price']) echo subtotal($row1['price'], $row1['product_quantity']);?>
												<br>
												<br>
											</div>
											<?php endforeach; ?>
										<?php endif; ?>
										</div>
									</div>
								</div>
								<button type="submit" class="btn btn-default" align="right">
									結帳
								</button>
								</form>
							</div>
						</td>
						<td class = "center-part" valign="top">
							<!-- 建立第一個 row 空間，裡面準備放格線系統 -->
							<div class="row">
  								<!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
  								<?php if(!empty($datas)):?>
  									<?php $temp = 'NULL';foreach($datas as $row):?>
										<form class="add" action="customer/order.php" method="GET">
  										<?php if($temp!=$row['shop_name']):?>
  											<div class="col-xs-10">
  												<a href="shop_info.php?u_i=<?php echo $row['user_id'] ?>">
  													<div class = "shop">
  														<?php if($temp!=$row['shop_name'])echo $row["shop_name"]; ?>
  													</div>
  												</a>
  											</div>
  										<div class="col-xs-5">
  												<!-- 使用 bootstrap 的 panel 來呈現 http://getbootstrap.com/components/#panels-->
  												<div class="panel panel-primary">
  					 								<div class="panel-body">
  											        	<p>
  																		<span class="label label-danger" style="font-size:0.7cm;"> 商品名稱:<?php echo $row['product_name'];?> </span>
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
  					 						        			<span class="label label-default" style="font-size:0.7cm;">價格:<?php echo $row['price']; ?></span>&nbsp;
                                      <br>
                                      <br>
                                      <ul class="sortList horizontalList">
																				<input type="hidden" name="user_id" value="<?php echo $_SESSION['customer_login_user_id'];?>">
																				<input type="hidden" name="product_id" value="<?php echo $row['product_id'];?>">
                                        我想要
                                          <select class="form darkgray12" id="product_quantity" name="product_quantity" >
                                            <option value = "0">多吃點多喝點</option>
                                            <option value = "1">1</option>
                                            <option value = "2">2</option>
                                            <option value = "3">3</option>
                                            <option value = "4">4</option>
                                            <option value = "5">5</option>
                                            <option value = "6">6</option>
                                            <option value = "7">7</option>
                                            <option value = "8">8</option>
                                            <option value = "9">9</option>
                                            <option value = "10">10</option>
                                          </select>
                                          個填飽肚子
                                      </ul>
  										        	</p>
															  <button type="submit" class="btn btn-default" align="center">
			 				  	                加入購物車
			 				  	              </button>
  					               </div>
  											 </div>
  										</div>
										 </form>

									 	<?php endif; ?>
  								 <?php endforeach; ?>

  							 <?php else: ?>
  								 <h3 class="text-center">沒有資料</h3>
  							 <?php endif; ?>
								 </div>
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
