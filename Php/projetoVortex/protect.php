<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['id'])) {
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso Negado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 90%;
        }

        h1 {
            color: #d9534f; 
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        p {
            color: #555;
            font-size: 1.1em;
            margin-bottom: 25px;
        }

        a {
            display: inline-block;
            background-color: #007bff; 
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }

        .icon {
            font-size: 3em;
            color: #d9534f;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">❌</div>
        <h1>Acesso Negado</h1>
        <p>Você não pode acessar esta página porque <strong>não está logado.</strong></p>
        <p><a href="index.php">Entrar</a></p>
    </div>
</body>
</html>
<?php
    
    die(); 
}

?>