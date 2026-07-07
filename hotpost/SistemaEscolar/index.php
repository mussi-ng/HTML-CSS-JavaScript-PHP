<!-- =========================================================
	sisescola.php
	- Boletim com médias e status de dois alunos (exemplo PHP)
	- Contém um formulário simples (sem processamento)
========================================================= -->
<html>
	<head>
		<title>Sistema de Notas Escolares</title>
	</head>

	<body>
		<h1>Boletim de Notas - Turma ABC</h1>
		<p>Abaixo estão os resultados do semestre dos nossos alunos.</p>
		<hr>

		<!-- ======================================================
			FORM (apenas exemplo)
			- O conteúdo não é processado (GET vazio)
		====================================================== -->
		<form action="" method="GET">
			<input type="number"><br>
		</form>

		<?php
			// ======================================================
			// 1) ALUNO 1
			// ======================================================
			$nomeAluno1 = "Nícolas Mussi";
			$nota1_aluno1 = 8.5;
			$nota2_aluno1 = 7.0;

			// Calcula a média final do aluno 1.
			$media_aluno1 = ($nota1_aluno1 + $nota2_aluno1) / 2;

			// Renderiza nome, notas e média.
			echo "<p>Aluno: " . $nomeAluno1 . "</p>";
			echo "<p>Nota 1: " . $nota1_aluno1 . " | Nota 2: " . $nota2_aluno1 . "</p>";
			echo "<p>Média Final: " . $media_aluno1 . "</p>";

			// Define status do aluno 1 com base na média.
			if ($media_aluno1 >= 7.0){
				echo "<p>Status: Aprovado! Parabéns pelo esforço.</p>";
			}elseif ($media_aluno1 >= 5.0){
				echo "<p>Status: Em Recuperação. Estude mais um pouco <;p>";
			}else {
				echo "<p>Status: Reprovado. Nos vemos no próximo ano.</p>";
			}

			// ======================================================
			// Separador + ALUNO 2
			// ======================================================
			echo "<hr>";

			$nomeAluno2 = "Mariana Costa";
			$nota1_aluno2 = 5.5;
			$nota2_aluno2 = 6.0;

			// Calcula a média final do aluno 2.
			$media_aluno2 = ($nota1_aluno2 + $nota2_aluno2) / 2;

			// Renderiza nome, notas e média do aluno 2.
			echo "<p>Aluno: " . $nomeAluno2 . "</p>";
			echo "<p>Nota 1: " . $nota1_aluno2 . " | Nota 2: " . $nota2_aluno2 . "</p>";
			echo "<p>Média Final: " . $media_aluno2 . "</p>";

			// Define status do aluno 2 com base na média.
			if ($media_aluno2 >= 7.0){
				echo "<p>Status: Aprovado! Parabéns pelo esforço.</p>";
			}elseif ($media_aluno2 >= 5.0){
				echo "<p>Status: Em Recuperação. Estude mais um pouco </p>";
			}else {
				echo "<p>Status: <strong>Reprovado.</strong> Nos vemos no próximo ano.</p>";
			}
		?>

		<!-- ======================================================
			RODAPÉ/Texto final
		====================================================== -->
		<p>Fim do relatorio de notas do sistema</p>
	</body>
</html>

