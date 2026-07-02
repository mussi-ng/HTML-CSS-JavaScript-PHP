<!-- =========================================================
	sacolao.php (Preços de frutas)
	- Demonstra variáveis PHP e impressão com echo
========================================================= -->
<html>
	<head>
		<title>Sacolão do Senai</title>
	</head>
	<body>
		<?php
			// ==================================================
			// 1) Preços das frutas (variáveis)
			// ==================================================
			$banana = "6.5";
			$maca = "18.9";
			$laranja = "5.9";
			$pera = "8,5";
			$abacaxi = "15";

			// ==================================================
			// 2) Renderização: imprime preços em HTML via echo
			// ==================================================
			echo "O preco da banana e R$ $banana.";
			echo "O preco da maca e R$ $maca.";
			echo "O preco da laranja e R$ $laranja.";
			echo "O preco da pera e R$ $pera.";
			echo "O preco da abacaxi e R$ $abacaxi.";
		?>
	</body>
</html>

