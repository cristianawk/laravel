# laravel - Projeto Cadastro de Clientes


Levando em conta que ja temos o Xampp com Php e MySql instaldos junto com o Composer para usar o Artisan
Vamos para o inicio do projeto:

>composer create-project --prefer-dist laravel/laravel CadCliente "5.5.*"


Editando o arquivo .env para configura��o do banco de dados
Na pasta raiz do projeto, existe um arquivo chamado  .env,  
que precisamos editar para configurar uma configura��o de banco de dados. 
Eu estou usando o banco de dados MySQL.

// .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=essentia
DB_USERNAME=root
DB_PASSWORD=mysql


Bom, agora vamos criar um arquivo do controlador para nossas opera��es CRUD.
No terminal, o seguinte comando no projeto raiz.

php artisan make:controller ClienteController --resource


Agora em MeuProjeto> app> Http> Controllers,  temos o arquivo ClienteController nessa pasta.

Criei um arquivo de modelo para opera��es CRUD.
No terminal, o seguinte comando no projeto raiz.

php artisan make:model Cliente -m


Editar o arquivo de migra��o e criar os campos necess�rios para o banco de dados.
O arquivo de migra��o est� localizado na  pasta MeuProjeto> database> migrations

    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('email');
            $table->string('telefone');
            $table->text('filename');
            $table->timestamps();
        });
    }


No terminal o seguinte comando:

php artisan migrate


No  MySql criando a tabela de clientes:

CREATE TABLE `clientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



Pr�ximo passo criar as views

Em  MeuProjeto>resources\views

Agora criei uma nova pasta dentro do  diret�rio views  chamado  clintes. 
Nesta pasta e criei os seguintes arquivos

index.blade.php
create.blade.php
edit.blade.php

criei um formul�rio no create.blade.php

<!-- create.blade.php -->

@extends('master')
@section('content')
<div class="container">
  <form method="post" action="{{url('crud')}}">
    <div class="form-group row">
      {{csrf_field()}}
      <div class="form-group row">
      {{csrf_field()}}
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Nome</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="nome" name="nome">
      </div>
    </div>
    <div class="form-group row">
      {{csrf_field()}}
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">E-mail</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="email" name="email">
      </div>
    </div>
    <div class="form-group row">
      {{csrf_field()}}
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Telefone</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="telefone" name="telefone">
      </div>
    </div>
    <!-- imagem -->
    <div class="form-group row">
      {{csrf_field()}}
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Foto</label>
      <div class="col-sm-10">
        <input type="file" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="foto" name="foto">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-2"></div>
      <input type="submit" class="btn btn-primary">
    </div>
  </form>
</div>
@endsection

configurando uma rota para o tratamento da solicita��o.
V� para as  rotas> web.php

Route::resource('clientes', 'ClienteController');

Aqui adicionei a rota de recurso, e todas as fun��es residem em  app> Http> controllers> ClienteController

editar o arquivo ClienteController

 public function create()
    {
        return view('clientes.create');
    }
Aqui temos que devolver a vis�o quando o pedido atingir a rota; ele ser� redirecionado para o m�todo de cria��o desse controlador. 
Nossa vis�o deve ser acess�vel atrav�s do seguinte URL do formul�rio.

Testando tudo ate agora:
http://localhost:8000/clientes/create
