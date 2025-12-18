<?php
include('protect.php');
include('conexao.php');

$id = intval($_GET['id']);
$sql = "SELECT * FROM orcamentos WHERE id = '$id'";
$query = $mysqli->query($sql) or die($mysqli->error);
$orcamento = $query->fetch_assoc();

if(!$orcamento) {
    die("Orçamento não encontrado.");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Orçamento #<?php echo $id; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_orcamento.css">
</head>
<body>
    <div class="topBar">
        <div class="logo">
            <a href="painel.php">
                <img src="img/logo.png" alt="" />
                <p>VORTEX</p>
            </a>
        </div>
        <div class="nav-group">
            <div class="menu-links">
                <a href="listar_orcamentos.php">Voltar</a>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 100px;">
        <h2>Editar Orçamento #<?php echo $id; ?></h2>
        
        <form action="atualizar_orcamento.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
            <fieldset>
                <legend>Dados Principais</legend>
                <div class="input-group">
                    <label>Status do Pedido:</label>
                    <select name="status" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
                        <option value="Pendente" <?php if($orcamento['status'] == 'Pendente') echo 'selected'; ?>>Pendente</option>
                        <option value="Aprovado" <?php if($orcamento['status'] == 'Aprovado') echo 'selected'; ?>>Aprovado</option>
                        <option value="Rejeitado" <?php if($orcamento['status'] == 'Rejeitado') echo 'selected'; ?>>Rejeitado</option>
                    </select>
                </div>
                
                <div class="input-group">
                    <label for="cliente_nome">Nome do Cliente:</label>
                    <input type="text" name="cliente_nome" value="<?php echo htmlspecialchars($orcamento['cliente_nome']); ?>" required>
                </div>
                
                <div class="input-group">
                    <label for="cliente_email">E-mail:</label>
                    <input type="email" name="cliente_email" value="<?php echo htmlspecialchars($orcamento['cliente_email']); ?>" required>
                </div>
            </fieldset>

            <button type="submit" class="btn-submit" style="background-color: #0A70CF;">Salvar Alterações</button>
        </form>
    </div>
</body>
</html>