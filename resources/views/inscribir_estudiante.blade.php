@extends('layout.dashboard_layout')
@section('content')

<div class="login-box">

    <div class="login-logo">
      <b class="bluetext">BEBRAS</b>CUBA
    </div>
    <p style="color: red">{{ $error }}</p>
    <div class="card-body login-card-body">

      <p class="login-box-msg">Sobre el estudiante díganos:</p>

      <form action="/tablero-profesor" method="post">
        @csrf
        <div class="form-group has-feedback">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre">
        </div>

        <div class="form-group has-feedback">
            <input type="number" name="carnet" class="form-control" placeholder="Carnet">
        </div>
        
        <div class="form-group has-feedback">
          <input type="texi" name="sexo" class="form-control" placeholder="Sexo">
        </div>

        <div class="form-group has-feedback">
          <input type="number" name="grado" class="form-control" placeholder="grado">
        </div>

        <button type="submit" class="btn btn-primary btn-block btn-flat">Registrarse</button>

      </form>

  </div>
  </div>
@endsection