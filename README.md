# web-development-projects

Este repositório reúne exemplos e projetos desenvolvidos com:
- **HTML** (estrutura e páginas)
- **CSS** (layout/estilização)
- **JavaScript (JS)** (interações no navegador)
- **PHP** (backend simples; exemplos com sessões e banco quando aplicável)
- **SQL** (banco de dados simples, quando aplicável)


## Estrutura do repositório
- Este repositório está dividido entre sites hotpost e sites que usam database.
- **`/hotpost`**: é uma pasta organizada por nome do projeto com sites simples e sem uma lógica complexa.
- **`/with-database`**: é uma pasta organizada por nome do projeto com sites mais complexos e que usaram banco de dados.

## Como rodar

### 1. Banco de Dados (HeidiSQL)
Para utilizar o banco de dados do projeto, é necessário ter um servidor MySQL ou MariaDB configurado.
- **HeidiSQL** (é o que está sendo utilizado atualmente)

Passos:
1. Abra o **HeidiSQL** e conecte no seu servidor MySQL/MariaDB (geralmente `localhost`, usuário `root`).
2. Vá em **Arquivo > Executar script SQL...** (ou "Load SQL file").
3. Selecione o arquivo `.sql` e execute.
4. Isso criará o banco com as tabelas já com alguns dados de exemplo.

### 2. Servidor PHP
Você precisa de um ambiente com PHP e MySQL, por exemplo:
- **XAMPP** / **WAMP** / **Laragon** (mais comuns no Windows)

Passos:
1. Copie a pasta para dentro de `htdocs` (XAMPP) ou `www` (Laragon/WAMP).
2. Abra o arquivo `config.php` e confira/ajuste os dados de acesso:
   ```php
   $host    = 'localhost';
   $dbname  = 'nome_db';
   $usuario = 'root';
   $senha   = ''; // senha do seu MySQL, se houver
   ```
3. Inicie o Apache e o MySQL no painel do XAMPP/Laragon.
4. Acesse no navegador: `http://localhost/`

### 3. Arquivos HTML, CSS e JS
Não é necessário instalar PHP, MySQL ou qualquer servidor específico.

Passos:
1. Baixe ou extraia a pasta do projeto.
2. Abra o arquivo `index.html` em qualquer navegador moderno.
3. Caso utilize o VS Code, recomenda-se instalar a extensão **Live Server**.
4. Clique com o botão direito em `index.html` e selecione **Open with Live Server**.
5. O projeto será aberto automaticamente no navegador.

Acesso:
- Diretamente pelo arquivo: `index.html`
- Com Live Server: `http://localhost:5500/`


## Tecnologias (resumo)
### HTML
Define a estrutura semântica das páginas (ex.: `header`, `main`, `section`, `footer`) e formulários.

### CSS
Responsável pelo visual (reset, layout, grids e responsividade).

### JavaScript (JS)
Usado para efeitos e validações simples no front-end (ex.: `DOMContentLoaded`, listeners e redirecionamentos).

### PHP
Backend para:
- processar formulários (`processa.php`);
- controlar sessões (ex.: carrinho via `session_start()`);
- conectar com banco via PDO quando presente (`config.php`).

### SQL 
Responsável pela persistência e gerenciamento dos dados no banco (ex.: MySQL). Usado para:
- criar e estruturar tabelas (`CREATE TABLE`);
- salvar e manipular informações enviadas pelos formulários (`INSERT`, `UPDATE`);
- buscar e filtrar dados dinâmicos para exibição na tela (`SELECT` com `WHERE` e `JOIN`).