# Sistema de Cadastro de Produtos de Informática

Sistema web simples (CRUD) para cadastro de produtos de uma loja de informática,
desenvolvido em **HTML, CSS, PHP** e **MySQL** (gerenciado pelo **HeidiSQL**).

## Estrutura do projeto

```
loja_informatica/
├── banco_dados.sql     -> Script para criar o banco e tabelas
├── config.php          -> Conexão PDO com o MySQL
├── index.php           -> Lista/busca produtos cadastrados
├── cadastrar.php        -> Formulário de novo produto
├── editar.php           -> Formulário de edição de produto
├── excluir.php           -> Exclusão de produto
└── css/
    └── estilo.css        -> Estilos visuais do sistema
```

## Como rodar

### 1. Banco de Dados (HeidiSQL)
1. Abra o **HeidiSQL** e conecte no seu servidor MySQL/MariaDB (geralmente `localhost`, usuário `root`).
2. Vá em **Arquivo > Executar script SQL...** (ou "Load SQL file").
3. Selecione o arquivo `banco_dados.sql` e execute.
4. Isso criará o banco `loja_informatica` com as tabelas `categorias` e `produtos`, já com alguns dados de exemplo.

### 2. Servidor PHP
Você precisa de um ambiente com PHP e MySQL, por exemplo:
- **XAMPP** / **WAMP** / **Laragon** (mais comuns no Windows)

Passos:
1. Copie a pasta `loja_informatica` para dentro de `htdocs` (XAMPP) ou `www` (Laragon/WAMP).
2. Abra o arquivo `config.php` e confira/ajuste os dados de acesso:
   ```php
   $host    = 'localhost';
   $dbname  = 'loja_informatica';
   $usuario = 'root';
   $senha   = ''; // senha do seu MySQL, se houver
   ```
3. Inicie o Apache e o MySQL no painel do XAMPP/Laragon.
4. Acesse no navegador: `http://localhost/loja_informatica/index.php`

## Funcionalidades
- ✅ Listagem de produtos cadastrados (com categoria, marca, preço e estoque)
- ✅ Busca por nome ou marca
- ✅ Cadastro de novo produto (com validação de campos obrigatórios)
- ✅ Edição de produto existente
- ✅ Exclusão de produto (com confirmação)
- ✅ Mensagens de sucesso após cada operação
- ✅ Interface responsiva com CSS próprio

## Possíveis melhorias futuras
- Autenticação de usuários (login/senha)
- Upload de imagem do produto
- Relatórios de estoque (PDF/Excel)
- Paginação da listagem de produtos
- Cadastro/edição de categorias diretamente pela interface
