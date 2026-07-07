<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Consulta Serasa</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body{
    background: linear-gradient(135deg,#7e22ce,#db2777);
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.container{
    background:white;
    width:400px;
    padding:40px;
    border-radius:20px;
    box-shadow:0 15px 35px rgba(0,0,0,.3);
}

h1{
    text-align:center;
    margin-bottom:10px;
    color:#0f172a;
}

.subtitulo{
    text-align:center;
    color:#64748b;
    margin-bottom:30px;
}

label{
    display:block;
    margin-bottom:8px;
    color:#334155;
    font-weight:600;
}

input{
    width:100%;
    padding:14px;
    border:2px solid #e2e8f0;
    border-radius:10px;
    margin-bottom:20px;
    transition:.3s;
}


input:focus{
    outline:none;
    border-color:#db2777;
}

button{
    width:100%;
    padding:14px;
    border:none;
    border-radius:10px;
    background:#db2777;
    color:white;
    font-size:16px;
    font-weight:bold;
    cursor:pointer;
    transition:.3s;
}

button:hover{
    background:#be185d;
    transform:translateY(-2px);
}


</style>

</head>
<body>

<div class="container">

    <h1>Consulta de Crédito</h1>

    <p class="subtitulo">
        Verificação de perfil financeiro
    </p>

    <form action="resultado.php" method="POST">

        <label>Nome do Cliente</label>
        <input type="text" name="cliente" required>

        <label>CPF</label>
        <input type="text" name="cpf" maxlength="11" required>

        <button type="submit">
            Consultar
        </button>

    </form>

</div>

</body>
</html>