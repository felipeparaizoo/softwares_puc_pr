<?php
include('protect.php');
include('conexao.php');

if(isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $nome = $mysqli->real_escape_string($_POST['cliente_nome']);
    $email = $mysqli->real_escape_string($_POST['cliente_email']);
    $status = $mysqli->real_escape_string($_POST['status']);

    $sql_update = "UPDATE orcamentos SET 
                   cliente_nome = '$nome', 
                   cliente_email = '$email', 
                   status = '$status' 
                   WHERE id = '$id'";

    if($mysqli->query($sql_update)) {
        echo "<script>alert('Atualizado com sucesso!'); window.location.href='listar_orcamentos.php';</script>";
    } else {
        echo "Erro ao atualizar: " . $mysqli->error;
    }
}
?>