<?php
require_once 'config.php';

// Busca (opcional) por nome
$termo = isset($_GET['busca']) ? trim($_GET['busca']) : '';

$sql = "SELECT p.*, c.nome AS categoria_nome
        FROM produtos p
        INNER JOIN categorias c ON c.id = p.categoria_id";

if ($termo !== '') {
    $sql .= " WHERE p.nome LIKE :termo OR p.marca LIKE :termo";
}

$sql .= " ORDER BY p.data_cadastro DESC";

$stmt = $pdo->prepare($sql);
if ($termo !== '') {
    $stmt->bindValue(':termo', "%$termo%");
}
$stmt->execute();
$produtos = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Loja de Informática - Produtos</title>
    <link rel="stylesheet" href="style.css">
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

    <?php if (isset($_GET['msg'])): ?>
        <div class="alerta alerta-sucesso">
            <?php
            $mensagens = [
                'cadastrado' => 'Produto cadastrado com sucesso!',
                'editado'    => 'Produto atualizado com sucesso!',
                'excluido'   => 'Produto excluído com sucesso!',
            ];
            echo $mensagens[$_GET['msg']] ?? 'Operação realizada com sucesso!';
            ?>
        </div>
    <?php endif; ?>

    <div class="card">
        <h2>Produtos Cadastrados</h2>

        <form class="busca-form" method="get" action="index.php">
            <input type="text" name="busca" placeholder="Buscar por nome ou marca..." value="<?= htmlspecialchars($termo) ?>">
            <button type="submit" class="btn btn-primary">Buscar</button>
            <?php if ($termo !== ''): ?>
                <a href="index.php" class="btn btn-secondary">Limpar</a>
            <?php endif; ?>
        </form>

        <?php if (count($produtos) === 0): ?>
            <div class="vazio">Nenhum produto encontrado.</div>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Produto</th>
                        <th>Categoria</th>
                        <th>Marca</th>
                        <th>Preço</th>
                        <th>Qtd.</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($produtos as $p): ?>
                    <tr>
                        <td>#<?= $p['id'] ?></td>
                        <td><?= htmlspecialchars($p['nome']) ?></td>
                        <td><span class="badge"><?= htmlspecialchars($p['categoria_nome']) ?></span></td>
                        <td><?= htmlspecialchars($p['marca']) ?></td>
                        <td>R$ <?= number_format($p['preco'], 2, ',', '.') ?></td>
                        <td><?= (int)$p['quantidade'] ?></td>
                        <td>
                            <div class="tabela-acoes">
                                <a class="btn btn-warning" href="editar.php?id=<?= $p['id'] ?>">Editar</a>
                                <a class="btn btn-danger" href="excluir.php?id=<?= $p['id'] ?>"
                                   onclick="return confirm('Deseja realmente excluir este produto?')">Excluir</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

        <div class="acoes">
            <a href="cadastrar.php" class="btn btn-primary">+ Novo Produto</a>
        </div>
    </div>
</div>

<footer>Sistema de Cadastro de Produtos de Informática &copy; <?= date('Y') ?></footer>

</body>
</html>
