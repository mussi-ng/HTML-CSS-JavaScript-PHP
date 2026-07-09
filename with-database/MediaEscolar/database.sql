-- Banco de dados: Calculadora de Média Escolar
-- Importe este arquivo no HeidiSQL (ou phpMyAdmin) antes de rodar o sistema.

CREATE DATABASE IF NOT EXISTS escola_db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE escola_db;

CREATE TABLE IF NOT EXISTS alunos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    nota1 DECIMAL(4,2) NOT NULL,
    nota2 DECIMAL(4,2) NOT NULL,
    nota3 DECIMAL(4,2) NOT NULL,
    media DECIMAL(4,2) NOT NULL,
    situacao VARCHAR(20) NOT NULL,
    data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
