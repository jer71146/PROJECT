<?php
//啟動 session ，這樣才能夠取用 $_SESSION['link'] 的連線，做為資料庫的連線用
@session_start();
/**
 * 取得所有已發布的文章
 */


 function get_ALL()
 {
   //宣告空的陣列
   $datas = array();
   //將查詢語法當成字串，記錄在$sql變數中
   $sql = "SELECT * FROM `product` ORDER BY shop_name";
   //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
   $query = mysqli_query($_SESSION['link'], $sql);
   //如果請求成功
   if ($query)
   {
     //使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否大於0
     if (mysqli_num_rows($query) > 0)
     {
       //取得的量大於0代表有資料
       //while迴圈會根據查詢筆數，決定跑的次數
       //mysqli_fetch_assoc 方法取得 一筆值
       while ($row = mysqli_fetch_assoc($query))
       {
         $datas[] = $row;
       }
     }
     //釋放資料庫查詢到的記憶體
     mysqli_free_result($query);
   }
   else
   {
     echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
   }
   return $datas;
 }
 function get_shop_info($user_id)
 {
   //宣告空的陣列
   $datas = array();
   //將查詢語法當成字串，記錄在$sql變數中
   $sql = "SELECT * FROM `shop` WHERE `user_id`= $user_id;";
   //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
   $query = mysqli_query($_SESSION['link'], $sql);
   //如果請求成功
   if ($query)
   {
     //使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否大於0
     if (mysqli_num_rows($query) > 0)
     {
       //取得的量大於0代表有資料
       //while迴圈會根據查詢筆數，決定跑的次數
       //mysqli_fetch_assoc 方法取得 一筆值
       while ($row = mysqli_fetch_assoc($query))
       {
         $datas[] = $row;
       }
     }
     //釋放資料庫查詢到的記憶體
     mysqli_free_result($query);
   }
   else
   {
     echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
   }
   return $datas;
 }



 function get_drink()
 {
   //宣告空的陣列
   $datas = array();
   //將查詢語法當成字串，記錄在$sql變數中
   $sql = "SELECT * FROM `product` WHERE `product_category`= 1 OR `product_category`= 2 ;";
   //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
   $query = mysqli_query($_SESSION['link'], $sql);
   //如果請求成功
   if ($query)
   {
     //使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否大於0
     if (mysqli_num_rows($query) > 0)
     {
       //取得的量大於0代表有資料
       //while迴圈會根據查詢筆數，決定跑的次數
       //mysqli_fetch_assoc 方法取得 一筆值
       while ($row = mysqli_fetch_assoc($query))
       {
         $datas[] = $row;
       }
     }
     //釋放資料庫查詢到的記憶體
     mysqli_free_result($query);
   }
   else
   {
     echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
   }
   return $datas;
 }

 function get_Food()
 {
   //宣告空的陣列
   $datas = array();
   //將查詢語法當成字串，記錄在$sql變數中
   $sql = "SELECT * FROM `product` WHERE `product_category`= 3 OR `product_category`= 4 ;";
   //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
   $query = mysqli_query($_SESSION['link'], $sql);
   //如果請求成功
   if ($query)
   {
     //使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否大於0
     if (mysqli_num_rows($query) > 0)
     {
       //取得的量大於0代表有資料
       //while迴圈會根據查詢筆數，決定跑的次數
       //mysqli_fetch_assoc 方法取得 一筆值
       while ($row = mysqli_fetch_assoc($query))
       {
         $datas[] = $row;
       }
     }
     //釋放資料庫查詢到的記憶體
     mysqli_free_result($query);
   }
   else
   {
     echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
   }
   return $datas;
 }
 function easy_search($h_c, $d_e, $p)
 {
   //宣告要回傳的結果
   $datas = array();
   //將查詢語法當成字串，記錄在$sql變數中
   if($h_c == 1)
   {
       if($d_e == 1)
       {
           if($p == 3)
               $sql = "SELECT * FROM `product` WHERE `product_category` = 1 AND price > 100;";
           else if($p == 2)
               $sql = "SELECT * FROM `product` WHERE `product_category` = 1 AND price BETWEEN 50 AND 100;";
           else if($p == 1)
               $sql = "SELECT * FROM `product` WHERE `product_category` = 1 AND price < 50;";
       }
       else if($d_e == 2)
       {
           if($p == 3)
               $sql = "SELECT * FROM `product` WHERE `product_category` = 3 AND price > 100;";
           else if($p == 2)
               $sql = "SELECT * FROM `product` WHERE `product_category` = 3 AND price BETWEEN 50 AND 100;";
           else if($p == 1)
               $sql = "SELECT * FROM `product` WHERE `product_category` = 3 AND price < 50;";
       }
   }
   else if($h_c == 2)
   {
       if($d_e == 1)
       {
           if($p == 3)
               $sql = "SELECT * FROM `product` WHERE `product_category` = 2 AND price > 100;";
           else if($p == 2)
               $sql = "SELECT * FROM `product` WHERE `product_category` = 2 AND price BETWEEN 50 AND 100;";
           else if($p == 1)
               $sql = "SELECT * FROM `product` WHERE `product_category` = 2 AND price < 50;";
       }
       else if($d_e == 2)
       {
           if($p == 3)
               $sql = "SELECT * FROM `product` WHERE `product_category` = 4 AND price > 100;";
           else if($p == 2)
               $sql = "SELECT * FROM `product` WHERE `product_category` = 4 AND price BETWEEN 50 AND 100;";
           else if($p == 1)
               $sql = "SELECT * FROM `product` WHERE `product_category` = 4 AND price < 50;";
       }
   }
   //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
   $query = mysqli_query($_SESSION['link'], $sql);

   //如果請求成功
   if ($query)
   {
     //使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否有一筆資料
     if (mysqli_num_rows($query) > 0)
     {
       //取得的量大於0代表有資料
       //while迴圈會根據查詢筆數，決定跑的次數
       //mysqli_fetch_assoc 方法取得 一筆值
       while ($row = mysqli_fetch_assoc($query))
       {
         $datas[] = $row;
       }
     }

     //釋放資料庫查詢到的記憶體
     mysqli_free_result($query);
   }
   else
   {
     echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
   }
   //回傳結果
   return $datas;
 }

 function order($u_i, $p_i, $p_q)
 {
   $datas = null;
   $sql = "INSERT INTO customer_shopping_cart (user_id, product_id , product_quantity, in_order) VALUES ($u_i, $p_i, $p_q, 0);";
   $query = mysqli_query($_SESSION['link'], $sql);
   if ($query)
   {
     if (mysqli_num_rows($query) > 0)
     {
       while ($row = mysqli_fetch_assoc($query))
       {
         $datas[] = $row;
       }
     }
     mysqli_free_result($query);
   }
   else
   {
     echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
   }
   return $datas;
 }

 function get_category($id)
 {
   //宣告要回傳的結果
   $datas = null;
   //將查詢語法當成字串，記錄在$sql變數中
   switch ($id) {
     case 0:
       $sql = "SELECT * FROM `product` ORDER BY shop_name, price";
       break;
     case 1:
       $sql = "SELECT * FROM `product` WHERE `product_category` = 2 OR `product_category` = 4 ORDER BY `shop_name`, `price`;";
       break;
     case 2:
       $sql = "SELECT * FROM `product` WHERE product_category = 1 OR product_category = 3 ORDER BY `shop_name`, `price`;";
       break;
     case 3:
       $sql = "SELECT * FROM `product` WHERE price BETWEEN 1 AND 30  ORDER BY shop_name, price;";
       break;
     case 4:
       $sql = "SELECT * FROM `product` WHERE price BETWEEN 31 AND 60 ORDER BY shop_name, price;";
       break;
     default:
       $sql = "SELECT * FROM `product`";
       break;
   }
   //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
   $query = mysqli_query($_SESSION['link'], $sql);

   //如果請求成功
   if ($query)
   {
     //使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否有一筆資料
     if (mysqli_num_rows($query) > 0)
     {
       //取得的量大於0代表有資料
       //while迴圈會根據查詢筆數，決定跑的次數
       //mysqli_fetch_assoc 方法取得 一筆值
       while ($row = mysqli_fetch_assoc($query))
       {
         $datas[] = $row;
       }
     }

     //釋放資料庫查詢到的記憶體
     mysqli_free_result($query);
   }
   else
   {
     echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
   }
   //回傳結果
   return $datas;
 }

