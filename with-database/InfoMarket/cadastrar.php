<?php
require_once 'config.php';

$erro = '';

// Busca categorias para o select
$categorias = $pdo->query("SELECT * FROM categorias ORDER BY nome")->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome        = trim($_POST['nome'] ?? '');
    $categoriaId = $_POST['categoria_id'] ?? '';
    $marca       = trim($_POST['marca'] ?? '');
    $preco       = str_replace(',', '.', $_POST['preco'] ?? '0');
    $quantidade  = $_POST['quantidade'] ?? 0;
    $descricao   = trim($_POST['descricao'] ?? '');

    if ($nome === '' || $categoriaId === '' || $marca === '' || $preco === '') {
        $erro = 'Preencha todos os campos obrigatórios.';
    } else {
        $stmt = $pdo->prepare(
            "INSERT INTO produtos (nome, categoria_id, marca, preco, quantidade, descricao)
             VALUES (:nome, :categoria_id, :marca, :preco, :quantidade, :descricao)"
        );
        $stmt->execute([
            ':nome'         => $nome,
            ':categoria_id' => $categoriaId,
            ':marca'        => $marca,
            ':preco'        => $preco,
            ':quantidade'   => $quantidade,
            ':descricao'    => $descricao,
        ]);

        header('Location: index.php?msg=cadastrado');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<header>
    <h1>🖥️ Loja de Informática</h1>
    <nav>
        <a href="index.php">Produtos</a>
        <a href="cadastrar.php">Novo Produto</a>
    </nav>
</header>

<div class="container">
    <div class="card">
        <h2>Cadastrar Novo Produto</h2>

        <?php if ($erro): ?>
            <div class="alerta alerta-erro"><?= htmlspecialchars($erro) ?></div>
        <?php endif; ?>

        <form method="post" action="cadastrar.php">
            <div class="form-grid">
                <div class="form-full">
                    <label for="nome">Nome do Produto *</label>
                    <input type="text" id="nome" name="nome" required
                           value="<?= htmlspecialchars($_POST['nome'] ?? '') ?>">
                </div>

                <div>
                    <label for="categoria_id">Categoria *</label>
                    <select id="categoria_id" name="categoria_id" required>
                        <option value="">Selecione...</option>
                        <?php foreach ($categorias as $c): ?>
                            <option value="<?= $c['id'] ?>"
                                <?= (isset($_POST['categoria_id']) && $_POST['categoria_id'] == $c['id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($c['nome']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label for="marca">Marca *</label>
                    <input type="text" id="marca" name="marca" required
                           value="<?= htmlspecialchars($_POST['marca'] ?? '') ?>">
                </div>

                <div>
                    <label for="preco">Preço (R$) *</label>
                    <input type="number" step="0.01" min="0" id="preco" name="preco" required
                           value="<?= htmlspecialchars($_POST['preco'] ?? '') ?>">
                </div>

                <div>
                    <label for="quantidade">Quantidade em Estoque</label>
                    <input type="number" min="0" id="quantidade" name="quantidade"
                           value="<?= htmlspecialchars($_POST['quantidade'] ?? '0') ?>">
                </div>

                <div class="form-full">
                    <label for="descricao">Descrição</label>
                    <textarea id="descricao" name="descricao"><?= htmlspecialchars($_POST['descricao'] ?? '') ?></textarea>
                </div>
            </div>

            <div class="acoes">
                <button type="submit" class="btn btn-primary">Salvar Produto</button>
                <a href="index.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<footer>Sistema de Cadastro de Produtos de Informática &copy; <?= date('Y') ?></footer>

</body>
</html>
