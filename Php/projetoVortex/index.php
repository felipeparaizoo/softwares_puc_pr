<?php
if(!isset($_SESSION)) {
    session_start();
}

include('conexao.php');

$mensagem_erro = ""; 

if (isset($_POST['email']) && isset($_POST['senha'])) {

    $email_input = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha_input = $_POST['senha']; 

    if (empty($email_input)) {
        $mensagem_erro = "Preencha seu e-mail.";
    } elseif (empty($senha_input)) {
        $mensagem_erro = "Preencha sua senha.";
    } else {

        $stmt = $mysqli->prepare("SELECT id, email, password FROM usuarios WHERE email = ?");
        
        if ($stmt === false) {
            $mensagem_erro = "Erro interno do banco de dados.";
        } else {
            $stmt->bind_param("s", $email_input);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $usuario = $result->fetch_assoc();
                $hash_armazenado = $usuario['password'];

                if (password_verify($senha_input, $hash_armazenado)) {
                    

                    $_SESSION['id'] = $usuario['id'];
                    $_SESSION['email'] = $usuario['email']; 
                    

                    header("Location: painel.php");
                    exit();
                } else {
                    $mensagem_erro = "Falha ao logar! E-mail encontrado, mas senha incorreta (password_verify falhou).";
                    $mensagem_erro = "Falha ao logar! E-mail ou senha incorretos.";
                }

            } else {
                $mensagem_erro = "Falha ao logar! E-mail não encontrado no banco de dados.";
                $mensagem_erro = "Falha ao logar! E-mail ou senha incorretos.";
            }

            $stmt->close();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Acesse sua conta</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f4f8;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">

    <div class="w-full max-w-sm p-8 space-y-6 bg-white shadow-2xl rounded-xl border border-gray-100">
        <h1 class="text-3xl font-extrabold text-center text-gray-900">Acesse sua conta</h1>

        <?php if (!empty($mensagem_erro)): ?>
            <div class="p-3 text-sm rounded-lg font-medium bg-red-100 text-red-700 border border-red-300">
                <?php echo $mensagem_erro; ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST" class="space-y-4">
            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                <input type="email" name="email" id="email" required
                       class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm transition duration-150"
                       placeholder="Seu email">
            </div>

            <div>
                <label for="senha" class="block text-sm font-medium text-gray-700">Senha</label>
                <input type="password" name="senha" id="senha" required
                       class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm transition duration-150"
                       placeholder="Sua senha">
            </div>

            <button type="submit"
                    class="w-full py-2.5 text-lg text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition duration-200 ease-in-out font-semibold shadow-lg shadow-blue-200">
                Entrar
            </button>
            <p>Não tem uma conta? <a href="cadastro.php"><strong>Cadastre-se aqui</strong></a>.</p>
        </form>
    </div>
</body>
</html>