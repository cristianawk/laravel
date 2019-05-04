# laravel - Projeto Cadastro de Clientes


Levando em conta que ja temos o Xampp com Php e MySql instaldos junto com o Composer para usar o Artisan
Vamos para o inicio do projeto:

>composer create-project --prefer-dist laravel/laravel CadCliente "5.5.*"


Editando o arquivo .env para configuração do banco de dados
Na pasta raiz do projeto, existe um arquivo chamado  .env,  
que precisamos editar para configurar uma configuração de banco de dados. 
Eu estou usando o banco de dados MySQL.

// .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=essentia
DB_USERNAME=root
DB_PASSWORD=mysql


Bom, agora vamos criar um arquivo do controlador para nossas operações CRUD.
No terminal, o seguinte comando no projeto raiz.

php artisan make:controller ClienteController --resource


Agora em MeuProjeto> app> Http> Controllers,  temos o arquivo ClienteController nessa pasta.

Criei um arquivo de modelo para operações CRUD.
No terminal, o seguinte comando no projeto raiz.

php artisan make:model Cliente -m


Editar o arquivo de migração e criar os campos necessários para o banco de dados.
O arquivo de migração está localizado na  pasta MeuProjeto> database> migrations

    public function up()
    {
        Schema::create('cruds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('foto');
            $table->string('email');
            $table->string('telefone');
            $table->timestamps();
        });
    }

No seguinte comando no seu terminal.

php artisan migrate


