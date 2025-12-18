<?php
include("protect.php");
include("conexao.php"); 

$erro = "";
$sucesso = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $cliente_nome = trim($_POST['cliente_nome'] ?? '');
    $cliente_email = trim($_POST['cliente_email'] ?? '');

    if (empty($cliente_nome) || empty($cliente_email) || !filter_var($cliente_email, FILTER_VALIDATE_EMAIL)) {
        $erro = "Por favor, preencha o nome e um e-mail válido do cliente.";
    }


    $descricoes = $_POST['descricao'] ?? [];
    $quantidades = $_POST['quantidade'] ?? [];
    $valores = $_POST['valor_unitario'] ?? [];
    
    $num_itens = count($descricoes);

    if ($num_itens === 0 || $num_itens !== count($quantidades) || $num_itens !== count($valores)) {
        $erro = "O orçamento deve ter pelo menos um item válido.";
    }

    if (empty($erro)) {
        
        $mysqli->begin_transaction();
        $processo_ok = true;
        $orcamento_id = 0;

        try {
            
            $sql_orcamento = "INSERT INTO orcamentos (cliente_nome, cliente_email) VALUES (?, ?)";
            $stmt_orcamento = $mysqli->prepare($sql_orcamento);
            
            if (!$stmt_orcamento) {
                throw new Exception("Erro na preparação da query de orçamento: " . $mysqli->error);
            }
            
            $stmt_orcamento->bind_param("ss", $cliente_nome, $cliente_email);
            
            if (!$stmt_orcamento->execute()) {
                throw new Exception("Erro ao inserir orçamento: " . $stmt_orcamento->error);
            }
            
            
            $orcamento_id = $mysqli->insert_id;
            $stmt_orcamento->close();

            
            $sql_item = "INSERT INTO itens_orcamento (orcamento_id, descricao, quantidade, valor_unitario) VALUES (?, ?, ?, ?)";
            $stmt_item = $mysqli->prepare($sql_item);

            if (!$stmt_item) {
                throw new Exception("Erro na preparação da query de item: " . $mysqli->error);
            }

            $stmt_item->bind_param("isid", $orcamento_id, $descricao, $quantidade, $valor_unitario);

            for ($i = 0; $i < $num_itens; $i++) {
                $descricao = trim($descricoes[$i]);
                $quantidade = (int)$quantidades[$i];
                $valor_unitario = (float)$valores[$i];

                
                if (empty($descricao) || $quantidade <= 0 || $valor_unitario <= 0) {
                    throw new Exception("Item inválido detectado: todos os campos do item devem ser preenchidos com valores positivos.");
                }

                if (!$stmt_item->execute()) {
                    throw new Exception("Erro ao inserir item " . ($i + 1) . ": " . $stmt_item->error);
                }
            }
            
            $stmt_item->close();

            $mysqli->commit();
            $sucesso = "Orçamento de ID #{$orcamento_id} cadastrado com sucesso! Todos os itens foram salvos.";

        } catch (Exception $e) {
            
            $mysqli->rollback();
            $erro = "Falha no processamento do orçamento. Nenhum dado foi salvo. Detalhes: " . $e->getMessage();
        }
    }
} else {
    $erro = "Acesso inválido. O formulário deve ser submetido via POST.";
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Orçamento</title>
    <link rel="stylesheet" href="css/style_orcamento.css">
</head>
<body>
    <div class="container">
        <h2>Resultado do Processamento</h2>
        
        <?php 
        if (!empty($erro)) {
            echo '<p style="color: red; font-weight: bold;">ERRO:</p>';
            echo '<p style="color: red;">' . $erro . '</p>';
        }
        if (!empty($sucesso)) {
            echo '<p style="color: green; font-weight: bold;">SUCESSO:</p>';
            echo '<p style="color: green;">' . $sucesso . '</p>';
        }
        ?>
        <p><a href="form.php">Voltar ao Formulário</a></p>
    </div>
</body>
</html>