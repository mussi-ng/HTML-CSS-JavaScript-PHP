-- Banco de dados: Sistema de Financiamento de Veículos
-- Importe este arquivo no HeidiSQL (ou phpMyAdmin) antes de rodar o sistema.

CREATE DATABASE IF NOT EXISTS financiamento_db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE financiamento_db;

CREATE TABLE IF NOT EXISTS financiamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    veiculo VARCHAR(100) NOT NULL,
    valor_veiculo DECIMAL(10,2) NOT NULL,
    valor_entrada DECIMAL(10,2) NOT NULL,
    num_parcelas INT NOT NULL,
    taxa_juros DECIMAL(5,2) NOT NULL,
    valor_parcela DECIMAL(10,2) NOT NULL,
    valor_total_pago DECIMAL(10,2) NOT NULL,
    total_juros DECIMAL(10,2) NOT NULL,
    data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
