/*
 * === Sistema de Financiamento de Veículos === 
 * Descrição: Este script calcula o financiamento de um veículo com base em:
 *            valor do veículo, entrada, número de parcelas e taxa de juros. 
 * O resultado é armazenado em um banco de dados.
 */
<?php
require_once 'config.php';

$erro = null;
$resultado = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $veiculo = trim($_POST['veiculo'] ?? '');
    $valor_veiculo = filter_input(INPUT_POST, 'valor_veiculo', FILTER_VALIDATE_FLOAT);
    $valor_entrada = filter_input(INPUT_POST, 'valor_entrada', FILTER_VALIDATE_FLOAT);
    $num_parcelas = filter_input(INPUT_POST, 'num_parcelas', FILTER_VALIDATE_INT);
    $taxa_juros = filter_input(INPUT_POST, 'taxa_juros', FILTER_VALIDATE_FLOAT);

    if ($veiculo === '' || $valor_veiculo === false || $valor_entrada === false || $num_parcelas === false || $taxa_juros === false) {
        $erro = "Preencha todos os campos corretamente.";
    } elseif ($valor_entrada >= $valor_veiculo) {
        $erro = "O valor de entrada deve ser menor que o valor do veículo.";
    } elseif ($num_parcelas <= 0) {
        $erro = "O número de parcelas deve ser maior que zero.";
    } else {
        $valor_financiado = $valor_veiculo - $valor_entrada;
        $i = $taxa_juros / 100; // taxa mensal em decimal

        if ($i > 0) {
            // Sistema de amortização francês (Tabela Price)
            $valor_parcela = $valor_financiado * ($i / (1 - pow(1 + $i, -$num_parcelas)));
        } else {
            // Sem juros: divide igualmente
            $valor_parcela = $valor_financiado / $num_parcelas;
        }

        $valor_parcela = round($valor_parcela, 2);
        $valor_total_financiado_pago = round($valor_parcela * $num_parcelas, 2);
        $valor_total_pago = round($valor_total_financiado_pago + $valor_entrada, 2);
        $total_juros = round($valor_total_financiado_pago - $valor_financiado, 2);

        $stmt = $pdo->prepare("INSERT INTO financiamentos (veiculo, valor_veiculo, valor_entrada, num_parcelas, taxa_juros, valor_parcela, valor_total_pago, total_juros) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$veiculo, $valor_veiculo, $valor_entrada, $num_parcelas, $taxa_juros, $valor_parcela, $valor_total_pago, $total_juros]);

        $resultado = [
            'veiculo' => $veiculo,
            'valor_veiculo' => $valor_veiculo,
            'valor_entrada' => $valor_entrada,
            'valor_financiado' => $valor_financiado,
            'num_parcelas' => $num_parcelas,
            'taxa_juros' => $taxa_juros,
            'valor_parcela' => $valor_parcela,
            'valor_total_pago' => $valor_total_pago,
            'total_juros' => $total_juros,
        ];
    }
} else {
    header('Location: index.php');
    exit;
}

function fmt($v) {
    return 'R$ ' . number_format($v, 2, ',', '.');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Resultado - Financiamento de Veículos</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <a href="index.php" class="link-topo">&larr; Nova simulação</a>
    <h1>🚗 Resultado da simulação</h1>

    <?php if ($erro): ?>
        <div class="erro"><?= htmlspecialchars($erro) ?></div>
        <a href="index.php" class="btn">Voltar</a>
    <?php else: ?>
        <div class="resultado">
            <h2><?= htmlspecialchars($resultado['veiculo']) ?></h2>
            <div class="resumo-grid">
                <div class="item"><span class="label">Valor do veículo</span><span class="valor"><?= fmt($resultado['valor_veiculo']) ?></span></div>
                <div class="item"><span class="label">Entrada</span><span class="valor"><?= fmt($resultado['valor_entrada']) ?></span></div>
                <div class="item"><span class="label">Valor financiado</span><span class="valor"><?= fmt($resultado['valor_financiado']) ?></span></div>
                <div class="item"><span class="label">Taxa de juros (a.m.)</span><span class="valor"><?= number_format($resultado['taxa_juros'], 2, ',', '.') ?>%</span></div>
                <div class="item"><span class="label">Nº de parcelas</span><span class="valor"><?= $resultado['num_parcelas'] ?>x</span></div>
                <div class="item"><span class="label">Valor da parcela</span><span class="valor"><?= fmt($resultado['valor_parcela']) ?></span></div>
                <div class="item"><span class="label">Total de juros</span><span class="valor"><?= fmt($resultado['total_juros']) ?></span></div>
                <div class="item"><span class="label">Total pago ao final</span><span class="valor"><?= fmt($resultado['valor_total_pago']) ?></span></div>
            </div>
        </div>
        <div class="acoes" style="margin-top:20px;">
            <a href="index.php" class="btn">Nova simulação</a>
            <a href="listar.php" class="btn btn-secundario">Ver histórico</a>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
