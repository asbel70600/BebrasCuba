@extends('layout.secondary_layout')
@section('content')

<form action="/solicitud-inscripcion/{{ $user }}" method="post">
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

    <div class="form-group has-feedback">
        <input name="nivel" class="form-control" type="text" placeholder="Nivel de enseñanza">
    </div>

    <div class="form-group has-feedback">
        <input name="nombre_escuela" class="form-control" type="text" placeholder="Nombre de la escuela">
    </div>

    <div class="form-group has-feedback">
        <input name="telefono_escuela" class="form-control" inputmode="numeric" placeholder="Teléfono de la escuela">
    </div>

    <p>Opcionalmente puede propiciarnos sus <br>
        datos para ponernos en contacto con usted:</p>

        
    <div class="form-group has-feedback">
        <input name="nombre_solicitante" class="form-control" type="text" placeholder="Nombre y apellidos">
    </div>

    <div class="form-group has-feedback">
        <input name="correo_solicitante" class="form-control" type="text"  placeholder="Correo electrónico">
    </div>
    
    <div class="form-group has-feedback">
        <input name="telefono_solicitante" class="form-control" type="number" inputmode="numeric" step="" placeholder="Teléfono">
    </div>

    <button type="submit" class="btn btn-primary btn-block btn-flat">
        Solicitar registro
    </button>

</form>

@endsection