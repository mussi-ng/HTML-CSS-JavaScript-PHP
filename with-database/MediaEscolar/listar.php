<?php
require_once 'config.php';
$alunos = $pdo->query("SELECT * FROM alunos ORDER BY data_cadastro DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Histórico - Média Escolar</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <a href="index.php" class="link-topo">&larr; Novo cálculo</a>
    <h1>📋 Histórico de alunos</h1>
    <p class="subtitulo">Todos os cálculos já realizados, do mais recente para o mais antigo.</p>

    <?php if (empty($alunos)): ?>
        <p>Nenhum aluno cadastrado ainda.</p>
    <?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>N1</th>
                <th>N2</th>
                <th>N3</th>
                <th>Média</th>
                <th>Situação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alunos as $a): ?>
            <tr>
                <td><?= htmlspecialchars($a['nome']) ?></td>
                <td><?= number_format($a['nota1'], 2, ',', '.') ?></td>
                <td><?= number_format($a['nota2'], 2, ',', '.') ?></td>
                <td><?= number_format($a['nota3'], 2, ',', '.') ?></td>
                <td><strong><?= number_format($a['media'], 2, ',', '.') ?></strong></td>
                <td>
                    <?php
                        $classe = $a['situacao'] === 'Aprovado' ? 'aprovado' : ($a['situacao'] === 'Recuperação' ? 'recuperacao' : 'reprovado');
                    ?>
                    <span class="badge <?= $classe ?>"><?= $a['situacao'] ?></span>
                </td>
                <td><a href="excluir.php?id=<?= $a['id'] ?>" class="btn btn-perigo" onclick="return confirm('Excluir este registro?')">Excluir</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>
</body>
</html>
