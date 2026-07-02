<!-- =========================================================
	index.php (Combinando HTML 5 + PHP)
	- Exibe idade/altura definidos em variáveis PHP
	- Demonstra echo e interpolação de strings
========================================================= -->
<html>
	<head>
		<title>Combinando o HTML 5 com o PHP</title>
	</head>

	<body>
		<?php
			// ==================================================
			// 1) Variáveis PHP
			// ==================================================
			$idade = "19";
			$altura = "1.67";

			// ==================================================
			// 2) Renderização: imprime HTML via echo
			// ==================================================
			echo "Meu nome e Carlos.<br>Eu tenho $idade anos de idade e $altura metros de altura.";
		?>
	</body>
</html>

