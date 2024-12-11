<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];
    $placa = $_POST['placa'];
    $id_motorista = $_POST['id_motorista'] ?: null; // Permitir valores nulos

    $query = "INSERT INTO veiculos (modelo, ano, placa, id_motorista) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$modelo, $ano, $placa, $id_motorista]);

    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Veículo</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Adicionar Veículo</h1>
    <form action="create.php" method="POST">
        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" id="modelo" required>
        
        <label for="ano">Ano:</label>
        <input type="number" name="ano" id="ano" required>
        
        <label for="placa">Placa:</label>
        <input type="text" name="placa" id="placa" required>
        
        <label for="id_motorista">ID Motorista (Opcional):</label>
        <input type="number" name="id_motorista" id="id_motorista">
        
        <button type="submit">Salvar</button>
    </form>
    <a href="index.php" class="btn">Voltar</a>
</body>
</html>
