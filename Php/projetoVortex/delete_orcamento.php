<?php
include('protect.php');
include('conexao.php');

if(isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    $sql_code = "DELETE FROM orcamentos WHERE id = '$id'";
    
    if($mysqli->query($sql_code)) {
        header("Location: listar_orcamentos.php");
    } else {
        echo "Falha ao apagar: " . $mysqli->error;
    }
}
?>