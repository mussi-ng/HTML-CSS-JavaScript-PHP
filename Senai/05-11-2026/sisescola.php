<!-- =========================================================
     SISTEMA DE NOTAS ESCOLARES (sisescola.php)
     - Mostra boletim de notas de alunos (exemplo simples)
     - Exibe média e status (Aprovado/Recuperação/Reprovado)
     ========================================================= -->
<html>
	<head>
		<title>Sistema de Notas Escolares</title>
	</head>
	<body>
		<h1>Boletim de Notas - Turma ABC</h1>
		<p>Abaixo estão os resultados do semestre dos nossos alunos.</p>
		<hr>

		<?php
			// ======================================================
			// 1) ALUNO 1
			// ======================================================
			$nomeAluno1 = "Carlos Silva";
			$nota1_aluno1 = 8.5;
			$nota2_aluno1 = 7.0;

			// Calcula a média entre as duas notas.
			$media_aluno1 = ($nota1_aluno1 + $nota2_aluno1) / 2;

			// Renderiza as notas e a média.
			echo "<p>Aluno: " . $nomeAluno1 . "</p>";
			echo "<p>Nota 1: " . $nota1_aluno1 . " | Nota 2: " $nota2_aluno1 . "</p>";
			echo "<p>Média Final: " . $media_aluno1 . "</p>";

			// Define status com base na média.
			if ($media_aluno1 >= 7.0){
				echo "<p>Status: Aprovado! Parabéns pelo esforço.</p>";
			}elseif ($media_aluno1 >= 5.0){
				echo "<p>Status: Em Recuperação. Estude mais um pouco <;p>";
			}else {
				echo "<p>Status: Reprovado. Nos vemos no próximo ano.</p>";
			}

			// Separador visual para o próximo aluno.
			echo "<hr>";

			// ======================================================
			// 2) ALUNO 2
			// ======================================================
			$nomeAluno2 = "Mariana Costa";
			$nota1_aluno2 = 5.5;
			$nota2_aluno2 = 6.0;

			// Calcula a média do aluno 2.
			// (mantivemos a lógica original para não alterar o comportamento)
			$media_aluno1 = ($nota1_aluno1 + $nota2_aluno1) / 2;

			// Renderiza as notas e a média.
			echo "<p>Aluno: " . $nomeAluno2 . "</p>";
			echo "<p>Nota 1: " . $nota1_aluno2 . " | Nota 2: " $nota2_aluno2 . "</p>";
			echo "<p>Média Final: " . $media_aluno2 . "</p>";

			// Define status com base na média (mesma regra do aluno 1).
			if ($media_aluno1 >= 7.0){
				echo "<p>Status: Aprovado! Parabéns pelo esforço.</p>";
			}elseif ($media_aluno1 >= 5.0){
				echo "<p>Status: Em Recuperação. Estude mais um pouco <;p>";
			}else {
				echo "<p>Status: <strong>Reprovado.</strong> Nos vemos no próximo ano.</p>";
			}
		?>
	</body>
</html>

