<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
@extends(isset($_SESSION['profesor_id']) ? 'layout.dashboard_layout' : 'layout.principal_layout')

@section('content')

    @if (isset($texto))
        <div class="card" style="width: 100%">

            <div class="card-header" style="background-color: rgb(234, 76, 76)">
                <h5 class="card-title">Aviso</h5>
            </div>

            <div class="card-body">
                <p>{{ $texto }}</p>
            </div>
        </div>
    @else
    @endif


    <div class="card" style="max-width:50%;width:50%; min-width: 300px;">

        <div class="card-header bluebg">
            <h5 class="card-title">Qué es Bebras?</h5>
        </div>

        <div class="card-body">

            <p class="card-body-text">Bebras es una iniciativa internacional que tiene como objetivo
                promover la Informática y el pensamiento Computacional entre estudiantes
                escolares de todas las edades. Los participantes suelen estar
                supervisados por profesores que pueden integrar el desafío Bebras
                en sus actividades de enseñanza. El Concurso Bebras se viene realizando
                desde 2004 en centros educativos. Entre otoño de 2021 y
                primavera de 2022 se ha realizado en más de 54 países de todo el mundo
                con una participación de más de 3 000 000 de participantes.</p>
            <a href="https://www.bebras.org/" class="blue-bebras">Más acerca de bebras</a>
        </div>
    </div>



    <div class="card" style="max-width: 100%;width: 39%; min-width: 300px;">
        <div class="card-header greenbg">
            <h5 class="card-title">Eventos</h5>
        </div>

        <div class="card-body">
            <p class="card-body-text">Para la 1era edición del Bebras Cuba se requiere
                que cada concursante sea pre-inscrito en el
                sitio https://bebrascuba.uclv.cu, entre los días
                del 5 al 11 de diciembre del 2022 por un profesor
                que la escuela designe para ello. Solo puede
                inscribir a los estudiantes de una misma escuela
                un único profesor, quien por demás se hará cargo
                de la realización del concurso en su institución.
                En el sitio se le pide llenar un formulario donde
                se recopilan los datos personales del estudiante
                y de la escuela en la que el estudiante se encuentra.</p>
            <a href="/eventos" class="green-bebras">Más información</a>
        </div>
    </div>

    <div class="card" style="justify-content: center; margin-block: 7% ">

        <div class="card-header cyanbg" style="height: 50vh; justify-content: center">
            <h5 class="card-title">Fechas</h5>
            <img src="{{ asset('img/calendary.png') }}" alt="imagen de calendario" style="max-height:40vh; display: block;margin:auto;max-width: 100%;">
        </div>
        <div class="card-body">

            <p class="card-body-text">Fecha de realización del concurso: 12 al 23 de diciembre de 2022.
                El concurso se realiza en el lugar adecuado gestionado por quien
                inscriba al estudiante utilizando computadoras o dispositivos móviles
                con adecuada conexión a Internet.</p>
        </div>
    </div>



    <div class="card" style="max-width: 100%; border: 0; margin: 5% ">

        <div class="card-header" style="background-color: white">
            <h5 class="card-title">Grupos de Competición</h5>
        </div>
        <div class="card-body">


            <p class="card-body-text">En esta primera edición se diseñan tareas para los siguientes grupos de competició<br>
                • Grupo III. Benjamín – Estudiantes de Grados 5 y 6 de Primaria<br>
                • Grupo IV. Cadete –Estudiantes de Grados 7 y 8 de Secundaria Básica<br>
                • Grupo V. Junior – Estudiantes de Grados 9 de Secundaria Básica y 10 de Pre universitario o 1er año de ETP<br>
                • Grupo VI. Senior– Estudiantes de Grados 11 y 12 de Pre universitario o de 2do, 3ero y 4to año de ETP<br>
                Próximas ediciones se incorporarán los restantes grupos de Primaria.</p><br>
        </div>
    </div>



    <div class="card" style="margin-block: 7%">

        <div class="card-header salmonbg" style="min-height: 50vh; max-width:100%">
            <h5 class="card-title">En qué consiste?</h5>
            <img src="{{ asset('img/mecanicas.png') }}" alt="imagen de engranajes" style="max-height:40vh; display: block;margin:auto;max-width: 100%;">
        </div>
  
        <div class="card-body">

            <p class="card-body-text">El concurso se compone de una prueba principal
                sin ninguna selección de estudiantes que se ejecuta
                en una plataforma web a la que los organizadores van
                a dirigirlo luego de preinscribirse el estudiante a
                competir. La prueba tiene dos tipos de tareas:
                preguntas de opción múltiple y problemas interactivos.
                El número de tareas varía año tras año, para este desafío son 12
                preguntas a responder en 45 minutos</p>
            <a href="https://www.bebras.org/examples.html" class="green-bebras">Más información</a>
        </div>
    </div>




    <div class="card" style="margin-block: 7%">

        <div class="card-header greenbg" style="min-height: 50vh">
            <h5 class="card-title">Reconocimientos y premios</h5>
            <img src="{{ asset('img/premio.png') }}" alt="imagen de un premio" style="max-height:40vh; display: block;margin:auto; max-width:100%; ">
        </div>
        <div class="card-body">

            <p class="card-body-text">• A todos los participantes del concurso Bebras Cuba se emitirá un certificado digital
                de
                participación, que podrá ser descargado en el sitio https://bebrascuba.uclv.cu por parte
                de los profesores.
                • Según las puntuaciones por niveles y en dependencia de la cantidad de participantes
                por niveles, se entregarán medallas de Oro, Plata y Bronce. También del mismo modo
                se harán llegar los diplomas.
                • Es primordial que estos medallistas sean reconocidos como tal en cada una de las
                escuelas o instituciones que acogieron el concurso.
                • En el caso de los medallistas se emitirán cartas de solicitud de ingreso a Centros de
                Entrenamiento Provinciales firmadas por las autoridades competentes de la Facultad de
                Matemática, Física y Computación de la Universidad Central “Marta Abreu” de Las villas
                entidad coordinadora de Bebras Cuba.</p>
        </div>
    </div>
@endsection
