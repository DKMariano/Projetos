# Sistema de Gerenciamento de Jogos e Usuários

Este é um sistema web desenvolvido para gerenciar jogos e usuários. Ele permite que administradores e editores façam login, criem, editem, visualizem e excluam jogos e usuários do sistema.

## Funcionalidades

### Para Administradores:
- **Gerenciamento de Jogos**: O administrador pode adicionar, editar e excluir jogos, incluindo informações como nome, gênero, produtora, descrição, nota e imagem da capa.
- **Gerenciamento de Usuários**: O administrador pode cadastrar novos usuários, editar seus dados (como nome, senha e tipo de acesso) e excluir usuários existentes.
- **Controle de Acesso**: Somente administradores podem realizar operações de criação e exclusão de jogos e usuários. Editores podem apenas editar jogos e visualizar dados dos usuários.

### Para Editores:
- **Edição de Jogos**: O editor pode editar os dados dos jogos existentes, incluindo nome, descrição, nota, entre outros.
- **Visualização de Jogos**: O editor pode visualizar os detalhes dos jogos cadastrados.
- **Edição de Dados Pessoais**: O editor pode editar seus próprios dados, como nome e senha.

### Funcionalidades Comuns:
- **Login e Logout**: Usuários podem realizar login para acessar suas funcionalidades específicas. O sistema possui um mecanismo de autenticação baseado em sessões.
- **Página Principal (Index)**: Exibe todos os jogos cadastrados com a possibilidade de visualizar seus detalhes.

## Níveis de Acesso

A aplicação possui dois tipos de usuários com diferentes permissões:

### 1. **Administrador**:
- **Permissões**: 
  - Adicionar, editar e deletar jogos.
  - Adicionar, editar e deletar usuários.
- **Credenciais**:
  - **Usuário**: `admin`
  - **Senha**: `admin`

### 2. **Editor**:
- **Permissões**: 
  - Editar jogos existentes.
  - Editar seus próprios dados (nome e senha).
  - Visualizar jogos.
- **Credenciais**:
  - **Usuário**: `editor`
  - **Senha**: `editor`

## Estrutura do Projeto

### 1. **Banco de Dados** (`banco_jogos`):
   - Tabela `jogos`: Armazena os jogos cadastrados com suas informações, como nome, gênero, nota, etc.
   - Tabela `usuarios`: Armazena os dados dos usuários, incluindo nome, senha (criptografada) e tipo de acesso (admin/editor).

### 2. **Arquivos Importantes**:

- **`banco.php`**: Arquivo responsável pela conexão com o banco de dados.
- **`funcoes.php`**: Funções auxiliares para mensagens e processamento de dados.
- **`login.php`**: Funções de autenticação e controle de sessão.
- **`estilo.css`**: Arquivo de estilo responsável pela aparência do site.
- **`game-*`**: Arquivos relacionados à gestão de jogos (criação, edição, exclusão e visualização).
- **`user-*`**: Arquivos relacionados à gestão de usuários (criação, edição, exclusão e login).
- **`topo.php` / `rodape.php`**: Arquivos que gerenciam o cabeçalho e rodapé das páginas.
- **`index.php`**: Página principal que lista todos os jogos cadastrados.
- **`user-login.php`**: Página que processa o login do usuário.

## Requisitos

- **PHP** 7.4 ou superior
- **MySQL** ou **MariaDB**
- **Servidor Web** como Apache ou Nginx (com suporte a PHP)
- **Configuração de Banco de Dados** com a base de dados `banco_jogos`

## Como Rodar o Projeto

### Passo 1: Configuração do Banco de Dados
1. Crie um banco de dados no MySQL ou MariaDB chamado `banco_jogos`.
2. Importe o dump do banco de dados (fornecido no arquivo `banco_jogos.sql`) para configurar as tabelas e dados iniciais.
   
   **Comando SQL para importar o dump**:
   ```sql
   mysql -u usuario -p banco_jogos < banco_jogos.sql
   ```

### Passo 2: Configuração do Servidor Local
1. **Instalar o XAMPP/WAMP/MAMP ou configurar um servidor Apache**:
   - Se você estiver usando **XAMPP** ou **WAMP**, basta iniciar o Apache e o MySQL.
   - Se estiver usando **MAMP** ou outro servidor, configure o Apache e o MySQL de acordo com a sua preferência.

2. **Configurar a Conexão com o Banco de Dados**:
   - No arquivo `banco.php`, configure as credenciais de conexão do banco de dados:
     ```php
     $banco = new mysqli("localhost", "root", "", "banco_jogos");
     ```

3. **Coloque o código do projeto na pasta do servidor**:
   - Caso esteja usando **XAMPP**, coloque o código dentro da pasta `htdocs`.
   - Para **WAMP**, use a pasta `www`.
   - Para **MAMP**, use a pasta `htdocs`.

### Passo 3: Acessar o Aplicativo
1. Abra o navegador e acesse `http://localhost/` para visualizar a página principal do sistema.
2. Acesse as funcionalidades conforme o tipo de usuário (`admin` ou `editor`).

### Passo 4: Login
1. O sistema possui um usuário de **admin** configurado por padrão. As credenciais são:
   - **Usuário**: `admin`
   - **Senha**: `admin` (senha criptografada no banco)

2. Para os editores, você pode adicionar novos usuários ou usar as credenciais predefinidas:
   - **Usuário**: `editor`
   - **Senha**: `editor`

## Como Funciona

- **Autenticação**: A autenticação é feita por meio do arquivo `login.php`. Ele verifica as credenciais de login contra os dados armazenados na tabela `usuarios` do banco de dados e mantém a sessão ativa enquanto o usuário estiver logado.
  
- **Gestão de Jogos**: Os administradores podem adicionar, editar ou excluir jogos através das páginas `game-new.php`, `game-edit.php` e `game-delete.php`. Editores podem editar apenas os jogos existentes.

- **Gestão de Usuários**: Os administradores têm controle total sobre os usuários. Eles podem adicionar novos usuários com `user-new.php`, editar usuários com `user-edit-adm.php`, e excluir usuários com `user-delete.php`.

- **Páginas de Detalhes**: A página `detalhes.php` exibe informações detalhadas sobre cada jogo, permitindo que os usuários visualizem as descrições e outros detalhes.

## Contribuições

Contribuições são bem-vindas! Caso queira contribuir com o projeto, por favor, siga os seguintes passos:
1. Faça um fork do repositório.
2. Crie uma branch para sua contribuição (`git checkout -b feature/nova-feature`).
3. Realize as modificações necessárias e faça um commit (`git commit -am 'Adicionando nova feature'`).
4. Envie as mudanças para o seu fork (`git push origin feature/nova-feature`).
5. Abra um pull request no repositório principal.

## Licença

Este projeto está licenciado sob a [MIT License](LICENSE).

