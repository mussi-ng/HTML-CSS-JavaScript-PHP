<?php
require_once 'config.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($id) {
    $stmt = $pdo->prepare("DELETE FROM financiamentos WHERE id = ?");
    $stmt->execute([$id]);
}
header('Location: listar.php');
exit;
