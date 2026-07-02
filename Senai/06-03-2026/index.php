<?php
// ============================================
// INDEX.PHP - Página principal do supermercado
// Exibe todos os produtos cadastrados
// ============================================

// Inclui a conexão com o banco (config.php).
// Esse arquivo deve fornecer a variável $pdo.
require_once 'config.php';

// Busca todos os produtos no banco, ordenados por nome.
$sql = "SELECT * FROM produtos ORDER BY nome ASC";
$resultado = $pdo->query($sql);      // Executa a consulta SQL
$produtos = $resultado->fetchAll();  // Retorna todos os registros como array
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Supermercado Online</title>

	<!-- Link para o arquivo CSS externo (caminho relativo à pasta atual). -->
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<!-- Cabeçalho: título + navegação para o carrinho -->
	<header>
		<h1>🛒 Supermercado Online</h1>
		<nav>
			<!-- Link para a página do carrinho -->
			<a href="cart.php" class="btn-carrinho">
				🛍️ Ver Carrinho
			</a>
		</nav>
	</header>

	<!-- Conteúdo principal: lista/grade de produtos -->
	<main>
		<h2>Nossos Produtos</h2>

		<div class="produtos-grid">
			<!-- Se houver produtos, renderiza a lista; caso contrário, mostra mensagem. -->
			<?php if (count($produtos) > 0): ?>
				<!-- Loop: percorre cada produto retornado do banco -->
				<?php foreach ($produtos as $p): ?>
					<div class="produto-card">

						<!-- Nome do produto -->
						<h3><?php echo htmlspecialchars($p['nome']); ?></h3>

						<!-- Descrição (se existir) -->
						<?php if (!empty($p['descricao'])): ?>
							<p class="descricao"><?php echo htmlspecialchars($p['descricao']); ?></p>
						<?php endif; ?>

						<!-- Preço formatado com 2 casas decimais -->
						<p class="preco">R$ <?php echo number_format($p['preco'], 2, ',', '.'); ?></p>

						<!--
							Link "Adicionar ao carrinho"
							- Envia o ID do produto para cart.php
							- Ação: add
						-->
						<a href="cart.php?action=add&id=<?php echo $p['id']; ?>"
						   class="btn-add">
							➕ Adicionar
						</a>

					</div>
				<?php endforeach; ?>

			<?php else: ?>
				<!-- Mensagem caso não haja produtos cadastrados -->
				<p>Nenhum produto encontrado. Cadastre produtos no banco de dados.</p>
			<?php endif; ?>
		</div>
	</main>

	<!-- Rodapé simples -->
	<footer>
		<p>&copy; <?php echo date('Y'); ?> Supermercado Online</p>
	</footer>

</body>
</html>

