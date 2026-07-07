# AcessoAcademia (FitControl)

Sistema simples de **controle de acesso** para uma academia.

O usuário digita o **nome do aluno** e o sistema consulta no banco se o aluno está **em dia** (acesso liberado) ou **devendo** (acesso negado).

---

## ✅ Como funciona

1. `index.php` exibe um formulário com o campo **Nome do aluno**.
2. O formulário envia `POST` para `verificar.php`.
3. `verificar.php` faz uma consulta na tabela `aluno`.
4. Dependendo do valor do campo `status`:
   - `emdia` → exibe **✅ ACESSO LIBERADO**
   - `devendo` (ou qualquer outro valor diferente de `emdia`) → exibe **❌ ACESSO NEGADO**
   - aluno não encontrado → exibe **⚠️ ALUNO NÃO ENCONTRADO**

---

## 📁 Estrutura de arquivos

- `index.php`
  - Página inicial com o formulário.
  - Envia os dados para `verificar.php`.

- `verificar.php`
  - Lê `$_POST['aluno']`.
  - Consulta o banco e define a classe visual (`liberado`, `negado`, `naoencontrado`).
  - Monta a mensagem final na tela.

- `conexao.php`
  - Responsável por criar a conexão com o banco MySQL via **mysqli**.

- `banco.sql`
  - Script SQL para criar o banco `academia` e a tabela `aluno`.
  - Insere exemplos de alunos.

- `style.css`
  - Estilização do layout e das mensagens por classe.

---

## 🛠️ Pré-requisitos

- PHP instalado e funcionando via servidor local (ex.: XAMPP/WAMP)
- MySQL instalado

---

## 🗄️ Configurando o banco de dados

1. Abra o MySQL (phpMyAdmin ou linha de comando).
2. Execute o arquivo `banco.sql`:

   - Cria o banco: `academia`
   - Cria a tabela: `aluno`
   - Insere exemplos:
     - `joao` → `emdia`
     - `maria` → `devendo`

3. Confirme se o banco `academia` ficou acessível.

---

## 🔌 Ajustando a conexão (se necessário)

O arquivo `conexao.php` contém as configurações:

- Host: `localhost`
- Usuário: `root`
- Senha: `""` (vazia)
- Banco: `academia`

Se seu ambiente usar outros valores (ex.: senha diferente), edite `conexao.php`.

> Arquivo: `AcessoAcademia/conexao.php`

---

## ▶️ Como testar

1. Inicie o servidor PHP (ex.: no XAMPP, habilite Apache).
2. Acesse a aplicação pelo navegador.
3. Teste com os alunos do `banco.sql`:

- Digite: `joao`
  - Esperado: **✅ ACESSO LIBERADO**

- Digite: `maria`
  - Esperado: **❌ ACESSO NEGADO**

- Digite um nome que não exista:
  - Esperado: **⚠️ ALUNO NÃO ENCONTRADO**

---

## ⚠️ Observação de segurança (importante)

No arquivo `verificar.php`, a query SQL é montada utilizando concatenação de string:

```php
$sql = "SELECT * FROM aluno WHERE aluno = '$aluno'";
```

Isso pode causar vulnerabilidade de **SQL Injection** se o sistema for exposto publicamente.

✅ Melhor prática: usar **prepared statements**.

> Este projeto é um exemplo didático e pode não ter sido preparado para cenários de produção.

---

## 📌 Autor / Curso

Projeto criado para aprendizado de integração entre **PHP + MySQL + HTML/CSS**.

