<?php
require 'db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM veiculos WHERE id_veiculo = ?");
$stmt->execute([$id]);
$veiculo = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];
    $placa = $_POST['placa'];
    $id_motorista = $_POST['id_motorista'] ?: null;

    $query = "UPDATE veiculos SET modelo = ?, ano = ?, placa = ?, id_motorista = ? WHERE id_veiculo = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$modelo, $ano, $placa, $id_motorista, $id]);

    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Veículo</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Editar Veículo</h1>
    <form action="update.php?id=<?= $id ?>" method="POST">
        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" id="modelo" value="<?= htmlspecialchars($veiculo['modelo']) ?>" required>
        
        <label for="ano">Ano:</label>
        <input type="number" name="ano" id="ano" value="<?= htmlspecialchars($veiculo['ano']) ?>" required>
        
        <label for="placa">Placa:</label>
        <input type="text" name="placa" id="placa" value="<?= htmlspecialchars($veiculo['placa']) ?>" required>
        
        <label for="id_motorista">ID Motorista (Opcional):</label>
        <input type="number" name="id_motorista" id="id_motorista" value="<?= htmlspecialchars($veiculo['id_motorista']) ?>">
        
        <button type="submit">Salvar</button>
    </form>
    <a href="index.php" class="btn">Voltar</a>
</body>
</html>
