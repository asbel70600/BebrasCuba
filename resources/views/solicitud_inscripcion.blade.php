@extends('layout.secondary_layout')
@section('content')

<p style="color: red;display: block">
    {{ $error }}
</p>

<form action="/solicitud-inscripcion/{{ $user }}" method="post" style="">
    @csrf

    <p class="login-box-msg">
        {{ $text }}
    </p>

    <div class="form-group has-feedback">
        <input name="provincia" class="form-control" type="text" placeholder="Provincia de la escuela">
    </div>

    <div class="form-group has-feedback">
        <input name="municipio" class="form-control" type="text" placeholder="Municipio de la escuela">
    </div>

    <div class="form-group has-feedback" id="nivel_ensenanza_radios">
        <label for="nivel_ensenanza_radios">
            Nivel de enseñanza
        </label>
         <div class="form-check">
            <input class="form-check-input" type="radio" name="nivel" id="exampleRadios1" value="primaria" checked >
            <label class="form-check-label" for="exampleRadios1">
              Primaria
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="nivel" id="exampleRadios1" value="secundaria">
            <label class="form-check-label" for="exampleRadios1">
              Secundaria
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="nivel" id="exampleRadios1" value="preuniversitario">
            <label class="form-check-label" for="exampleRadios1">
              Preuniversitario
            </label>
          </div>
    </div>

    <div class="form-group has-feedback">
        <input name="nombre_escuela" class="form-control" type="text" placeholder="Nombre de la escuela">
    </div>

    <div class="form-group has-feedback">
        <input name="telefono_escuela" min="0" max="99999999" class="form-control" inputmode="numeric" placeholder="Teléfono de la escuela">
    </div>

    <p>Opcionalmente puede propiciarnos sus <br>
        datos para ponernos en contacto con usted:</p>

        
    <div class="form-group has-feedback">
        <input name="nombre_solicitante" class="form-control" type="text" placeholder="Nombre y apellidos">
    </div>

    <div class="form-group has-feedback">
        <input name="correo_solicitante" class="form-control" type="email"  placeholder="Correo electrónico">
    </div>
    
    <div class="form-group has-feedback">
        <input name="telefono_solicitante" min="0" max="99999999" class="form-control" type="number" inputmode="numeric" step="" placeholder="Teléfono">
    </div>

    <button type="submit" class="btn btn-primary btn-block btn-flat">
        Solicitar registro
    </button>

</form>

@endsection