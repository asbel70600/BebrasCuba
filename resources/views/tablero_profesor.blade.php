@extends('layout.dashboard_layout')
@section('content')

<style>
.edit-button{
    background: url('/img/editar.png') no-repeat top left;
    border: 0;
    padding-left: 24px;
    height: 24px;
    float: right;
    display: inline;
}
.delete-button{
    background: url('/img/eliminar.png') no-repeat top left;
    border: 0;
    padding-left: 24px;
    height: 24px;
    float: right;
    display: inline;
}
.centered-element {
    position: fixed;
    z-index: 5;
    top: 50%;  /* position the top  edge of the element at the middle of the parent */
    left: 50%; /* position the left edge of the element at the middle of the parent */

    transform: translate(-50%, -50%); /* This is a shorthand of
                                         translateX(-50%) and translateY(-50%) */
}
</style>

<script>
  function editar_estudiante(nombre,carnet,sexo,grado)
  {
    document.getElementById('dialogo_editar').setAttribute('style','min-height: 60vh ;width:25%;visibility:visible;');
    document.getElementById('editar-nombre').setAttribute('value',nombre);
    document.getElementById('editar-carnet').setAttribute('value',carnet);
    document.getElementById('editar-sexo').setAttribute('value',sexo);
    document.getElementById('editar-grado').setAttribute('value',grado);
    document.getElementById('last_carnet').setAttribute('value',carnet);
  }
  function cancelar_edicion()
  {
    document.getElementById('dialogo_editar').setAttribute('style','min-height: 60vh ;width:25%;visibility:hidden;');
    document.getElementById('editar-nombre').setAttribute('value','');
    document.getElementById('editar-carnet').setAttribute('value','');
    document.getElementById('editar-sexo').setAttribute('value','');
    document.getElementById('editar-grado').setAttribute('value','');
    document.getElementById('last_carnet').setAttribute('value','');
  }
  function eliminar_estudiante(nombre,carnet)
  {
    document.getElementById('dialogo_eliminar').setAttribute('style','width:25%;visibility:visible;');
    document.getElementById('texto_alerta').innerHTML = 'Seguro que desea eliminar al estudiante: '+ nombre +carnet;
    document.getElementById('eliminar_estudiante_carnet').setAttribute('value',carnet);
  }

  function cancelar_eliminacion()
  {
    document.getElementById('dialogo_eliminar').setAttribute('style','width:25%; visibility:hidden');
    document.getElementById('texto_alerta').innerHTML = '';
    document.getElementById('eliminar_estudiante_carnet').setAttribute('value','');
  }

</script>



<div class="card centered-element" id="dialogo_editar" style="min-height: 60vh ;width:25%; visibility:hidden" >
  <div class="login-box">

      <div class="login-logo">
        <b class="bluetext">BEBRAS</b>CUBA
      </div>
  
      <div class="card-body login-card-body">
  
        <p class="login-box-msg">Edite la información del estudiante</p>
  
        <form action="/tablero-profesor" method="POST">
          @method('PUT')
          @csrf
          <div class="form-group has-feedback">
              <input type="text" id="editar-nombre" name="nombre" class="form-control" placeholder="Nombre">
          </div>
  
          <div class="form-group has-feedback">
              <input type="number" min="0" max="99999999999" id="editar-carnet"name="carnet" class="form-control" placeholder="Carnet">
          </div>
          
          <div class="form-group has-feedback">
            <input type="text" id="editar-sexo" name="sexo" class="form-control" placeholder="Sexo">
          </div>
  
          <div class="form-group has-feedback">
            <input type="text" min="1" max="12" id="editar-grado" name="grado" class="form-control" placeholder="grado">
          </div>
          <input type="hidden" id="last_carnet" name='last_carnet'>
          <button type="submit" class="btn btn-primary btn-block btn-flat">Actualizar</button>
        </form>
        <button class="btn btn-primary btn-block btn-flat" style="margin-top:1%" onclick="cancelar_edicion()">Cancelar</button>
  
    </div>
    </div>
</div>

<div class="card centered-element" id="dialogo_eliminar" style="width:25%; visibility:hidden" >
  
  <div class="card-body login-card-body">
  
    <p class="login-box-msg" id="texto_alerta">
    </p>

    <form action="/tablero-profesor" method="POST">
      @method('DELETE')
      @csrf

        <input type="hidden" id="eliminar_estudiante_carnet" name="carnet">

      <button type="submit" class="btn btn-primary btn-block btn-flat" style="background-color: rgb(239, 50, 50)">Eliminar</button>
    </form>


    <button class="btn btn-primary btn-block btn-flat" style="margin-top:1%" onclick="cancelar_eliminacion()">Cancelar</button>
  
  
  </div>
</div>


<p style="color: red">{{ $error }}</p>
@for($i = 0;$i < count($estudiantes);$i++)
<div class="card" style="display: inline;grid-column: 1;width: auto">
    <div class="card-body" style="padding: 0.5rem;">
      <p class="card-text" style="display: inline">{{ $estudiantes[$i]->nombre }} {{ $estudiantes[$i]->carnet }}</p>

      <button class="delete-button"  
        onclick="eliminar_estudiante(
          '{{ $estudiantes[$i]->nombre }}',
          '{{ $estudiantes[$i]->carnet }}')">
      </button>
      
      <button class="edit-button"  
        onclick="editar_estudiante(
          '{{ $estudiantes[$i]->nombre }}',
          '{{ $estudiantes[$i]->carnet }}',
          '{{ $estudiantes[$i]->sexo }}',
          '{{ $estudiantes[$i]->grado }}'
          )">
      </button>
    </div>
  </div>

@endfor

@endsection


