-- ============================================================
-- Script de criação do banco de dados
-- Sistema de Cadastro de Produtos de Informática
-- Compatível com HeidiSQL / MySQL / MariaDB
-- ============================================================

CREATE DATABASE IF NOT EXISTS loja_informatica
    DEFAULT CHARACTER SET utf8mb4
    DEFAULT COLLATE utf8mb4_unicode_ci;

USE loja_informatica;

-- Tabela de categorias de produtos
CREATE TABLE IF NOT EXISTS categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(60) NOT NULL UNIQUE
) ENGINE=InnoDB;

INSERT INTO categorias (nome) VALUES
    ('Processador'),
    ('Placa-mãe'),
    ('Memória RAM'),
    ('Armazenamento (SSD/HD)'),
    ('Placa de Vídeo'),
    ('Monitor'),
    ('Periférico'),
    ('Fonte'),
    ('Gabinete'),
    ('Notebook');

-- Tabela principal de produtos
CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(120) NOT NULL,
    categoria_id INT NOT NULL,
    marca VARCHAR(60) NOT NULL,
    preco DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    quantidade INT NOT NULL DEFAULT 0,
    descricao TEXT NULL,
    data_cadastro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_produtos_categoria
        FOREIGN KEY (categoria_id) REFERENCES categorias(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
) ENGINE=InnoDB;

-- Alguns produtos de exemplo (opcional)
INSERT INTO produtos (nome, categoria_id, marca, preco, quantidade, descricao) VALUES
('Ryzen 5 5600', 1, 'AMD', 899.90, 15, 'Processador 6 núcleos, 12 threads, AM4'),
('SSD NVMe 500GB', 4, 'Kingston', 249.90, 30, 'SSD NVMe M.2 leitura até 3500MB/s'),
('Memória DDR4 16GB', 3, 'Corsair', 279.00, 20, 'Kit 2x8GB 3200MHz');
