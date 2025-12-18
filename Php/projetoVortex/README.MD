# Projeto VORTEX

O **Projeto VORTEX** evoluiu de um projeto inicial de Front-End para uma aplicação web dinâmica completa, utilizando **PHP** para o lado do servidor e gerenciamento de dados. O objetivo é simular um sistema de gerenciamento de orçamentos para uma empresa fictícia, a **VORTEX**, especializada na criação de websites.

## Funcionalidades Principais

O projeto agora inclui um sistema de gerenciamento de orçamentos com as seguintes funcionalidades:

| Funcionalidade                 | Descrição                                                       | Arquivos Envolvidos                                                                                                          |
| :----------------------------- | :-------------------------------------------------------------- | :--------------------------------------------------------------------------------------------------------------------------- |
| **Autenticação de Usuário**    | Sistema de login e logout para acesso ao painel administrativo. | `cadastro.php`, `protect.php`, `logout.php`                                                                                  |
| **Painel Administrativo**      | Área restrita para gerenciamento do sistema.                    | `painel.php`                                                                                                                 |
| **CRUD de Orçamentos**         | Criação, leitura, atualização e exclusão (CRUD) de orçamentos.  | `processa_orcamento.php`, `listar_orcamentos.php`, `editar_orcamento.php`, `atualizar_orcamento.php`, `delete_orcamento.php` |
| **Conexão com Banco de Dados** | Gerenciamento da conexão com o banco de dados.                  | `conexao.php`                                                                                                                |
| **Páginas Públicas**           | Páginas de apresentação e contato, agora em PHP.                | `index.php`, `about.php`, `services.php`, `form.php`, `formAction.php`                                                       |

## Estrutura do Projeto

A estrutura de arquivos reflete a transição para uma aplicação PHP, incluindo arquivos para lógica de banco de dados e autenticação:

```
projetoVortex/
├── about.php               # Página de conteúdo informativo
├── atualizar_orcamento.php # Lógica para atualizar um orçamento no banco de dados
├── cadastro.php            # Página e lógica para cadastro de novos usuários
├── conexao.php             # Script de conexão com o banco de dados
├── delete_orcamento.php    # Lógica para exclusão de orçamentos
├── editar_orcamento.php    # Formulário para edição de um orçamento existente
├── form.php                # Formulário de contato/orçamento
├── formAction.php          # Página para processar e exibir dados do formulário
├── index.php               # Página inicial do site
├── listar_orcamentos.php   # Página para listar todos os orçamentos cadastrados
├── logout.php              # Script para finalizar a sessão do usuário
├── painel.php              # Painel administrativo (área restrita)
├── processa_orcamento.php  # Lógica para salvar um novo orçamento
├── protect.php             # Script de proteção de rotas (verifica se o usuário está logado)
├── README.MD               # Este arquivo
├── services.php            # Página de serviços
├── css/
│   ├── style.css           # Folha de estilos principal
│   ├── style_lista.css     # Estilos específicos para a listagem de orçamentos
│   └── style_orcamento.css # Estilos específicos para formulários de orçamento
├── font/                   # Arquivos de fontes
├── img/                    # Arquivos de imagens
└── script/
    ├── formAction.js       # Script para processar e exibir dados da URL (GET)
    └── script.js           # Funções JavaScript (Validação de formulário, Máscara de telefone)
```

## Como Executar o Projeto

Como este projeto é uma aplicação PHP dinâmica e provavelmente utiliza um banco de dados (indicado por `conexao.php` e arquivos de CRUD), ele **não pode ser executado apenas abrindo o arquivo `index.php` no navegador**.

Você precisará de um ambiente de servidor local configurado:

1.  **Configuração do Ambiente:** Instale um servidor web local (como **XAMPP**, **WAMP** ou **MAMP**) que inclua **Apache** e **MySQL/MariaDB** e suporte **PHP**.
2.  **Implantação:** Mova a pasta `projetoVortex` para o diretório de documentos do seu servidor web (ex: `htdocs` no XAMPP).
3.  **Configuração do Banco de Dados:**
    - Crie um banco de dados no seu servidor MySQL/MariaDB.
    - Edite o arquivo `conexao.php` para configurar as credenciais de acesso ao seu banco de dados (nome do banco, usuário e senha).
    - _Nota:_ O script de criação das tabelas não está incluído neste README, mas é necessário para o funcionamento completo do sistema de orçamentos.
4.  **Acesso:** Abra seu navegador e acesse o projeto através do endereço do servidor local, por exemplo: `http://localhost/projetoVortex/`

---
