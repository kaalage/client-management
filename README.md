# Cadastro de Clientes

Um aplicativo web desenvolvido em Laravel para gerenciar informações de clientes. Este projeto permite adicionar, editar, listar e excluir clientes, com suporte para upload de fotos. Utiliza Bootstrap para o design responsivo e Bootstrap Icons para os ícones. O backend é configurado com XAMPP para o servidor Apache e o banco de dados MySQL.

## Recursos

- Cadastro de clientes com nome, email, telefone e foto.
- Edição e exclusão de clientes existentes.
- Interface intuitiva e responsiva.
- Mensagens de sucesso para feedback do usuário.

## Pré-requisitos

Certifique-se de ter as seguintes ferramentas instaladas:

- [PHP](https://www.php.net/) (versão 7.4 ou superior)
- [Composer](https://getcomposer.org/) (para gerenciamento de dependências PHP)
- [XAMPP](https://www.apachefriends.org/index.html) (para o servidor Apache e MySQL)
- [Consoler](https://consoler.dev/) (para gerenciamento do Laravel)
- [Bootstrap](https://getbootstrap.com/) (para estilos)
- [Bootstrap Icons](https://icons.getbootstrap.com/) (para ícones)

## Instalação

1. **Clone o repositório**:
   ```bash
   git clone <https://github.com/kaalage/client-management>
   cd client-management

2. **Instale as dependências do PHP**:
   ```bash
   composer install

3. **Configure o ambiente**:
   Copie o arquivo .env.example para .env:
   ```bash
   cp .env.example .env

   Edite o arquivo .env com suas configurações de banco de dados (exemplo com XAMPP):
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nome_do_banco_de_dados
    DB_USERNAME=root
    DB_PASSWORD=

4. **Gere a chave de aplicação**:
   ```bash
   php artisan key:generate

5. **Execute as migrações do banco de dados**:
    ```bash
    php artisan migrate

6. **Instale as dependências do front-end**:
    ```bash
    npm install

7. **Compile os ativos do front-end**:
    ```bash
    npm run dev

8. **Inicie o servidor de desenvolvimento**:
    ```bash
    php artisan serve


## Verificação do Banco de Dados
- Acesse o phpMyAdmin em http://localhost/phpmyadmin.
- Verifique se o banco de dados e as tabelas foram criados corretamente.


## Uso
- Navegue até  http://127.0.0.1:8000/clients para acessar o aplicativo.
- Use as funcionalidades de adicionar, editar e excluir clientes.