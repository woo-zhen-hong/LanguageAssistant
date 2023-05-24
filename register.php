<?php
session_start();  // 啟用交談期
$account = "";
$password = "";
// 取得表單欄位值
if (!empty($_POST['account']) and !empty($_POST['password'])) {
    $account = $_POST['account'];
    $password = $_POST['password'];
}
// 檢查是否輸入使用者名稱和密碼
if ($account != "" && $password != "") {
    
    $server = "localhost";         # MySQL/MariaDB 伺服器
    $dbuser = "jacky";       # 使用者帳號
    $dbpassword = "dCwV6FDrRWbnNUqH"; # 使用者密碼
    $dbname = "LA";    # 資料庫名稱
    
    # 連接 MySQL/MariaDB 資料庫
    $connection = new mysqli($server, $dbuser, $dbpassword, $dbname);
    
    # 檢查連線是否成功
    if ($connection->connect_error) {
        die("連線失敗：" . $connection->connect_error);
    }
      
    $sql = "INSERT INTO `account` (account , password) VALUES  ('" . $account . "','" . $password . "');";
    
    // 執行SQL查詢
    echo $sql;
    $result = mysqli_query($connection, $sql);

    $sql2 = "SELECT * FROM `account` WHERE password='";
    $sql2 .= $password . "' AND account='" . $account . "';";
    $result2 = mysqli_query($connection, $sql2);

    $total_records = mysqli_num_rows($result2);
    $user = mysqli_fetch_assoc($result2);

    // 是否有查詢到使用者記錄
    if ($total_records > 0) {
        // 成功登入, 指定Session變數
        $_SESSION['account'] = $account;
        $_SESSION["login_session"] = true;
        echo "success";
        header("Refresh: 0; url=home.php");
    } else {  // 登入失敗
        $_SESSION["login_session"] = false;
        echo "<script> {window.alert('使用者名稱已被使用！');location.href='login.html'} </script>";
    }
    //   mysqli_close($link);  // 關閉資料庫連接  
} else {
    echo "<script> {window.alert('請輸入正確的帳號密碼！');location.href='login.html'} </script>";
}