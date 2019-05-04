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