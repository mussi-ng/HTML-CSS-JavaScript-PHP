<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Calculadora de Média Escolar</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>📊 Calculadora de Média Escolar</h1>
    <p class="subtitulo">Informe o nome do aluno e as três notas para calcular a média final.</p>

    <form action="calcular.php" method="POST">
        <label for="nome">Nome do aluno</label>
        <input type="text" id="nome" name="nome" required placeholder="Ex: Maria Silva">

        <label for="nota1">Nota 1</label>
        <input type="number" id="nota1" name="nota1" step="0.1" min="0" max="10" required placeholder="0 a 10">

        <label for="nota2">Nota 2</label>
        <input type="number" id="nota2" name="nota2" step="0.1" min="0" max="10" required placeholder="0 a 10">

        <label for="nota3">Nota 3</label>
        <input type="number" id="nota3" name="nota3" step="0.1" min="0" max="10" required placeholder="0 a 10">

        <div class="acoes">
            <button type="submit" class="btn">Calcular média</button>
            <a href="listar.php" class="btn btn-secundario">Ver histórico</a>
        </div>
    </form>
</div>
</body>
</html>
