<?php
include('protect.php');
include('conexao.php');

// Busca os orçamentos ordenados pelo mais recente
$sql_code = "SELECT * FROM orcamentos ORDER BY data_solicitacao DESC";
$sql_query = $mysqli->query($sql_code) or die("Erro ao consultar: " . $mysqli->error);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Orçamentos - VORTEX</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_lista.css">
</head>
<body>
    <div class="topBar">
        <div class="logo">
            <a href="painel.php">
                <img src="img/logo.png" alt="Logo VORTEX" />
                <p>VORTEX</p>
            </a>
        </div>
        <div class="nav-group">
            <div class="menu-links">
                <a href="services.php">Serviços</a>
                <a href="form.php">Formulário</a>
                <a class="active" href="listar_orcamentos.php">Gerenciar</a>
                <a href="about.php">Sobre</a>
                <a href="logout.php">Sair</a>
            </div>
        </div>
    </div>

    <div class="content">
        <h1 class="titleTop" style="padding-top: 80px;">Gerenciamento de Pedidos</h1>
        
        <div class="table-container">
            <?php if($sql_query->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Cliente</th>
                        <th>Status</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($orcamento = $sql_query->fetch_assoc()): ?>
                    <tr>
                        <td>#<?php echo $orcamento['id']; ?></td>
                        <td>
                            <strong><?php echo htmlspecialchars($orcamento['cliente_nome']); ?></strong><br>
                            <span style="font-size: 12px; color: #666;"><?php echo htmlspecialchars($orcamento['cliente_email']); ?></span>
                        </td>
                        <td>
                            <span class="status-badge status-<?php echo strtolower($orcamento['status']); ?>">
                                <?php echo $orcamento['status']; ?>
                            </span>
                        </td>
                        <td><?php echo date("d/m/Y", strtotime($orcamento['data_solicitacao'])); ?></td>
                        <td class="actions">
                            <a href="editar_orcamento.php?id=<?php echo $orcamento['id']; ?>" class="btn-action btn-edit">Editar</a>
                            <a href="delete_orcamento.php?id=<?php echo $orcamento['id']; ?>" class="btn-action btn-delete" onclick="return confirm('Tem certeza que deseja excluir este orçamento?');">Excluir</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <?php else: ?>
                <div class="empty-state">
                    <p>Nenhum orçamento cadastrado ainda.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>