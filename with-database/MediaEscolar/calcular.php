/* 
 * === Sistema de Cálculo de Média Escolar ===
 * Descrição: Este script calcula a média de três notas e determina a situação do aluno.
 *            As notas devem estar entre 0 e 10. 
 * O resultado é armazenado em um banco de dados
*/
<?php
require_once 'config.php';

$erro = null;
$resultado = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $nota1 = filter_input(INPUT_POST, 'nota1', FILTER_VALIDATE_FLOAT);
    $nota2 = filter_input(INPUT_POST, 'nota2', FILTER_VALIDATE_FLOAT);
    $nota3 = filter_input(INPUT_POST, 'nota3', FILTER_VALIDATE_FLOAT);

    if ($nome === '' || $nota1 === false || $nota2 === false || $nota3 === false) {
        $erro = "Preencha todos os campos corretamente.";
    } elseif ($nota1 < 0 || $nota1 > 10 || $nota2 < 0 || $nota2 > 10 || $nota3 < 0 || $nota3 > 10) {
        $erro = "As notas devem estar entre 0 e 10.";
    } else {
        $media = round(($nota1 + $nota2 + $nota3) / 3, 2);

        if ($media >= 7) {
            $situacao = "Aprovado";
            $classe = "aprovado";
        } elseif ($media >= 5) {
            $situacao = "Recuperação";
            $classe = "recuperacao";
        } else {
            $situacao = "Reprovado";
            $classe = "reprovado";
        }

        $stmt = $pdo->prepare("INSERT INTO alunos (nome, nota1, nota2, nota3, media, situacao) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$nome, $nota1, $nota2, $nota3, $media, $situacao]);

        $resultado = [
            'nome' => $nome,
            'nota1' => $nota1,
            'nota2' => $nota2,
            'nota3' => $nota3,
            'media' => $media,
            'situacao' => $situacao,
            'classe' => $classe,
        ];
    }
} else {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Resultado - Média Escolar</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <a href="index.php" class="link-topo">&larr; Novo cálculo</a>
    <h1>📊 Resultado</h1>

    <?php if ($erro): ?>
        <div class="erro"><?= htmlspecialchars($erro) ?></div>
        <a href="index.php" class="btn">Voltar</a>
    <?php else: ?>
        <div class="resultado">
            <h2><?= htmlspecialchars($resultado['nome']) ?></h2>
            <p>Nota 1: <?= number_format($resultado['nota1'], 2, ',', '.') ?></p>
            <p>Nota 2: <?= number_format($resultado['nota2'], 2, ',', '.') ?></p>
            <p>Nota 3: <?= number_format($resultado['nota3'], 2, ',', '.') ?></p>
            <p><strong>Média final: <?= number_format($resultado['media'], 2, ',', '.') ?></strong></p>
            <p>Situação: <span class="badge <?= $resultado['classe'] ?>"><?= $resultado['situacao'] ?></span></p>
        </div>
        <div class="acoes" style="margin-top:20px;">
            <a href="index.php" class="btn">Novo cálculo</a>
            <a href="listar.php" class="btn btn-secundario">Ver histórico</a>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