function search_by_shop_name($id)
{
  $datas = array();
  $sql = "SELECT * FROM `product` WHERE shop_id = {$id} ORDER BY product_name , size";
  $query = mysqli_query($_SESSION['link'], $sql);
  if ($query)
  {
    if (mysqli_num_rows($query) > 0)
    {
      while ($row = mysqli_fetch_assoc($query))
      {
        $datas[] = $row;
      }
    }
    mysqli_free_result($query);
  }
  else
  {
    echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }
  return $datas;
}

function show_shop($id)
{
  $datas = array();
  $sql = "SELECT * FROM `shop` WHERE user_id = {$id}";
  $query = mysqli_query($_SESSION['link'], $sql);
  $data  = mysqli_fetch_assoc($query);

  return $data;
}

function show_customer($id)
{
  $datas = array();
  $sql = "SELECT * FROM `customer_account` WHERE user_id = {$id}";
  $query = mysqli_query($_SESSION['link'], $sql);
  $data  = mysqli_fetch_assoc($query);

  return $data;
}




function del_product($product_id)
{
  $result = null;
  //將查詢語法當成字串，記錄在$sql變數中
  $sql = "DELETE FROM product WHERE product_id = $product_id;";
  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);
}
function del_order($product_id)
{
  $result = null;
  //將查詢語法當成字串，記錄在$sql變數中
  $sql = "DELETE FROM customer_shopping_cart WHERE product_id = $product_id;";
  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);
}
function submit_order($order_id, $shop_id, $customer_id, $product_id, $product_quantity)
{
  $result = null;
  $sql = "UPDATE `customer_shopping_cart` SET `in_order` = '1' WHERE `customer_shopping_cart`.`order_id` = $order_id;";
  $query = mysqli_query($_SESSION['link'], $sql);
  $sql1 = "INSERT INTO `order` (shop_id , customer_id , product_id, product_quantity, in_order) VALUES ({$shop_id}, {$customer_id}, {$product_id}, {$product_quantity}, 1);";
  $query1 = mysqli_query($_SESSION['link'], $sql1);
}
function add_product($pn, $pr, $s, $pc ,$id ,$shop_name)
{
 $sql = "INSERT INTO product ( product_name , price , size , product_category , shop_id , shop_name ) VALUES ('$pn', '$pr', $s, $pc, $id, '$shop_name');";
 $query = mysqli_query($_SESSION['link'], $sql);
}

