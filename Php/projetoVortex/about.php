<?php

include('protect.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
    />
    <meta charset="UTF-8" />
    <title>VORTEX</title>
    <link rel="stylesheet" href="css/style.css" />
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
          <a href="form.php">Formulário</a>
          <a href="listar_orcamentos.php">Gerenciar</a>
          <a class="active" href="about.php">Sobre</a>
           <a href="logout.php">Sair</a>
    
        </div>
      </div>
    </div>

    <div class="content">
      <h1 class="titleTop">Sobre a VORTEX</h1>
      <div class="about-section">
        <h2>Nossa Missão</h2>
        <p>
          A VORTEX nasceu com a missão de transformar ideias em realidade
          digital de forma rápida, eficiente e com design de ponta. Acreditamos
          que todo projeto merece uma presença online robusta e visualmente
          atraente.
        </p>

        <h2>O Projeto</h2>
        <p>
          Este site foi desenvolvido como parte da Avaliação Somativa 1 da
          disciplina Fundamentos de Programação Web, com o objetivo de
          demonstrar proficiência nos conceitos fundamentais de HTML, CSS e
          JavaScript.
        </p>
        <p>O projeto atende aos seguintes requisitos:</p>
        <ul>
          <li>
            Estrutura: Possui as páginas `<index class="php"></index>`, `form.php<index class="php"></index>`,
            `formAction.php<index class="php"></index>` e `about.php<index class="php"></index>`.
          </li>
          <li>
            Estilo: Utiliza um padrão visual uniforme e regras de estilo CSS em
            arquivo separado (`css/style.css`).
          </li>
          <li>
            Navegação: Apresenta um menu padrão e uniforme em todas as páginas.
          </li>
          <li>
            Formulário: Contém um formulário (`form.php<index class="php"></index>`) com validação de
            todos os campos via JavaScript.
          </li>
          <li>
            Tratamento de Dados: Possui a página `formAction.php<index class="php"></index>` para receber
            e exibir dados enviados via método GET, tratados com JavaScript.
          </li>
          <li>
            Organização: Códigos de script e estilos estão em subpastas
            separadas (`script/` e `css/`).
          </li>
        </ul>

        <h2>Autores</h2>
        <p>
          Desenvolvido por Felipe Paraizo de Oliveira, Daniel Caciola, Matheus
          Ferreira Costa.
        </p>
        <p>
          Todo o desenvolvimento foi realizado utilizando apenas php<index class="php"></index>, CSS e
          JavaScript puro, sem o uso de frameworks ou bibliotecas externas,
          focando na demonstração de domínio dos fundamentos.
        </p>
      </div>
    </div>
  </body>
</html>
