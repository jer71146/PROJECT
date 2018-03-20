<?php
//載入資料庫與處理的方法
require_once '../php/db.php';
require_once '../php/functions.php';
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
    <!-- 頁首 -->
    <?php
      include_once 'menu.php';
    ?>
    <?php
      $data = show_product($_GET['d']);
    ?>
    <!-- 網站內容 -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-4 col-sm-offset-4">

            <form name="edit" action="edit_product.php" method="GET">
              <div class="form-group">
                <label for="product_name">商品名稱</label>
                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="<?php echo $data['product_name']; ?>">
              </div>
              <div class="form-group">
                <label for="price">商品價格</label>
                  <input type="number" class="form-control" id="price" name="price" placeholder="<?php echo $data['price']; ?>">
              </div>
              <div class="form-group">
                <label for="size">商品大小</label>
                <br>
                <label><input type="checkbox" name="size" value="1" >&nbsp小</label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label><input type="checkbox" name="size" value="2" >&nbsp中</label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label><input type="checkbox" name="size" value="3" >&nbsp大</label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label><input type="checkbox" name="size" value="4" >&nbsp特大</label>
              </div>
              <div class="form-group">
                <label for="name">商品種類</label>
                <br>
                <label><input type="checkbox" name="product_category" value="1">&nbsp熱飲</label>
                &nbsp;
                <label><input type="checkbox" name="product_category" value="2">&nbsp冷飲</label>
                &nbsp;&nbsp;&nbsp;&nbsp;\(◎口◎)/&nbsp;&nbsp;&nbsp;&nbsp;
                <label><input type="checkbox" name="product_category" value="3">&nbsp熱食</label>
                &nbsp;
                <label><input type="checkbox" name="product_category" value="4">&nbsp冷食</label>
              </div>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <button type="submit" class="btn btn-default" name = "e" value="<?php echo $data['product_id'];?>">
                送出
              </button>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <button class="btn btn-default">
                <a href="product_manage.php">取消</a>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- 在表單送出前，檢查確認密碼是否輸入一樣 -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>
      $(document).ready(function()
      {
        $("input[name=product_category]").click( function ()
        {
          var Selected = $(this).val();
          $("input[name=product_category]").each(function(i)
          {
            if($(this).val() == Selected) $(this).prop("checked", true);
            else $(this).prop("checked", false);
          });
        });


        $("input[name=size]").click( function ()
        {
          var Selected = $(this).val();
          $("input[name=size]").each(function(i)
          {
            if($(this).val() == Selected) $(this).prop("checked", true);
            else $(this).prop("checked", false);
          });
        });
      });
    </script>
    <!-- 頁底 -->
    <?php
      include_once 'footer.php';
    ?>
  </body>
</html>