function show_product($id)
{
  $data = array();
  $sql   = "SELECT * FROM `product` WHERE product_id = {$id}";
  $query = mysqli_query($_SESSION['link'], $sql);
  $data  = mysqli_fetch_assoc($query);

  return $data;
}

function edit_product($pn, $pr, $s, $pc ,$id)
{
  $data = show_product($id);
  if(empty($pn))$pn = $data['product_name'];
  if(empty($pr))$pr = $data['price'];
  if(empty($s ))$s  = $data['size'];
  if(empty($pc))$pc = $data['product_category'];
  $sql  = "UPDATE `product` SET `product_name`= '$pn' , `price`= '$pr',size = $s , product_category= $pc WHERE product_id = {$id};";
  $query= mysqli_query($_SESSION['link'], $sql);
}
function edit_order($p_i, $p_q)
{
  $sql  = "UPDATE `customer_shopping_cart` SET `product_quantity`= '$p_q' WHERE product_id = {$p_i};";
  $query= mysqli_query($_SESSION['link'], $sql);
}

function check_shopping_cart($u_i)
{
  $data = array();
  $row = array();
  $sql   = "SELECT `product`.product_name, `customer_shopping_cart`.product_quantity, `product`.price, `product`.product_id, `product`.shop_id, `customer_shopping_cart`.in_order, `customer_shopping_cart`.user_id,`customer_shopping_cart`.order_id
            FROM `product`
            LEFT JOIN `customer_shopping_cart`
            ON `product`.product_id = `customer_shopping_cart`.product_id
            WHERE `customer_shopping_cart`.user_id = {$u_i};";
  $query = mysqli_query($_SESSION['link'], $sql);
  if ($query)
  {
    //使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否有一筆資料
    if (mysqli_num_rows($query) > 0)
    {
      //取得的量大於0代表有資料
      //while迴圈會根據查詢筆數，決定跑的次數
      //mysqli_fetch_assoc 方法取得 一筆值
      while ($row = mysqli_fetch_assoc($query))
      {
        $data[] = $row;
      }
    }

    //釋放資料庫查詢到的記憶體
    mysqli_free_result($query);
  }
  else
  {
    echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }
  return $data;

}
function my_order($shop_id)
{
  $data = array();
  $sql   = "SELECT *
            FROM `order`
            WHERE `order`.shop_id = {$shop_id};";
  $query = mysqli_query($_SESSION['link'], $sql);
  if ($query)
  {
    if (mysqli_num_rows($query) > 0)
    {
      while ($row = mysqli_fetch_assoc($query))
      {
        $data[] = $row;
      }
    }
    mysqli_free_result($query);
  }
  else
  {
    echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }
  return $data;
}
function pi_to_pn($product_id)
{
  $sql = "SELECT `product_name` FROM `product` WHERE `product_id` = '{$product_id}';";
  $query = mysqli_query($_SESSION['link'], $sql);
  $data = mysqli_fetch_assoc($query);
  return $data;
}
/**
 * 檢查資料庫有無該使用者名稱
 */
