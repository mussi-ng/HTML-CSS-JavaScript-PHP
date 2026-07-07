CREATE DATABASE serasa;

USE serasa;

CREATE TABLE clientes (
    cliente VARCHAR(50) NOT NULL,
    cpf VARCHAR(11) NOT NULL
    pendencia varchar(50) NOT NULL,
);

INSERT INTO clientes (cliente, cpf, pendencia)
VALUES
('joao', '12345678910', 'pendente'),
('maria', '10987654321', 'confiavel');