<?php
require_once 'config.php';

$id = $_GET['id'] ?? $_POST['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit;
}

$erro = '';
$categorias = $pdo->query("SELECT * FROM categorias ORDER BY nome")->fetchAll();

// Processa atualização
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
            "UPDATE produtos
             SET nome = :nome, categoria_id = :categoria_id, marca = :marca,
                 preco = :preco, quantidade = :quantidade, descricao = :descricao
             WHERE id = :id"
        );
        $stmt->execute([
            ':nome'         => $nome,
            ':categoria_id' => $categoriaId,
            ':marca'        => $marca,
            ':preco'        => $preco,
            ':quantidade'   => $quantidade,
            ':descricao'    => $descricao,
            ':id'           => $id,
        ]);

        header('Location: index.php?msg=editado');
        exit;
    }
    $produto = $_POST; // mantém os dados digitados em caso de erro
} else {
    // Busca dados atuais do produto
    $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $produto = $stmt->fetch();

    if (!$produto) {
        header('Location: index.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
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
        <h2>Editar Produto #<?= (int)$id ?></h2>

        <?php if ($erro): ?>
            <div class="alerta alerta-erro"><?= htmlspecialchars($erro) ?></div>
        <?php endif; ?>

        <form method="post" action="editar.php">
            <input type="hidden" name="id" value="<?= (int)$id ?>">

            <div class="form-grid">
                <div class="form-full">
                    <label for="nome">Nome do Produto *</label>
                    <input type="text" id="nome" name="nome" required
                           value="<?= htmlspecialchars($produto['nome']) ?>">
                </div>

                <div>
                    <label for="categoria_id">Categoria *</label>
                    <select id="categoria_id" name="categoria_id" required>
                        <?php foreach ($categorias as $c): ?>
                            <option value="<?= $c['id'] ?>"
                                <?= ($produto['categoria_id'] == $c['id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($c['nome']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label for="marca">Marca *</label>
                    <input type="text" id="marca" name="marca" required
                           value="<?= htmlspecialchars($produto['marca']) ?>">
                </div>

                <div>
                    <label for="preco">Preço (R$) *</label>
                    <input type="number" step="0.01" min="0" id="preco" name="preco" required
                           value="<?= htmlspecialchars($produto['preco']) ?>">
                </div>

                <div>
                    <label for="quantidade">Quantidade em Estoque</label>
                    <input type="number" min="0" id="quantidade" name="quantidade"
                           value="<?= htmlspecialchars($produto['quantidade']) ?>">
                </div>

                <div class="form-full">
                    <label for="descricao">Descrição</label>
                    <textarea id="descricao" name="descricao"><?= htmlspecialchars($produto['descricao'] ?? '') ?></textarea>
                </div>
            </div>

            <div class="acoes">
                <button type="submit" class="btn btn-primary">Atualizar Produto</button>
                <a href="index.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<footer>Sistema de Cadastro de Produtos de Informática &copy; <?= date('Y') ?></footer>

</body>
</html>