function check_has_username($username)
{
	//宣告要回傳的結果
  $result = null;

  //將查詢語法當成字串，記錄在$sql變數中
  $sql = "SELECT * FROM `shop_account` WHERE `username` = '{$username}';";
  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否有一筆資料
    if (mysqli_num_rows($query) >= 1)
    {
      //取得的量大於0代表有資料
      //回傳的 $result 就給 true 代表有該帳號，不可以被新增
      $result = true;
    }

    //釋放資料庫查詢到的記憶體
    mysqli_free_result($query);
  }
  else
  {
    echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}

function customer_check_has_username($username)
{
	//宣告要回傳的結果
  $result = null;

  //將查詢語法當成字串，記錄在$sql變數中
  $sql = "SELECT * FROM `customer_account` WHERE `username` = '{$username}';";
  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否有一筆資料
    if (mysqli_num_rows($query) >= 1)
    {
      //取得的量大於0代表有資料
      //回傳的 $result 就給 true 代表有該帳號，不可以被新增
      $result = true;
    }

    //釋放資料庫查詢到的記憶體
    mysqli_free_result($query);
  }
  else
  {
    echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}

/**
 * 檢查資料庫有無該使用者名稱
 */
function add_user($username, $password, $name)
{
	//宣告要回傳的結果
  $result = null;
	//先把密碼用md5加密
	//$password = md5($password);
  //將查詢語法當成字串，記錄在$sql變數中
  $sql = "INSERT INTO `shop_account` (`username`, `password`, `shop_name`) VALUE ('{$username}', '{$password}', '{$name}');";
  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);
  //如果請求成功
  if ($query)
  {
    //使用 mysqli_affected_rows 判別異動的資料有幾筆，基本上只有新增一筆，所以判別是否 == 1
    if(mysqli_affected_rows($_SESSION['link']) == 1)
    {
      //取得的量大於0代表有資料
      //回傳的 $result 就給 true 代表有該帳號，不可以被新增
      $result = true;
    }
  }
  else
  {
    echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }


  $sql = "SELECT * FROM  `shop_account` WHERE `username` = {$username};";
  $query = mysqli_query($_SESSION['link'], $sql);
  if($query)
  {
    if(mysqli_num_rows($query) == 1)
    {
        $temp = mysqli_fetch_assoc($query);
    }
    mysqli_free_result($query);
  }
  else
  {
    echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }


  $sql  = "INSERT INTO `shop` (`user_id` , `shop_name`) VALUE ({$temp['user_id']} , '{$username}');";
  $query = mysqli_query($_SESSION['link'], $sql);
  //回傳結果
  return $result;
}

