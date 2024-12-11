<?php
require 'db.php';

$id = $_GET['id'] ?? null;
if ($id) {
    $stmt = $pdo->prepare("DELETE FROM veiculos WHERE id_veiculo = ?");
    $stmt->execute([$id]);
}

header('Location: index.php');
exit();
?>
