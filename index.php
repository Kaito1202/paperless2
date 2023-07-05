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
    <h1>ログイン</h1>
    <form method="POST" action="">
        <label for="username">ユーザー名:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">パスワード:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="ログイン">
    </form>
</body>
</html>