function customer_add_user($username, $password, $email, $tel, $address)
{
	//宣告要回傳的結果
  $result = null;
	//先把密碼用md5加密
	//$password = md5($password);
  //將查詢語法當成字串，記錄在$sql變數中
  $sql = "INSERT INTO `customer_account` (`username`, `password`, `email`, `tel`, `address`) VALUE ('{$username}', '{$password}', '{$email}', '{$tel}', '{$address}');";
  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);
  //如果請求成功
  if ($query)
  {
    //使用 mysqli_affected_rows 判別異動的資料有幾筆，基本上只有新增一筆，所以判別是否 == 1
    if(mysqli_affected_rows($_SESSION['link']) == 1)
    {
      //取得的量大於0代表有資料
      //回傳的 $result 就給 true 代表有該帳號，不可以被新增
      $result = true;
    }
  }
  else
  {
    echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }
  //回傳結果
  return $result;
}

/**
 * 檢查資料庫有無該使用者名稱
 */
function verify_user($username, $password)
{
  //宣告要回傳的結果
  $result = null;
  //先把密碼用md5加密
  //$password = md5($password);
  //將查詢語法當成字串，記錄在$sql變數中
  $sql = "SELECT * FROM `shop_account` WHERE `username` = '{$username}' AND `password` = '{$password}'";

  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_num_rows 回傳 $query 請求的結果數量有幾筆，為一筆代表找到會員且密碼正確。
    if(mysqli_num_rows($query) == 1)
    {
      //取得使用者資料
      $user = mysqli_fetch_assoc($query);
      //在session李設定 is_login 並給 true 值，代表已經登入
      $_SESSION['is_login'] = TRUE;
      //紀錄登入者的id，之後若要隨時取得使用者資料時，可以透過 $_SESSION['login_user_id'] 取用
      $_SESSION['login_shop_name'] = $user['shop_name'];
      $_SESSION['login_user_id']   = $user['user_id'];
      //回傳的 $result 就給 true 代表驗證成功
      $result = true;
    }
  }
  else
  {
    echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}

function customer_verify_user($username, $password)
{
  //宣告要回傳的結果
  $result = null;
  //先把密碼用md5加密
  //$password = md5($password);
  //將查詢語法當成字串，記錄在$sql變數中
  $sql = "SELECT * FROM `customer_account` WHERE `username` = '{$username}' AND `password` = '{$password}'";

  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_num_rows 回傳 $query 請求的結果數量有幾筆，為一筆代表找到會員且密碼正確。
    if(mysqli_num_rows($query) == 1)
    {
      //取得使用者資料
      $user = mysqli_fetch_assoc($query);
      //在session李設定 is_login 並給 true 值，代表已經登入
      $_SESSION['customer_is_login'] = TRUE;
      //紀錄登入者的id，之後若要隨時取得使用者資料時，可以透過 $_SESSION['login_user_id'] 取用
      $_SESSION['customer_login_user_name'] = $user['username'];
      $_SESSION['customer_login_user_id']   = $user['user_id'];
      //回傳的 $result 就給 true 代表驗證成功
      $result = true;
    }
  }
  else
  {
    echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}




/**
 * 更新會員
 */
function update_member($id, $username, $name, $password)
{
	//宣告要回傳的結果
  $result = null;
  //根據有無 password 給予不同的 語法
  if($password)
	{
		//有直代表要改密碼
		$password = md5($password);
		//更新語法
	  $sql = "UPDATE `user` SET `username` = '{$username}', `password` = '{$password}', `name` = '{$name}'
	  				WHERE `id` = {$id};";

	}
	else
	{
		//沒有就不用
		//更新語法
	  $sql = "UPDATE `user` SET `username` = '{$username}', `name` = '{$name}'
	  				WHERE `id` = {$id};";
	}

  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_affected_rows 判別異動的資料有幾筆，基本上只有新增一筆，所以判別是否 == 1
    if(mysqli_affected_rows($_SESSION['link']) == 1)
    {
      //取得的量大於0代表有資料
      //回傳的 $result 就給 true 代表有該帳號，不可以被新增
      $result = true;
    }
  }
  else
  {
    echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}

