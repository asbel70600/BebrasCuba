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
            <input type="number" min="0" max="99999999999" name="carnet" class="form-control" placeholder="Carnet">
        </div> 
        
        <div class="form-group has-feedback" id="sexo_selector">
          <label for="sexo_selector">
              Sexo
          </label>
     
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sexo" id="sexoM" value="M" checked>
          <label class="form-check-label" for="sexoM">
            Masculino
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sexo" id="sexoF" value="preuniversitario">
          <label class="form-check-label" for="sexoF">
            Femenino
          </label>
        </div>
        <div class="form-group has-feedback">
          <input type="number" min="1" max="12" name="grado" class="form-control" placeholder="grado">
        </div>

        <button type="submit" class="btn btn-primary btn-block btn-flat">Registrarse</button>

      </form>

  </div>
  </div>
@endsection