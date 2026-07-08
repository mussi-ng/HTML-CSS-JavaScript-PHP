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


## Como usar
1. Abra arquivos **`.html`**, **`.css`** e **`.js`** diretamente no navegador.
2. Para arquivos **`.php`** (ex.: `index.php`, `cart.php`, `processa.php`):
  - execute em um servidor local com PHP habilitado (ex.: XAMPP/WAMP), pois dependem do backend.

### Como usar o Banco de Dados (HeidiSQL)
1. Abra o **HeidiSQL** e conecte no seu servidor MySQL/MariaDB (geralmente `localhost`, usuário `root`).
2. Vá em **Arquivo > Executar script SQL...** (ou "Load SQL file").
3. Selecione o arquivo `.sql` e execute.


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