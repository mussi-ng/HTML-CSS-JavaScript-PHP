<?php

include("conexao.php");

$aluno = $_POST['aluno'];

$sql = "SELECT * FROM aluno WHERE aluno = '$aluno'";
$resultado = mysqli_query($conexao, $sql);

if(mysqli_num_rows($resultado) > 0){
    $dados = mysqli_fetch_assoc($resultado);
    if(strtolower(trim($dados['status'])) == 'emdia'){
        $classe = "liberado";
        $mensagem = "✅ ACESSO LIBERADO";
    } else {
        $classe = "negado";
        $mensagem = "❌ ACESSO NEGADO";
    }

} else {
    $classe = "naoencontrado";
    $mensagem = "⚠️ ALUNO NÃO ENCONTRADO";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Resultado</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="resultado <?php echo $classe; ?>">
    <div class="icone">
        <?php
        if($classe == "liberado"){
            echo "✅";
        }elseif($classe == "negado"){
            echo "❌";
        }else{
            echo "⚠️";
        }
        ?>

    </div>

    <h1><?php echo $mensagem; ?></h1>

    <?php if(isset($dados)) { ?>
        <div class="nome">
            <?php echo ucfirst($dados['aluno']); ?>
        </div>

        <div class="status">
        Status: <?php 
        // Padroniza para minúsculo para evitar erros de digitação no banco
        $status_banco = strtolower(trim($dados['status'])); 

        // Faz a tradução visual
        if ($status_banco == 'emdia') {
            echo "Em dia";
        } elseif ($status_banco == 'devendo') {
            echo "Devendo";
        } 
    ?>
</div>
    <?php } ?>

    <a href="index.php" class="voltar">
        Voltar
    </a>

</div>

</body>
</html>