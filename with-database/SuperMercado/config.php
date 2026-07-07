<?php
// ============================================
// CONFIG.PHP - Conexão com o Banco de Dados
// ============================================

// Dados de acesso ao MySQL (ajuste se necessário).
$host = 'localhost';
$dbname = 'supermercado';
$user = 'root';
$pass = '';

try {
	// Cria a conexão PDO com o MySQL.
	$pdo = new PDO(
		"mysql:host=$host;dbname=$dbname;charset=utf8",
		$user,
		$pass
	);

	// Configura o PDO para lançar exceções em caso de erro.
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// Não exibimos mensagens de sucesso para não poluir a tela.
} catch (PDOException $erro) {
	// Em caso de falha, interrompe o script e mostra o erro.
	die('Erro na conexão com o banco de dados: ' . $erro->getMessage());
}
?>

