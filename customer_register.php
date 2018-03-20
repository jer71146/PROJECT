<?php
//載入 db.php 檔案，讓我們可以透過它連接資料庫
//require_once 'php/db.php';
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
            <form class="register">
              <div class="form-group">
                <label for="username"><text>帳號</text></label>
                <input type="text" class="form-control" id="username" name="username" placeholder="請輸入帳號" required>
              </div>
              <div class="form-group">
                <label for="password"><text>密碼</text></label>
                <input type="password" class="form-control" id="password" name="password" placeholder="請輸入密碼" required>
              </div>
              <div class="form-group">
                <label for="confirm_password"><text>確認密碼</text></label>
                <input type="password" class="form-control" id="confirm_password" name="password" placeholder="請再次輸入密碼" required>
              </div>
              <div class="form-group">
                <label for="email"><text>EMAIL</text></label>
                <input type="text" class="form-control" id="email" name="email" placeholder="請輸入您的EMAIL" required>
              </div>
              <div class="form-group">
                <label for="tel"><text>電話</text></label>
                <input type="text" class="form-control" id="tel" name="tel" placeholder="請輸入您的電話" required>
              </div>
              <div class="form-group">
                <label for="address"><text>地址</text></label>
                <input type="text" class="form-control" id="address" name="address" placeholder="請輸入您的地址" required>
              </div>
              <button type="submit" class="btn btn-success" class="text-black">
                <text>註冊</text>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- 在表單送出前，檢查確認密碼是否輸入一樣 -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>
      //當文件準備好時，
      $(document).on("ready", function() {
      	//檢查帳號有無重複
      	//當帳號的input keyup的時候，透過ajax檢查
      	$("#password").on("click", function(){
      		//取得輸入的值
      		var keyin_value = $("password").val();
      		//當keyup的時候，裡面的值不是空字串的話，就檢查。
      		if(keyin_value != '')
      		{
      			//$.ajax 是 jQuery 的方法，裡面使用的是物件。
	      		$.ajax({
			        type : "POST",	//表單傳送的方式 同 form 的 method 屬性
			        url : "php/customer_check_username.php",  //目標給哪個檔案 同 form 的 action 屬性
			        data : {	//為要傳過去的資料，使用物件方式呈現，因為變數key值為英文的關係，所以用物件方式送。ex: {name : "輸入的名字", password : "輸入的密碼"}
			          n : $("#username").val()	//代表要傳一個 n 變數值為，username 文字方塊裡的值
			        },
			        dataType : 'html' //設定該網頁回應的會是 html 格式
			      }).done(function(data) {
			        //成功的時候
			        console.log(data); //透過 console 看回傳的結果
			        if(data == "yes")
			        {
			        	//如果為 yes username 文字方塊的復元素先移除 has-error 類別，再加入 has-success 類別
			        	$("#username").parent().removeClass("has-error").addClass("has-success");
			        	//把註冊按鈕 disabled 類別移除，讓他可以按註冊
			        	$("form.register button[type='submit']").removeClass('disabled');
			        }
			        else
			        {
			        	alert("帳號有重複，不可以註冊");
			        	$("#username").parent().removeClass("has-success").addClass("has-error");
			        	//把註冊按鈕加上 disabled 不能按，在bootstrap裡 disabled 類別可以讓該元素無法操作
                $("form.register button[type='submit']").addClass('disabled');
			        }

			      }).fail(function(jqXHR, textStatus, errorThrown) {
			      	//失敗的時候
			      	alert("有錯誤產生，請看 console log");
			        console.log(jqXHR.responseText);
			      });
      		}
      		else
      		{
      			//若為空字串，就移除 has-error 跟 has-success 類別
      			$("#username").parent().removeClass("has-success").removeClass("has-error");
      		}

      	});

				//當表單 sumbit 出去的時候
				$("form.register").on("submit", function(){
					//如果密碼與驗證密碼不一樣
					if ($("#password").val() != $("#confirm_password").val()) {
						//把 input 的父標籤 加入 has-error，讓人知道哪個地方有錯誤，作為提醒
						//為何要在父類別加has-error，請看 http://getbootstrap.com/css/#forms-control-validation
						$("#password").parent().addClass("has-error");
						$("#confirm_password").parent().addClass("has-error");
	        	//若密碼都不一樣就警告。
	          alert("兩次密碼輸入不一樣，請確認");

	        }
	        else
	        {
	        	//若當密碼正確無誤，就使用 ajax 送出
	      		$.ajax({
			        type : "POST",
			        url : "php/customer_add_user.php",
			        data : {
			          un : $("#username").val(), //使用者帳號
			          pw : $("#password").val(), //使用者密碼
			          email : $("#email").val(), //email
                tel : $("#tel").val(), //email
                addr : $("#address").val()
			        },
			        dataType : 'html' //設定該網頁回應的會是 html 格式
			      }).done(function(data) {
			        //成功的時候
			        console.log(data);
			        if(data == "yes")
			        {
			          alert("註冊成功，將自動前往登入頁。");
			        	//註冊新增成功，轉跳到登入頁面。
			        	window.location.href="customer_login.php";
			        }
			        else
			        {
			        	alert("註冊失敗，請與系統人員聯繫");
			        }

			      }).fail(function(jqXHR, textStatus, errorThrown) {
			      	//失敗的時候
			      	alert("有錯誤產生，請看 console log");
			        console.log(jqXHR.responseText);
			      });
	        }


	        //一樣要回傳 false 阻止 from 繼續把資料送出去。因為會交由上方的 ajax 非同步處理註冊的動作
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
