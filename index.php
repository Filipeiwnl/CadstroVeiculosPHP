<?php
require 'db.php';

// Buscar todos os veículos
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
    <header>
        <h1>Lista de Veículos</h1>
        <p>Gerencie seus veículos cadastrados facilmente.</p>
    </header>
    <main>
        <a href="create.php" class="btn-primary">Adicionar Veículo</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Modelo</th>‹
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
                        <td class="actions">
                            <a href="update.php?id=<?= $veiculo['id_veiculo'] ?>" class="btn">Editar</a>
                            <a href="delete.php?id=<?= $veiculo['id_veiculo'] ?>" class="btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>
