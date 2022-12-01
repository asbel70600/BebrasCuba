@extends("layout.secondary_layout")

@section("content")

<div class="login-box" style="margin:auto">

    <div class="login-logo">
      <a href="#"><b>BEBRAS</b>CUBA</a>
    </div>
  
  
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Inicie sesion para usar la plataforma</p>
        
  
  <!-- // SECTION ─── FORMULARIO ────────────────────────────────────── -->
        <form action="#" method="post">
          @csrf
            <div class="form-group has-feedback">
              <input type="email" name="correo" class="form-control" placeholder="correo">
            </div>
            <div class="form-group has-feedback">
              <input type="password" name="contrasena" class="form-control" placeholder="Contraseña">
            </div>
            <div class="row">
              <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
              </div>
            </div>
        </form>
  
  
  <!-- // SECTION NOT LOGGED ──────────────────────────────────────────────────────────────────── --> 
        <p style="align-items: center;align-content: center;">
          No tiene cuenta aun?</br>
          <a href="/registro-tutor" style="align-self:center">registrarme como tutor de un estudiante</a></br>
          <a href="/registro-estudiante" class="text-center">registrarme como estudiante</a>
        </p>
      
      
      </div>
    </div>
     
  </div>
  
@endsection