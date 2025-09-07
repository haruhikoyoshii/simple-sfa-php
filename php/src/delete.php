<?php
$host = 'db'; $dbname = 'sfa'; $user = 'user'; $pass = 'pass';
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

$id = $_GET['id'] ?? null;
if ($id) {
    $stmt = $pdo->prepare("DELETE FROM customers WHERE id=?");
    $stmt->execute([$id]);
}

header('Location: index.php');
exit;
