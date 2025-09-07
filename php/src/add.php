<?php
$host = 'db'; $dbname = 'sfa'; $user = 'user'; $pass = 'pass';
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO customers (name, email) VALUES (?, ?)");
    $stmt->execute([$_POST['name'], $_POST['email']]);
    header('Location: index.php');
    exit;
}
?>

<h1>新規顧客追加</h1>
<form method="post">
    名前: <input type="text" name="name" required><br>
    メール: <input type="email" name="email" required><br>
    <button type="submit">追加</button>
</form>
<a href="index.php">一覧に戻る</a>
