<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "academia";

$conexao = mysqli_connect($host, $usuario, $senha, $banco);

if (!$conexao) {
    die("Erro na conexão: " . mysqli_connect_error());
}
?>