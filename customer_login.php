<?php
//載入 db.php 檔案，讓我們可以透過它連接資料庫，因為此檔案放在 admin 裡，要找到 db.php 就要回上一層 ../php 裡面才能找到
require_once 'php/db.php';

//如過有 $_SESSION['is_login'] 這個值，以及 $_SESSION['is_login'] 為 true 都代表已登入
if(isset($_SESSION['is_login']) && $_SESSION['is_login'])
{
  //直接轉跳到 index.php 後端首頁
//  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="zh-TW">
  <head>
    <title>作品網站-會員註冊</title>
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
    <!-- 頁首 -->
    <?php
include_once 'menu.php';
    ?>
    <!-- 網站內容 -->
    <div class="content">
      <div class="container">
        <!-- 建立第一個 row 空間，裡面準備放格線系統 -->
        <div class="row">
          <!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
          <div class="col-xs-12 col-sm-4 col-sm-offset-4">
            <form class="login">
              <div class="form-group">
                <label for="username"><text>帳號</text></label>
                <input type="text" class="form-control" id="username" name="username" placeholder="請輸入帳號" required>
              </div>
              <div class="form-group">
                <label for="password"><text>密碼</text></label>
                <input type="password" class="form-control" id="password" name="password" placeholder="請輸入密碼" required>
              </div>
              <button type="submit" class="btn btn-success">
                <text>登入</text>
              </button>
              <br><br>


            </form>還沒有帳號?
            <button class="btn btn-warning text-muted" >

              <a href="customer_register.php" >
                註冊
              </a>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- 在表單送出前，檢查確認密碼是否輸入一樣 -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>
      //當文件準備好時，
      $(document).on("ready", function() {
				//當表單 sumbit 出去的時候
				$("form.login").on("submit", function(){
				  //使用 ajax 送出 帳密給 verify_user.php
					$.ajax({
            type : "POST",
            url : "php/customer_verify_user.php",
            data : {
              un : $("#username").val(), //使用者帳號
              pw : $("#password").val() //使用者密碼
            },
            dataType : 'html' //設定該網頁回應的會是 html 格式
          }).done(function(data) {
            //成功的時候
            console.log(data+"!!");
            if(data == "yes")
            {
              //註冊新增成功，轉跳到登入頁面。
              window.location.href = "admin/customer_index.php";
            }
            else
            {
              alert("登入失敗，請確認帳號密碼");
            }

          }).fail(function(jqXHR, textStatus, errorThrown) {
            //失敗的時候
            alert("有錯誤產生，請看 console log");
            console.log(jqXHR.responseText);
          });
	        //回傳 false 為了要阻止 from 繼續送出去。由上方ajax處理即可
          return false;
				});
      });
    </script>
    <!-- 頁底 -->
    <?php
      include_once 'footer.php';
    ?>
  </body>
</html>
