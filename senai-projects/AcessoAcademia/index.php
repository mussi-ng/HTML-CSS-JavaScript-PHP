<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Academia</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="logo">🏋️</div>
        <h1>FitControl</h1>

        <p class="subtitulo">
        Sistema de Controle de Acesso
        </p>

        <form action="verificar.php" method="POST">
            <label>Nome do aluno</label>
            <input
                type="text"
                name="aluno"
                placeholder="Digite o nome do aluno"
                required
            >
            <button type="submit">
                Verificar Acesso
            </button>
    </form>
    </div>
</body>
</html>