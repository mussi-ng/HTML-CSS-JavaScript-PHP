<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Financiamento de Veículos</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>🚗 Simulador de Financiamento de Veículos</h1>
    <p class="subtitulo">Preencha os dados abaixo para simular o financiamento pelo sistema de parcelas fixas (Tabela Price).</p>

    <form action="calcular.php" method="POST">
        <label for="veiculo">Modelo do veículo</label>
        <input type="text" id="veiculo" name="veiculo" required placeholder="Ex: Fiat Argo 2023">

        <label for="valor_veiculo">Valor do veículo (R$)</label>
        <input type="number" id="valor_veiculo" name="valor_veiculo" step="0.01" min="0.01" required placeholder="Ex: 75000.00">

        <label for="valor_entrada">Valor de entrada (R$)</label>
        <input type="number" id="valor_entrada" name="valor_entrada" step="0.01" min="0" required placeholder="Ex: 15000.00">

        <label for="num_parcelas">Número de parcelas</label>
        <input type="number" id="num_parcelas" name="num_parcelas" min="1" max="120" required placeholder="Ex: 48">

        <label for="taxa_juros">Taxa de juros ao mês (%)</label>
        <input type="number" id="taxa_juros" name="taxa_juros" step="0.01" min="0" required placeholder="Ex: 1.5">

        <div class="acoes">
            <button type="submit" class="btn">Simular financiamento</button>
            <a href="listar.php" class="btn btn-secundario">Ver histórico</a>
        </div>
    </form>
</div>
</body>
</html>
