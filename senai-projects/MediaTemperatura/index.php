<!-- =========================================================
	medTemp.php
	- Sistema simples de medição de temperatura
	- Usa form POST e PHP para comparar faixas e exibir mensagens
========================================================= -->
<html>
	<head>
		<title>Sistema de Medição de Temperatura</title>
	</head>

	<body>
		<h1>TEMPERATURA</h1>
		<hr>

		<!-- ======================================================
			FORM
			- Envia temperatura via POST para este mesmo arquivo
		====================================================== -->
		<form method="POST">
			Digite a temperatura:
			<input type="number" name="Temperatura">
			<br><br>
			<input type="submit" value="Enviar">
		</form>

		<?php
			// ======================================================
			// 1) Mensagens por faixa (variáveis)
			// ======================================================
			$F = "Quem não tem sua morena, loira, ou ruiva, <strong>Boa Sorte!</strong>, temperatura abaixo de 29 °C";
			$M = "Ta calor mas não ta sol, vulgo neblina quente, temperatura maior que 30 °C";
			$C = "Chegamos em <strong>Bangu</strong>, o Dianho está a esquerda junto com o termômetro, que está batendo apenas <strong>40 °C</strong>";

			// Variável usada para guardar o valor digitado (mantida).
			$Temp;

			// Separador visual antes da saída do resultado.
			echo "<hr>";

			// ======================================================
			// 2) Processamento do POST
			// ======================================================
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$Temp = (int) $_POST["Temperatura"];
				echo "Temperatura digitada: $Temp °C";
				echo "<hr>";

				// ==================================================
				// 3) Regras de decisão (faixas de temperatura)
				// ==================================================
				if ($Temp >= 40) {
					echo "<p>$C</p>";
				} elseif ($Temp >= 30) {
					echo "<p>$M</p>";
				} else {
					echo "<p>$F</p>";
				}

				echo "<hr>";
			}
		?>

		<!-- ======================================================
			RODAPÉ/Texto final
		====================================================== -->
		<p>Fim do relatório de Temperatura.</p>
	</body>
</html>

