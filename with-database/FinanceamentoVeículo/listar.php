<?php
require_once 'config.php';
$registros = $pdo->query("SELECT * FROM financiamentos ORDER BY data_cadastro DESC")->fetchAll(PDO::FETCH_ASSOC);

function fmt($v) {
    return 'R$ ' . number_format($v, 2, ',', '.');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Histórico - Financiamento de Veículos</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <a href="index.php" class="link-topo">&larr; Nova simulação</a>
    <h1>📋 Histórico de financiamentos</h1>
    <p class="subtitulo">Todas as simulações já realizadas, da mais recente para a mais antiga.</p>

    <?php if (empty($registros)): ?>
        <p>Nenhuma simulação cadastrada ainda.</p>
    <?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Veículo</th>
                <th>Valor</th>
                <th>Entrada</th>
                <th>Parcelas</th>
                <th>Juros a.m.</th>
                <th>Parcela</th>
                <th>Total pago</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($registros as $r): ?>
            <tr>
                <td><?= htmlspecialchars($r['veiculo']) ?></td>
                <td><?= fmt($r['valor_veiculo']) ?></td>
                <td><?= fmt($r['valor_entrada']) ?></td>
                <td><?= $r['num_parcelas'] ?>x</td>
                <td><?= number_format($r['taxa_juros'], 2, ',', '.') ?>%</td>
                <td><strong><?= fmt($r['valor_parcela']) ?></strong></td>
                <td><?= fmt($r['valor_total_pago']) ?></td>
                <td><a href="excluir.php?id=<?= $r['id'] ?>" class="btn btn-perigo" onclick="return confirm('Excluir este registro?')">Excluir</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>
</body>
</html>
