@extends(
    isset($_SESSION['profesor_id']) ? 'layout.dashboard_layout':'layout.principal_layout'
)

@section('content')

<div class="card">

    <div class="card-header bluebg">
        <h5 class="card-title">Qué es Bebras?</h5>
    </div>

    <div class="card-body">
       
        <pre class="card-body-text">Bebras is an international initiative aiming to promote Informatics
(Computer Science, or Computing) and computational thinking among school
students at all ages. Participants are usually supervised by teachers who
may integrate the Bebras challenge in their teaching activities.
The challenge is performed at schools using computers or mobile devices.</pre>
        <a href="#" class="blue-bebras">mas acerca de bebras</a>
    </div>
</div>



<div class="card">
    <div class="card-header greenbg">
        <h5 class="card-title">Evnetos</h5>
    </div>

    <div class="card-body">
        <pre class="card-body-text">The second week of November is declared 
as World-Wide BEBRAS week for solving tasks.
Some countries extended it to two weeks. 
Many countries run all-year-round Bebras
activities like participants awarding events,
second round of the challenge, summer
campus, teacher workshops, collecting 
statistics and writing research papers.</pre>
        <a href="#" class="green-bebras">Más información</a>
    </div>
</div>






<div class="card">

    <div class="card-header pinkbg">
        <h5 class="card-title">Grupos de Competición</h5>
    </div>
    <div class="card-body">


        <pre class="card-body-text">There are different task sets for different age students. Six age groups are suggested.
I group. Pre-Primary - Grade 1 and 2 (5-8 years old)
II group. Primary - Grade 3 and 4 (8-10 years old)
III group. Benjamins - Grade 5 and 6 (10-12 years old)
IV group. Cadets - Grade 7 and 8 (12-14 years old)
V group. Juniors - Grade 9 and 10 (14-16 years old)
VI group. Seniors - Grade 11 and 12(13) (16-19 years old)
The classifications may differ according to class level and options of schooling in different countries.
Countries do not need to implement all age groups. Only few countries have the lowest age groups.</pre>
    </div>
</div>





<div class="card">

    <div class="card-header cyanbg">
        <h5 class="card-title">Recursos</h5>
    </div>
    <div class="card-body">

        <pre class="card-body-text">Previous Bebras tasks you can 
find in many countries websites 
as the Bebras brochures.
Some previous challenges are 
available to try without 
registering or logging in.
It depends on language do you 
know. Examples: Finland, Sweden, UK.</pre>
        <a href="#" class="cyan-bebras">Ver recursos</a>
    </div>
</div>


<div class="card">

    <div class="card-header greenbg">
        <h5 class="card-title">Inténtalo!</h5>
    </div>
    <div class="card-body">

        <pre class="card-body-text">Everyone can do it. The Bebras challenges are 
made of a set of short problems called Bebras 
tasks and are delivered online. The tasks are fun,
engaging and based on problems that computer 
scientists often meet and enjoy solving.
The tasks can be solved without prior knowledge 
but instead require logical thinking. The aim is 
to solve as many as you can in the allotted time.</pre>
        <a href="#" class="green-bebras">More information What is a Bebras task.</a>
    </div>
</div>




<div class="card">

    <div class="card-header salmonbg">
        <h5 class="card-title">Qué es el pensamiento computacional?</h5>
    </div>
    <div class="card-body">

        <pre class="card-body-text">Computational thinking involves using 
a setof problem-solving skills and 
techniques that software engineers use 
to write programs and apps.
The Bebras challenge promotes problem 
solving skills and Informatics concepts 
including the ability to break down 
complex tasks into simpler components, 
algorithm design, pattern recognition, 
pattern generalisation and abstraction.</pre>
        <a href="https://es.wikipedia.org/wiki/Pensamiento_computacional" class="salmon-bebras">Más acerca del pensamiento computacional</a>
    </div>
</div>

@endsection