<?php
require_once 'conexao.php'; 

$mensagem = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password_input = $_POST['password']; 

    if (empty($email) || empty($password_input)) {
        $mensagem = "Erro: Por favor, preencha todos os campos.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mensagem = "Erro: Formato de email inválido.";
    } else {
        $hashed_password = password_hash($password_input, PASSWORD_DEFAULT);


        $stmt = $mysqli->prepare("INSERT INTO usuarios (email, password) VALUES (?, ?)");

        if ($stmt === false) {
             $mensagem = "Erro ao preparar a declaração: " . $mysqli->error;
        } else {
            $stmt->bind_param("ss", $email, $hashed_password);

            if ($stmt->execute()) {
                $mensagem = "Sucesso! Usuário cadastrado: " . htmlspecialchars($email);
            } else {
                if ($mysqli->errno === 1062) { 
                    $mensagem = "Erro: O email " . htmlspecialchars($email) . " já está cadastrado.";
                } else {
                    $mensagem = "Erro ao cadastrar: " . $stmt->error;
                }
            }
            $stmt->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário PHP/MySQL</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7f9fc;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md p-8 space-y-6 bg-white shadow-2xl rounded-xl border border-gray-100">
        <h1 class="text-3xl font-extrabold text-center text-gray-900">Registo de Novo Usuario</h1>

        <?php if (!empty($mensagem)): ?>
            <div class="p-4 text-sm rounded-lg font-medium 
                <?php echo strpos($mensagem, 'Sucesso') !== false ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'; ?> border">
                <?php echo $mensagem; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="space-y-6">
            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Endereço de Email</label>
                <input type="email" id="email" name="email" required
                       class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm transition duration-150"
                       placeholder="o.seu.email@exemplo.pt">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Palavra-passe</label>
                <input type="password" id="password" name="password" required
                       class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm transition duration-150"
                       placeholder="Pelo menos 8 caracteres">
            </div>

            <button type="submit"
                    class="w-full py-2.5 text-lg text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition duration-200 ease-in-out font-semibold shadow-lg shadow-blue-200">
                Registar
            </button>
            <p>Já possui Login? <a href="index.php"><strong>Acesse aqui</strong></a>.</p>
        </form>


    </div>

</body>
</html>