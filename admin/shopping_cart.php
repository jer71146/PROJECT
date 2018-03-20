<?php
//載入 db.php 檔案，讓我們可以透過它連接資料庫
require_once '../php/db.php';
//載入 functions.php 檔案，透過裡面的方法取得資料庫的資料
require_once '../php/functions.php';
if (!isset($_SESSION['customer_is_login']) || !$_SESSION['customer_is_login'])
{
  //直接轉跳到 login.php
  header("Location: customer_login.php");
}
?>
<!DOCTYPE html>
<html lang="zh-TW">
	<head>
		<title>確認訂單</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<!-- 給行動裝置或平板顯示用，根據裝置寬度而定，初始放大比例 1 -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- 載入 bootstrap 的 css 方便我們快速設計網站-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="../bootstrap-3.3.1-dist/dist/css/bootstrap-submenu.min.css">
		<link rel="stylesheet" href="../css/index.css"/>
		<link rel="shortcut icon" href="../images/favicon.ico">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" defer></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" defer></script>
    <script src="../bootstrap-3.3.1-dist/dist/js/bootstrap-submenu.min.js" defer></script>


	</head>

	<body>
    <!-- 頁首 -->
		<?php include_once 'customer_menu.php';
          $datas = check_shopping_cart($_SESSION['customer_login_user_id']);
    ?>
    <!-- 網站內容 -->
		<div class="content">
			<table>
					<tr>
						<td class = "left-part" valign="top">
								<div class="btn-group">
								</div>
						</td>
						<td class = "center-part" valign="top">
							<!-- 建立第一個 row 空間，裡面準備放格線系統 -->
							<div class="row">
								<?php if(!empty($datas)):?>
								<?php foreach($datas as $row):?>
                  <?php if($row['in_order'] == 0):?>
    								<div class="col-xs-7">
    										<!-- 使用 bootstrap 的 panel 來呈現 http://getbootstrap.com/components/#panels-->
    										<div class="panel panel-primary">
    			 								<div class="panel-body">
    									        	<p>
                                    <span class="label label-success">
                                      商品名稱：<?php echo $row['product_name'];?>
                                    </span>
    																<br>
                                    <br>
                                    <form class="add" action="edit_order.php" method="GET">
                                      數量：
                                      <select class="form darkgray12" id="product_quantity" name="product_quantity" >
                                        <option value = "0"><?php echo $row['product_quantity'];?></option>
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
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <input type="hidden" name="product_id" value="<?php echo $row['product_id'];?>">
                                      <button type="submit" class="btn btn-default" align="center">
                                        修改
                                      </button>
                                    </form>
    															 	<br>
                                    <br>
    			 						        			<span class="label label-info">
                                      小計：<?php echo subtotal($row['price'], $row['product_quantity']);?>
                                    </span>
    									        	</p>
    			               </div>
    									 </div>
    								</div>
                    <div class="col-xs-3">
                      <br>
                      <br>

                      <form class="add" action="del_order.php" method="GET">
                        <input type="hidden" name="d" value="<?php echo $row['product_id'];?>">
                        <button type="submit" class="btn btn-default" align="center" onclick="return confirm('是否確定要刪除？');">
                          刪除
                        </button>
                      </form>
                      <br>
                      <br>
                    <form class="add" action="submit_order.php" method="GET">
                        <input type="hidden" name="o_i" value="<?php echo $row['order_id'];?>">
                        <input type="hidden" name="s_i" value="<?php echo $row['shop_id'];?>">
                        <input type="hidden" name="c_i" value="<?php echo $row['user_id'];?>">
                        <input type="hidden" name="p_i" value="<?php echo $row['product_id'];?>">
                        <input type="hidden" name="p_q" value="<?php echo $row['product_quantity'];?>">
                        <button type="submit" class="btn btn-default" align="center">
                          送出
                        </button>
                    </form>
                    </div>
                 <?php endif; ?>
							 <?php endforeach; ?>
							 <?php else: ?>
								 <h2 style="width: 800px" align="center">目前還沒有訂購任何商品喔!!</h2>
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