/**
 * 取得單個會員
 */
function get_user($id)
{
  //宣告要回傳的結果
  $result = null;

  //將查詢語法當成字串，記錄在$sql變數中
  $sql = "SELECT * FROM `user` WHERE `id` = {$id};";

  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否有一筆資料
    if (mysqli_num_rows($query) == 1)
    {
      //取得的量大於0代表有資料
      //while迴圈會根據查詢筆數，決定跑的次數
      //mysqli_fetch_assoc 方法取得 一筆值
      $result = mysqli_fetch_assoc($query);
    }

    //釋放資料庫查詢到的記憶體
    mysqli_free_result($query);
  }
  else
  {
    echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}



//update shop info
function shop_name_edit($id,$shop_name)
{
  //shop_name in table shop
  $sql  = "UPDATE `shop` SET `shop_name`= '$shop_name' WHERE user_id = {$id};";
  $query= mysqli_query($_SESSION['link'], $sql);
  //shop_name in table shop_account
  $sql  = "UPDATE `shop_account` SET `shop_name`= '$shop_name' WHERE user_id = {$id};";
  $query= mysqli_query($_SESSION['link'], $sql);
  //shop_name in table product
  $sql  = "UPDATE `product` SET `shop_name`= '$shop_name' WHERE shop_id = {$id};";
  $query= mysqli_query($_SESSION['link'], $sql);
}

function address_edit($id,$address)
{
  $sql  = "UPDATE `shop` SET `address`= '$address' WHERE user_id = {$id};";
  $query= mysqli_query($_SESSION['link'], $sql);
}

function about_edit($id,$about)
{
  $sql  = "UPDATE `shop` SET `about`= '$about' WHERE user_id = {$id};";
  $query= mysqli_query($_SESSION['link'], $sql);
}
function tel_edit($id,$tel)
{
  $sql  = "UPDATE `shop` SET `tel`= '$tel' WHERE user_id = {$id};";
  $query= mysqli_query($_SESSION['link'], $sql);
}
function fb_edit($id,$fb)
{
  $sql  = "UPDATE `shop` SET `fb`= '$fb' WHERE user_id = {$id};";
  $query= mysqli_query($_SESSION['link'], $sql);
}
function mail_edit($id,$mail)
{
  $sql  = "UPDATE `shop` SET `mail`= '$mail' WHERE user_id = {$id};";
  $query= mysqli_query($_SESSION['link'], $sql);
}
//update customer info
function customer_username_edit($id, $username)
{
  $sql  = "UPDATE `customer_account` SET `username`= '$username' WHERE user_id = {$id};";
  $query= mysqli_query($_SESSION['link'], $sql);
}
function customer_password_edit($id, $password)
{
  $sql  = "UPDATE `customer_account` SET `password`= '$password' WHERE user_id = {$id};";
  $query= mysqli_query($_SESSION['link'], $sql);
}
function customer_email_edit($id, $email)
{
  $sql  = "UPDATE `customer_account` SET `email`= '$email' WHERE user_id = {$id};";
  $query= mysqli_query($_SESSION['link'], $sql);
}
function customer_tel_edit($id, $tel)
{
  $sql  = "UPDATE `customer_account` SET `tel`= '$tel' WHERE user_id = {$id};";
  $query= mysqli_query($_SESSION['link'], $sql);
}
function customer_address_edit($id, $address)
{
  $sql  = "UPDATE `customer_account` SET `address`= '$address' WHERE user_id = {$id};";
  $query= mysqli_query($_SESSION['link'], $sql);
}
function order_step_2($order_id)
{
  $sql  = "UPDATE `order` SET `in_order`= 2 WHERE order_id = {$order_id};";
  $query= mysqli_query($_SESSION['link'], $sql);
}
function order_step_3($order_id)
{
  $sql  = "UPDATE `order` SET `in_order`= 3 WHERE order_id = {$order_id};";
  $query= mysqli_query($_SESSION['link'], $sql);
}

function subtotal($p_p, $p_q)
{
  return $p_p * $p_q;
}

?>
