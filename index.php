<?php
require 'db.php';
$query = "SELECT * FROM veiculos";
$stmt = $pdo->query($query);
$veiculos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Veículos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Lista de Veículos</h1>
    <a href="create.php" class="btn">Adicionar Veículo</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Modelo</th>
                <th>Ano</th>
                <th>Placa</th>
                <th>ID Motorista</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($veiculos as $veiculo): ?>
                <tr>
                    <td><?= htmlspecialchars($veiculo['id_veiculo']) ?></td>
                    <td><?= htmlspecialchars($veiculo['modelo']) ?></td>
                    <td><?= htmlspecialchars($veiculo['ano']) ?></td>
                    <td><?= htmlspecialchars($veiculo['placa']) ?></td>
                    <td><?= htmlspecialchars($veiculo['id_motorista'] ?? 'N/A') ?></td>
                    <td>
                        <a href="update.php?id=<?= $veiculo['id_veiculo'] ?>">Editar</a>
                        <a href="delete.php?id=<?= $veiculo['id_veiculo'] ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
