@extends('layouts.main')

@section('content')
    <script type="text/javascript">
        $(document).ready(function() {
            var question = $("#question");
            window.currentQuestion = 1;
            window.answers =[];
            window.questions = [
                "-1",
                "Soy asertivo, exigente y decisivo.",
                "Disfruto hacer múltiples tareas al mismo tiempo.",
                "Me desenvuelvo bien en un entorno basado en desafíos.",
                "Pienso en las tareas por encima de los demás o de mí mismo.",
                "Estoy motivado por el logro y la autoridad.",
                "Disfruto influir e inspirar a las personas.",
                "Soy optimista respecto a los demás.",
                "Suelo ser el alma de la fiesta.",
                "Pienso en motivar a las personas.",
                "Estoy motivado por el reconocimiento y la aprobación.",
                "Me desenvuelvo mejor en ambientes consistentes que en ambientes cambiantes.",
                "Prefiero lo específico a lo general.",
                "Disfruto de grupos pequeños de personas.",
                "Prefiero ser miembro de un equipo antes que liderarlo.",
                "Estoy motivado por la estabilidad y el apoyo.",
                "Típicamente no asumo grandes riesgos.",
                "Me encantan las tareas, el orden y los detalles.",
                "Tengo razón la mayoría de las veces.",
                "Cumplo con las reglas claramente definidas.",
                "Estoy motivado por la calidad y la corrección.",
                "Me gusta organizar servicios y eventos.",
                "Disfruto comenzar nuevas iglesias.",
                "Disfruto trabajar con mis manos.",
                "Puedo darme cuenta cuando alguien es insincero.",
                "Rezo por los perdidos todos los días.",
                "Animar a los demás es una alta prioridad en mi vida.",
                "Confiar en que Dios proveerá nuestras necesidades diarias es importante para mí.",
                "Influir en otros para el reino de Dios a través de las finanzas es extremadamente importante para mí.",
                "Busco oportunidades para orar por los enfermos.",
                "Disfruto hacer las pequeñas cosas que otros no hacen.",
                "Disfruto recibir gente en mi casa.",
                "Disfruto pasar horas en oración por otras personas.",
                "La educación es muy importante para mí.",
                "Tiendo a motivar a los demás a involucrarse.",
                "Mi corazón se duele cuando veo a otros sufriendo.",
                "Creo que Dios me usará para realizar milagros.",
                "Disfruto compartir el evangelio con otros grupos de personas y nacionalidades.",
                "He dedicado tiempo considerable a dominar mi voz o instrumento.",
                "Cuidar a los que sufren es primordial para mí.",
                "El pecado voluntario de los demás realmente me irrita.",
                "Disfruto servir detrás de las cámaras.",
                "Disfruto crear esquemas de la Biblia.",
                "Dios me ha usado para interpretar un lenguaje celestial.",
                "Disfruto más del libro de Proverbios que de cualquier otro libro de la Biblia.",
                "Me apasiona gestionar detalles.",
                "Prefiero emprender nuevos proyectos ministeriales.",
                "Me considero un artesano o artesana.",
                "Siento cuando las situaciones no son espiritualmente saludables.",
                "Estoy muy preocupado por ver a los perdidos ser salvos.",
                "Intento presentarme como amoroso y atento.",
                "Pedirle a Dios una lista de cosas grandes me emociona.",
                "Encuentro formas de dar ofrendas por encima de mi diezmo.",
                "Creo que la sanidad milagrosa es para este tiempo.",
                "Ayudar a los demás es uno de mis logros más grandes.",
                "Crear un hogar cálido y acogedor es importante para mí.",
                "Me siento preocupado por orar por situaciones en el mundo.",
                "La gente me busca para aprender más sobre el Reino de Dios.",
                "Prefiero liderar cuando sea necesario.",
                "Soy muy sensible a las historias tristes.",
                "Los milagros suelen ocurrir cuando estoy cerca.",
                "Vivir en otro país para beneficiar al evangelio me emociona.",
                "Deseo servir a la iglesia a través de la adoración.",
                "Disfruto conectar, cuidar y entrenar a los demás.",
                "No me cuesta confrontar a alguien con el pecado en su vida.",
                "Me molesta cuando la gente se queda sentada sin hacer nada.",
                "Comparto la verdad bíblica con los demás con la esperanza de su crecimiento personal.",
                "Rezo en lenguas a diario.",
                "Cuando estudio las escrituras, Dios me da revelaciones únicas.",
                "Crear una lista de tareas es fácil y disfrutable para mí.",
                "Me atraen los ministerios que inician nuevas iglesias.",
                "Construir algo con mis manos es muy gratificante para mí.",
                "Puedo identificar problemas o cuestiones antes que los demás.",
                "Disfruto compartir el evangelio con un extraño.",
                "Busco formas de ser un estímulo para otras personas.",
                "Confío en que Dios tiene mi espalda en todas las situaciones.",
                "Ganar más dinero significa que puedo dar más.",
                "Dios me ha usado para sanar a los enfermos.",
                "Ser parte del proceso es algo que me llena.",
                "Tiendo a hacer sentir a los extraños como en casa.",
                "Las personas me describen a menudo como un guerrero de oración.",
                "Disfruto conocer detalles bíblicos y ayudar a los demás a entenderlos.",
                "Delego responsabilidades para lograr tareas.",
                "Estoy motivado para ayudar a los menos afortunados.",
                "Tengo un hambre constante de ver el poder milagroso de Dios.",
                "Me enfoco mucho en alcanzar al mundo para Cristo.",
                "Obtengo mi satisfacción más profunda al guiar a otros en adoración vocal o instrumental.",
                "Disfruto caminar con alguien en tiempos de desesperación.",
                "Disfruto escuchar una predicación apasionada y clara de la verdad.",
                "Me gusta hacer pequeñas cosas que otros dejan pasar.",
                "Prefiero enseñar la Biblia de forma temática en lugar de versículo por versículo.",
                "Orar en el Espíritu es alentador e importante para mí.",
                "Cuando enfrento dificultades, tiendo a tomar decisiones sabias.",
            ];

            $("#begin").click(function() {
                $("#disc-intro").fadeOut(function() {
                    beginAssessment();
                });
            });
            function beginAssessment() {
                question.html('<h1>Pregunta '+window.currentQuestion+' de 92</h1><h3>'+window.questions[window.currentQuestion]+'</h3><span class="answer btn" data-answer="1">Nunca</span><span class="answer btn" data-answer="2">Rara vez</span><span class="answer btn" data-answer="3">A veces</span><span class="answer btn" data-answer="4">Frecuentemente</span><span class="answer btn" data-answer="5">Siempre</span>');
            }

            function nextQuestion() {
                if(window.currentQuestion  < window.questions.length) {
                    $('.answer').die();
                    question.fadeOut(function() {
                        question.html('<h1>Pregunta '+window.currentQuestion+' de 92</h1><h3>'+window.questions[window.currentQuestion]+'</h3><span class="answer btn" data-answer="1">Nunca</span><span class="answer btn" data-answer="2">Rara vez</span><span class="answer btn" data-answer="3">A veces</span><span class="answer btn" data-answer="4">Frecuentemente</span><span class="answer btn" data-answer="5">Siempre</span>');
                        question.fadeIn();
                        bindAnswer();
                    });
                } else {
                    finishTest();
                }
            }

            function finishTest() {
                $("#question").fadeOut(function() {
                    $.ajax({
                        type: 'POST',
                        url: "/results",
                        data: {
                            answers : window.answers,
                            _token : "{{ csrf_token() }}"
                         },
                        cache: false
                    }).done(function( html ) {
                      $("#results").append(html);
                  });
                    var ah = "<h1>Your Simple DISCovery results</h1>";
                    $("#results").html(ah);
                    $("#results").slideDown();
                });
            }

            function bindAnswer() {
                $('.answer').live('click', function() {
                    window.answers[window.currentQuestion] = parseFloat($(this).attr('data-answer'));
                    window.currentQuestion++;
                    nextQuestion();
                });
            }
            bindAnswer();

        });
    </script>

    <div id="disc-intro">
        <p><strong>El Perfil de Personalidad te ayudará a descubrir y desarrollar tu estilo de liderazgo.</strong></p>
        <p>Es con tu personalidad con la que lideras e influyes en los demás.</p>
        <p>Hay algunas pautas que debes seguir al realizar el Perfil de Personalidad.</p>
        <ul>
            <li><b>Sé honesto - </b>No censures tus respuestas. Tu primera respuesta es la más precisa.</li>
            <li><b>Elige tu entorno - </b>Compartimentalizar la vida es una tendencia común. Es decir, puedes comportarte de una manera en el trabajo, de otra en casa y de otra en la iglesia. Para ser consistente, elige mentalmente el entorno en el que pasas la mayor parte de tu tiempo al responder.</li>
        </ul>
        <p>Te harán 92 preguntas breves. Cada pregunta tendrá cinco posibles respuestas:</p>
        <ul>
            <li><b>Nunca</b> - Esto nunca es cierto para mí o esto nunca se aplica a mí.</li>
            <li><b>Rara vez</b> - Esto rara vez es cierto para mí o esto rara vez se aplica a mí.</li>
            <li><b>A veces</b> - Esto a veces es cierto para mí o esto a veces se aplica a mí.</li>
            <li><b>Frecuentemente</b> - Esto frecuentemente es cierto para mí o esto frecuentemente se aplica a mí.</li>
            <li><b>Siempre</b> - Esto siempre es cierto para mí o esto siempre se aplica a mí.</li>
        </ul>
        <p class="message"></p>
        <div class="text-center">
            <span id="begin" class="btn btn-primary">Comenzar la evaluación</span>
            @if(Session::has('answers'))
                <br><br>
                <a class="btn btn-default" href="/{{ $params['organization']->shortname }}/results">
                    <i class="fa fa-list-ul" aria-hidden="true"></i> Ver resultados anteriores
                </a>
            @endif
        </div>
    </div>
    <div id="question"></div>
    <div id="results" style="display:none;"></div>
@endsection