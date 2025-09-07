<?php
$host = 'db';
$dbname = 'sfa';
$user = 'user';
$pass = 'pass';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM customers ORDER BY id ASC");
    $customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("接続失敗: " . $e->getMessage());
}
?>

<h1>顧客一覧</h1>
<a href="add.php">新規顧客追加</a>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>名前</th>
        <th>メール</th>
        <th>操作</th>
    </tr>
    <?php foreach ($customers as $c): ?>
    <tr>
        <td><?= $c['id'] ?></td>
        <td><?= htmlspecialchars($c['name']) ?></td>
        <td><?= htmlspecialchars($c['email']) ?></td>
        <td>
            <a href="edit.php?id=<?= $c['id'] ?>">編集</a> |
            <a href="delete.php?id=<?= $c['id'] ?>" onclick="return confirm('削除しますか？')">削除</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
