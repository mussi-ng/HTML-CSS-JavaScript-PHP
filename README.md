# HTML-CSS-JavaScript-PHP (Senai)

Este repositório reúne exemplos e projetos desenvolvidos com:
- **HTML** (estrutura e páginas)
- **CSS** (layout/estilização)
- **JavaScript (JS)** (interações no navegador)
- **PHP** (backend simples; exemplos com sessões e banco quando aplicável)

## Estrutura do projeto
- **`/Senai`**: pastas organizadas por data (formato `MM-DD-YYYY`).
  - Cada pasta contém arquivos do exercício (por exemplo: `index.html`, `style.css`, `script.js`, `index.php`, `cart.php`, `processa.php`, etc.).
  - A navegação entre páginas usa **caminhos relativos** dentro de cada pasta.

## Como usar
1. Abra arquivos **`.html`**, **`.css`** e **`.js`** diretamente no navegador.
2. Para arquivos **`.php`** (ex.: `index.php`, `cart.php`, `processa.php`):
   - execute em um servidor local com PHP habilitado (ex.: XAMPP/WAMP), pois dependem do backend.

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

