# Projeto VORTEX

Este projeto foi desenvolvido como parte da Avaliação Somativa 1 de Front-End, com o objetivo de demonstrar proficiência na criação de um pequeno site utilizando exclusivamente HTML, CSS e JavaScript puro.

O projeto simula um site de uma empresa fictícia chamada **VORTEX**, especializada na criação de websites.

## Requisitos da Atividade Atendidos

O projeto atende integralmente aos requisitos propostos na atividade:

| Requisito                    | Status      | Detalhes                                                                                                                                                       |
| :--------------------------- | :---------- | :------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **Páginas Principais**       | ✅ Atendido | O site possui as páginas `index.html`, `form.html`, `formAction.html` e `about.html`.                                                                          |
| **Padrão Visual Uniforme**   | ✅ Atendido | Cores, fontes e layout são consistentes em todas as páginas, utilizando `css/style.css`.                                                                       |
| **Menu de Navegação**        | ✅ Atendido | Um menu padrão é visualizado em todas as páginas, orientando a navegação do usuário.                                                                           |
| **Estrutura HTML**           | ✅ Atendido | Utilização de elementos HTML para estruturar o conteúdo.                                                                                                       |
| **Separação de Código**      | ✅ Atendido | Regras de estilo (`css/style.css`) e códigos de script (`script/script.js`, `script/formAction.js`) estão em arquivos separados e organizados em subpastas.    |
| **Regras de Estilo CSS**     | ✅ Atendido | Utilização de classes CSS para formatação e reaproveitamento de estilos.                                                                                       |
| **Uso de JavaScript**        | ✅ Atendido | JavaScript é utilizado para prover dinamicidade, como a máscara de telefone e a validação de formulário.                                                       |
| **Formulário com Validação** | ✅ Atendido | A página `form.html` possui um formulário com validação de **todos** os campos (Nome, E-mail, Celular, Termos de Serviço) via JavaScript (`script/script.js`). |
| **Recuperação de Dados GET** | ✅ Atendido | A página `formAction.html` recebe e exibe os dados enviados via método `GET` do formulário, processados por JavaScript (`script/formAction.js`).               |
| **Caminho Relativo**         | ✅ Atendido | Todas as referências a recursos internos (CSS, JS, Imagens) utilizam o caminho relativo.                                                                       |
| **Sem Frameworks**           | ✅ Atendido | O projeto utiliza apenas HTML, CSS e JavaScript puro.                                                                                                          |

## Estrutura do Projeto

```
projetoVortex/
├── index.html          # Página inicial do site
├── form.html           # Página com formulário para captação e validação de dados
├── formAction.html     # Página para receber dados via método GET e exibir com JS
├── about.html          # Página de conteúdo informativo sobre o site
├── services.html       # Página de serviços (conteúdo original do projeto)
├── README.md           # Este arquivo
├── css/
│   └── style.css       # Folha de estilos CSS
├── script/
│   ├── script.js       # Funções JavaScript (Validação de formulário, Máscara de telefone)
│   └── formAction.js   # Script para processar e exibir dados da URL (GET)
├── font/               # Arquivos de fontes
└── img/                # Arquivos de imagens

```

## Como Visualizar

Para visualizar o projeto, basta descompactar o arquivo ZIP e abrir o arquivo `index.html` em qualquer navegador web moderno.

1.  Descompacte o arquivo `softwares_puc_pr-main.zip`.
2.  Navegue até a pasta `Html/projetoVortex`.
3.  Abra o arquivo `index.html` no seu navegador.

Para testar o formulário:

1.  Navegue para a página **Formulário**.
2.  Preencha os campos. A validação será executada pelo JavaScript ao tentar enviar.
3.  Após o preenchimento correto, o formulário será enviado via método `GET` para `formAction.html`, onde os dados serão lidos e exibidos pelo JavaScript.

---
