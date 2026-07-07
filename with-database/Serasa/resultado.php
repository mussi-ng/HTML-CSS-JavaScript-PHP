<?php

include("conexao.php");
$cliente = trim($_POST['cliente']);
$cpf = trim($_POST['cpf']);

$sql = "SELECT * FROM clientes
        WHERE cliente = ?
        AND cpf = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $cliente, $cpf);
$stmt->execute();
$resultado = $stmt->get_result();

$dados = null;
if($resultado->num_rows > 0){
    $dados = $resultado->fetch_assoc();
}

$classeBody = "negado-bg";
if($dados && strtolower($dados['pendencia']) != "pendente"){
    $classeBody = "aprovado-bg";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="<?php echo $classeBody; ?>">
<div class="resultado-box">

<?php

if($dados){

    echo "<h2>Cliente encontrado!</h2>";
    echo "<p>Nome: ".$dados['cliente']."</p>";
    echo "<p>CPF: ".$dados['cpf']."</p>";

    if(strtolower($dados['pendencia']) == "pendente"){
        echo "<div class='negado'>❌ Empréstimo Negado</div>";
    }else{
        echo "<div class='aprovado'>✅ Empréstimo Aprovado</div>";
    }

} else {

    echo "<h2>Nome e CPF não correspondem.</h2>";
    echo "<a class='voltar' href='index.php'>Nova Consulta</a>";

}

?>

</div>

</body>
</html>