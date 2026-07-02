<?php
	// =========================================================
	// processa.php
	// - Recebe dados via POST do formContato.html
	// - Sanitiza entrada com htmlspecialchars (proteção inicial contra XSS)
	// - Exibe os dados recebidos ou mensagem de acesso inválido
	// =========================================================

	// 1) Valida se o request chegou por POST
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		// 2) Captura e sanitiza os campos enviados
		$nome = htmlspecialchars($_POST['nome']);
		$email = htmlspecialchars($_POST['email']);
		$mensagem = htmlspecialchars($_POST['mensagem']);

		// 3) Exibe os dados recebidos de volta na tela
		echo "<h2>Dados recebidos com sucesso no servidor!</h2>";
		echo "<p><strong>Nome:</strong>" . $nome . "</p>";
		echo "<p><strong>E-mail:</strong>" . $email . "</p>";
		echo "<p><strong>Mensagem:</strong>" . $mensagem . "</p>";

		// Link simples para voltar ao formulário
		echo '<br><a href="formContato.html">Voltar para o formulario</a>';
	} else {
		// 4) Se alguém acessar diretamente pela barra de endereço
		echo "<h2>Acesso invalido.</h2>";
		echo "<p>Por favor, preencha o formulario primeiro.</p>";
	}
?>

