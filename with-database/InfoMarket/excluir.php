<?php
require_once 'config.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $stmt = $pdo->prepare("DELETE FROM produtos WHERE id = :id");
    $stmt->execute([':id' => $id]);
}

header('Location: index.php?msg=excluido');
exit;
