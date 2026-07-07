<?php
/**
 * Arquivo de conexão com o Banco de Dados
 * Ajuste $host, $usuario e $senha conforme sua configuração no HeidiSQL/MySQL.
 */

$host    = 'localhost';
$dbname  = 'loja_informatica';
$usuario = 'root';
$senha   = ''; // coloque a senha do seu MySQL, se houver

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $usuario,
        $senha,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch (PDOException $e) {
    die('Erro na conexão com o banco de dados: ' . $e->getMessage());
}
