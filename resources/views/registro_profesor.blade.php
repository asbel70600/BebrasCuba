@extends('layout.secondary_layout')

@section('content')

<div class="login-box">

    <div class="login-logo">
      <b class="bluetext">BEBRAS</b>CUBA
    </div>

    
    <div class="card-body login-card-body">

        
        <form action="/registro-profesor" method="post">
          @csrf
          <p style="color: red">{{ $error }}</p>
          <div class="form-group has-feedback">
              <input type="text" name="nombre_profesor" class="form-control" placeholder="Nombre">
          </div>
  
          <div class="form-group has-feedback">
            <input type="email" name="correo_profesor" class="form-control" placeholder="Correo Electrónico">
          </div>
  
          <div class="form-group has-feedback">
            <input type="number" name="telefono_profesor" class="form-control" placeholder="Telefono personal">
          </div>
  
          <div class="form-group has-feedback">
              <input type="number" name="carnet_profesor" class="form-control" placeholder="Carnet">
          </div>
          
          <div class="form-group has-feedback">
            <input type="text" name="municipio" class="form-control" placeholder="Provincia">
          </div>
  
          <div class="form-group has-feedback">
            <input type="text" name="provincia" class="form-control" placeholder="Municipio">
          </div>
  
          <div class="form-group has-feedback">
              <input type="text" name="nombre_escuela" class="form-control" placeholder="Escuela">
          </div>
  
          <div class="form-group has-feedback">
            <input type="number" name="telefono_escuela" class="form-control" placeholder="Telefono de la escuela">
          </div>
  
          <div class="form-group has-feedback">
              <input type="password" name="contrasena" class="form-control" placeholder="Contraseña">
          </div>
  
          <button type="submit" class="btn btn-primary btn-block btn-flat">Registrarse</button>
  
        </form>

      <p class="mb-0" style="margin: 5%">
        Ya tiene cuenta?
        <a href="/acceder" class="text-center">ingresar</a>
      </p>

  </div>

@endsection