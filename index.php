<?php
// データベース接続情報
$host = "localhost";
$username = "root";
$password = "root";
$database = "test1";

// データベースに接続
$connection = new mysqli($host, $username, $password, $database);

// フォームが送信された場合
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 入力値の取得
    $username = $_POST["username"];
    $password = $_POST["password"];

    // 入力値の検証
    $query = "SELECT id FROM test1 WHERE user = '$username' AND password = '$password'";
    $result = $connection->query($query);

    if ($result && $result->num_rows > 0) {
        // ログイン成功
        echo "ログインに成功しました。";
    } else {
        // ログイン失敗
        echo "ユーザー名またはパスワードが正しくありません。";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>ログイン</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <div class="main"> 
    <form method="POST" action="">
    <div class="id">ログインID</div>
    <input type ="submit" value="ログイン" name="button"></input>
    <div class="password">パスワード</div>
    <input type="text" id="password" name="password"></input>
    <input type="text" id="username" name="user"></input>
    </form>
  </div>
</body>
</html>
