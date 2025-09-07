<?php
$host = 'db'; $dbname = 'sfa'; $user = 'user'; $pass = 'pass';
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

$id = $_GET['id'] ?? null;
if (!$id) die("IDが必要です");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE customers SET name=?, email=? WHERE id=?");
    $stmt->execute([$_POST['name'], $_POST['email'], $id]);
    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM customers WHERE id=?");
$stmt->execute([$id]);
$customer = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$customer) die("顧客が存在しません");
?>

<h1>顧客編集</h1>
<form method="post">
    名前: <input type="text" name="name" value="<?= htmlspecialchars($customer['name']) ?>" required><br>
    メール: <input type="email" name="email" value="<?= htmlspecialchars($customer['email']) ?>" required><br>
    <button type="submit">更新</button>
</form>
<a href="index.php">一覧に戻る</a>
