<?php

include('protect.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Orçamento</title>
    <link rel="stylesheet" href="css/style_orcamento.css">
    <link rel="stylesheet" href="css/style.css">
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
          <a href="services.php">Serviços</a>
          <a class="active" href="form.php">Formulário</a>
          <a href="listar_orcamentos.php">Gerenciar</a>
          <a href="about.php">Sobre</a>
           <a href="logout.php">Sair</a>
        </div>
      </div>
    </div>
    <div class="container">
        <h2>Solicitação de Orçamento</h2>
        
        <form action="processa_orcamento.php" method="post">
        
            <fieldset>
                <legend>Dados do Cliente</legend>
                <div class="input-group">
                    <label for="cliente_nome">Nome Completo:</label>
                    <input type="text" id="cliente_nome" name="cliente_nome" required>
                </div>
                <div class="input-group">
                    <label for="cliente_email">E-mail:</label>
                    <input type="email" id="cliente_email" name="cliente_email" required>
                </div>
            </fieldset>

    
            <fieldset>
                <legend>Itens do Orçamento</legend>
                
                <div id="itens-container">
                    
                    <div class="item-orcamento">
                        <div class="input-group">
                            <label for="descricao[]">Descrição do Serviço/Produto:</label>
                            <input type="text" name="descricao[]" required>
                        </div>
                        <div class="input-group-inline">
                            <div class="input-group">
                                <label for="quantidade[]">Qtd:</label>
                                <input type="number" name="quantidade[]" min="1" value="1" required>
                            </div>
                            <div class="input-group">
                                <label for="valor_unitario[]">Valor Unitário (R$):</label>
                                <input type="number" name="valor_unitario[]" step="0.01" min="0.01" required>
                            </div>
                        </div>
                        <button type="button" class="remover-item">Remover</button>
                    </div>
                </div>

                <button type="button" id="adicionar-item">Adicionar Item</button>
            </fieldset>

            <button type="submit" class="btn-submit">Enviar Orçamento</button>
        </form>
    </div>

    <script>
   
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('itens-container');
            const addButton = document.getElementById('adicionar-item');

            container.addEventListener('click', function(e) {
                if (e.target.classList.contains('remover-item')) {
                    
                    if (container.children.length > 1) {
                        e.target.closest('.item-orcamento').remove();
                    } else {
                        alert("O orçamento deve ter pelo menos um item.");
                    }
                }
            });

            addButton.addEventListener('click', function() {
                const newItem = container.children[0].cloneNode(true);
                
                newItem.querySelectorAll('input').forEach(input => {
                    if (input.type === 'number') {
                        input.value = input.name.includes('quantidade') ? 1 : '';
                    } else {
                        input.value = '';
                    }
                });
                container.appendChild(newItem);
            });
        });
    </script>
</body>
</html>