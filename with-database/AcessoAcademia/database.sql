CREATE DATABASE academia;
USE academia;

CREATE TABLE aluno (
    aluno VARCHAR(50),
    status VARCHAR(50)
);

INSERT INTO aluno (aluno, status) VALUES
('joao', 'emdia'),
('maria', 'devendo');