<?php
// ============================================
// CART.PHP - Carrinho de compras
// Gerencia adicionar, remover e exibir itens
// usando sessões PHP (sem login necessário)
// ============================================

// Inicia a sessão para guardar o carrinho.
session_start();

// Inclui a conexão com o banco (config.php).
// Esse arquivo deve definir a variável $pdo.
require_once 'config.php';

// Se o carrinho ainda não existe na sessão, cria um array vazio.
// Formato: [id_produto => quantidade]
if (!isset($_SESSION['carrinho'])) {
	$_SESSION['carrinho'] = [];
}

// ============================================
// PROCESSAMENTO DAS AÇÕES (add, remove, clear)
// ============================================

// Ação vinda da URL (ex.: cart.php?action=add&id=3)
$action = $_GET['action'] ?? '';

// ID do produto (0 se não informado)
$id = $_GET['id'] ?? 0;

// Garante que é número inteiro.
$id = (int)$id;

// ------------------------------
// AÇÃO: ADICIONAR PRODUTO
// ------------------------------
if ($action === 'add' && $id > 0) {

	// Verifica se o produto existe no banco.
	$sql = 'SELECT id FROM produtos WHERE id = ?';
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$id]);

	if ($stmt->fetch()) {
		// Se o produto já está no carrinho, incrementa quantidade.
		if (isset($_SESSION['carrinho'][$id])) {
			$_SESSION['carrinho'][$id]++;
		} else {
			// Caso contrário, adiciona com quantidade 1.
			$_SESSION['carrinho'][$id] = 1;
		}
	}

	// Redireciona de volta para o index.
	header('Location: index.php');
	exit;
}

// ------------------------------
// AÇÃO: REMOVER PRODUTO
// ------------------------------
if ($action === 'remove' && $id > 0) {

	// Remove do carrinho (se existir).
	if (isset($_SESSION['carrinho'][$id])) {
		unset($_SESSION['carrinho'][$id]);
	}

	// Redireciona para o próprio carrinho.
	header('Location: cart.php');
	exit;
}

// ------------------------------
// AÇÃO: LIMPAR CARRINHO
// ------------------------------
if ($action === 'clear') {

	// Esvazia todo o carrinho.
	$_SESSION['carrinho'] = [];

	// Redireciona para o carrinho.
	header('Location: cart.php');
	exit;
}

// ============================================
// EXIBIÇÃO DO CARRINHO
// ============================================

// Monta a lista de itens do carrinho (com nome, preço, qtd e subtotal).
$itensCarrinho = [];
$total = 0;

if (!empty($_SESSION['carrinho'])) {

	// Pega os IDs dos produtos presentes no carrinho.
	$ids = array_keys($_SESSION['carrinho']);

	// Cria placeholders para consulta parametrizada.
	$placeholders = implode(',', array_fill(0, count($ids), '?'));

	// Busca os dados no banco para esses IDs.
	$sql = "SELECT * FROM produtos WHERE id IN ($placeholders)";
	$stmt = $pdo->prepare($sql);
	$stmt->execute($ids);
	$produtosBanco = $stmt->fetchAll();

	// Enriquecimento: calcula subtotais e total geral.
	foreach ($produtosBanco as $p) {
		$qtd = $_SESSION['carrinho'][$p['id']];
		$subtotal = $p['preco'] * $qtd;
		$total += $subtotal;

		$itensCarrinho[] = [
			'id' => $p['id'],
			'nome' => $p['nome'],
			'preco' => $p['preco'],
			'qtd' => $qtd,
			'subtotal' => $subtotal,
		];
	}
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Carrinho - Supermercado Online</title>
	<link rel="stylesheet" href="style.css">
	<script src="script.js" defer></script>
</head>
<body>

	<header>
		<h1>🛒 Seu Carrinho</h1>
		<nav>
			<a href="index.php" class="btn-carrinho">⬅ Voltar às Compras</a>
		</nav>
	</header>

	<main>

		<?php if (empty($itensCarrinho)): ?>
			<!-- Carrinho vazio -->
			<div class="carrinho-vazio">
				<p>😕 Seu carrinho está vazio.</p>
				<a href="index.php" class="btn-add">Ver Produtos</a>
			</div>
		<?php else: ?>
			<!-- Tabela com os itens do carrinho -->
			<table class="tabela-carrinho">
				<thead>
					<tr>
						<th>Produto</th>
						<th>Preço Unit.</th>
						<th>Qtd.</th>
						<th>Subtotal</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($itensCarrinho as $item): ?>
						<tr>
							<td><?php echo htmlspecialchars($item['nome']); ?></td>
							<td>R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?></td>
							<td><?php echo $item['qtd']; ?></td>
							<td>R$ <?php echo number_format($item['subtotal'], 2, ',', '.'); ?></td>
							<td>
								<!-- Link para remover este item específico -->
								<a href="cart.php?action=remove&id=<?php echo $item['id']; ?>"
								   class="btn-remove">
									🗑️ Remover
								</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="3"><strong>Total</strong></td>
						<td colspan="2"><strong>R$ <?php echo number_format($total, 2, ',', '.'); ?></strong></td>
					</tr>
				</tfoot>
			</table>

			<!-- Botões de ação (limpar / finalizar) -->
			<div class="acoes-carrinho">
				<a href="cart.php?action=clear" class="btn-limpar"
				   onclick="return confirm('Tem certeza que deseja esvaziar o carrinho?')">
					🧹 Limpar Carrinho
				</a>

				<a href="#" id="btn-finalizar" class="btn-finalizar" data-total="<?php echo $total; ?>">
					✅ Finalizar Compra
				</a>
			</div>
		<?php endif; ?>

	</main>

	<footer>
		<p>&copy; <?php echo date('Y'); ?> Supermercado Online</p>
	</footer>

</body>
</html>

