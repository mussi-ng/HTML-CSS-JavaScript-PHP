<?php
// Configurações de conexão com o banco de dados (ajuste conforme o seu HeidiSQL/MySQL)
$host = 'localhost';
$dbname = 'financiamento_db';
$user = 'root';
$pass = ''; // coloque aqui a senha do seu MySQL, se houver

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
