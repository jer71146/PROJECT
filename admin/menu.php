<?php
//取得目前檔案的名稱。透過$_SERVER['PHP_SELF']先取得路徑
$current_file = $_SERVER['PHP_SELF'];
//echo $current_file; //查看目前取得的檔案完整
//然後透過 basename 取得檔案名稱，加上第二個參數".php"，主要是將取得的檔案去掉 .php 這副檔名稱
$current_file = basename($current_file , ".php");
//echo $current_file; //查看目前取得後的檔名

switch ($current_file) {
	case 'product_list':
		$index = 1;
		break;
  case 'product_manage':
	case 'edit':
		$index = 2;
		break;
	case 'order_list':
		$index = 3;
		break;
	case 'member_list':
		$index = 4;
		break;
	default:
		$index = 0;
		break;
}
?>
<div class="jumbotron">
  <div class="container">
    <!-- 建立第一個 row 空間，裡面準備放格線系統 -->
    <div class="row">
      <!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
      <div class="col-xs-12">
        <!--網站標題-->
        <h1 class="text-center">攤聯網</h1>

        <!-- 選單 -->
        <ul class="nav nav-pills">
        	<li role="presentation" <?php echo ($index == 0)?'class="active"':'';?>><a href="index.php"><text>首頁</text></a></li>
					<li role="presentation" <?php echo ($index == 1)?'class="active"':'';?>><a href="product_list.php"><text>所有商品</text></a></li>
          <li role="presentation" <?php echo ($index == 2)?'class="active"':'';?>><a href="product_manage.php"><text>商品管理</text></a></li>
          <li role="presentation" <?php echo ($index == 4)?'class="active"':'';?>><a href="member_list.php"><text>會員管理</text></a></li>
					<li role="presentation" <?php echo ($index == 3)?'class="active"':'';?>><a href="order_list.php"><text>訂單列表</text></a></li>
          <li role="presentation"><a href="../php/logout.php"><text>登出</text></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
