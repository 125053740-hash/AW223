<?php
// Lee el estado que devuelve guardar_mensaje.php para mostrar una respuesta.
$estado = $_GET['estadophp'] ?? '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portafolio de Miguel Angel, estudiante de TIID.">
    <title>Miguel Angel | Portafolio</title>
    <link rel="stylesheet" href="CSS/estilos.css">
</head>
<body>
    <!-- El encabezado presenta el nombre del sitio y una frase editable con JavaScript. -->
    <header class="encabezado" id="inicio">
        <a class="marca" href="#inicio" aria-label="Ir al inicio">MA<span>.</span></a>
        <p class="texto-encabezado" id="mensaje">Portafolio personal · TIID</p>
        <button class="boton boton-claro" id="btn-mensaje" type="button">Saludar</button>
    </header>

    <!-- Los enlaces llevan a las distintas secciones de esta misma pagina. -->
    <nav class="navegacion" aria-label="Navegacion principal">
        <a href="#sobre-mi">Sobre mi</a>
        <a href="#habilidades">Habilidades</a>
        <a href="#proyectos">Proyectos</a>
        <a href="#contacto">Contacto</a>
        <a class="enlace-admin" href="admin.php">Mensajes</a>
    </nav>

    <main>
        <!-- La portada reúne una presentación, una fotografía y un enlace de acción. -->
        <section class="portada" aria-labelledby="titulo-portada">
            <div class="portada-texto">
                <p class="etiqueta">ESTUDIANTE DE TIID</p>
                <h1 id="titulo-portada">Hola, soy<br><span>Miguel Angel.</span></h1>
                <p class="resumen-portada">Estoy aprendiendo a programar y creando proyectos que conectan la tecnologia con ideas utiles.</p>
                <a class="boton boton-principal" href="#proyectos">Conoce mis proyectos <span aria-hidden="true">&#8595;</span></a>
            </div>
            <span class="numero-portada" aria-hidden="true">01</span>
        </section>

        <!-- Esta seccion conserva la informacion personal del portafolio original. -->
        <section class="seccion sobre-mi" id="sobre-mi">
            <div class="titulo-seccion">
                <p class="etiqueta">UN POCO SOBRE MI</p>
                <h2>Curiosidad que<br>se convierte en codigo.</h2>
            </div>
            <div class="texto-sobre-mi">
                <p>Soy alumno de TIID y estoy aprendiendo a programar. En esta practica estoy trabajando con HTML, CSS, JavaScript, PHP y MySQL.</p>
                <p>Me interesa entender como se construyen las aplicaciones, desde la pantalla que ve una persona hasta los datos que guarda el sistema.</p>
            </div>
        </section>

        <!-- Los proyectos se muestran como articulos independientes para poder ampliarlos. -->
        <section class="seccion seccion-proyectos" id="proyectos">
            <div class="encabezado-seccion">
                <div>
                    <p class="etiqueta">TRABAJO EN PROGRESO</p>
                    <h2>Proyectos</h2>
                </div>
                <p>Ideas de clase que voy convirtiendo en soluciones.</p>
            </div>
            <div class="rejilla-proyectos">
                <article class="proyecto proyecto-energia">
                    <p class="numero-proyecto">PROYECTO 01</p>
                    <div class="simbolo-proyecto" aria-hidden="true">&#9889;</div>
                    <h3>Sistema de ahorro inteligente de energia</h3>
                    <p>Una propuesta para monitorear el consumo y ayudar a utilizar mejor la energia.</p>
                    <span class="estado-proyecto">En desarrollo</span>
                </article>
                <article class="proyecto proyecto-carro">
                    <p class="numero-proyecto">PROYECTO 02</p>
                    <div class="simbolo-proyecto" aria-hidden="true">&#8594;</div>
                    <h3>Carro automatico</h3>
                    <p>Un proyecto de automatizacion para explorar sensores, movimiento y control.</p>
                    <span class="estado-proyecto">En desarrollo</span>
                </article>
            </div>
        </section>

        <!-- Los botones de esta seccion modifican las habilidades desde main.js. -->
        <section class="seccion seccion-habilidades" id="habilidades">
            <div class="encabezado-seccion">
                <div>
                    <p class="etiqueta">HERRAMIENTAS DE APRENDIZAJE</p>
                    <h2>Habilidades</h2>
                </div>
                <p>Conocimientos que sigo practicando.</p>
            </div>
            <ul class="lista-habilidades">
                <li>Java</li>
                <li>Scratch</li>
                <li>PSeInt</li>
                <li>Packet Tracer</li>
                <li>MySQL</li>
            </ul>
            <div class="controles-habilidades" aria-label="Opciones de visualizacion">
                <button class="boton boton-contorno" id="btn-color" type="button">Cambiar color</button>
                <button class="boton boton-contorno" id="btn-letra" type="button">Cambiar letra</button>
            </div>
        </section>

        <!-- El formulario envia los datos por POST al archivo PHP que los guarda. -->
        <section class="seccion seccion-contacto" id="contacto">
            <div class="contacto-intro">
                <p class="etiqueta">HABLEMOS</p>
                <h2>¿Tienes una idea<br>o una pregunta?</h2>
                <p>Escribeme. Tu mensaje se guardara para poder revisarlo despues.</p>
            </div>
            <div class="formulario-contenedor">
                <form action="guardar_mensaje.php" method="POST">
                    <div class="campo">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="txtnombre" placeholder="Tu nombre" maxlength="100" required>
                    </div>
                    <div class="campo">
                        <label for="correo">Correo electronico</label>
                        <input type="email" id="correo" name="txtcorreo" placeholder="tu@correo.com" maxlength="150" required>
                    </div>
                    <div class="campo">
                        <label for="mensaje-contacto">Mensaje</label>
                        <textarea id="mensaje-contacto" name="txtmensaje" rows="4" placeholder="Escribe tu mensaje" maxlength="2000" required></textarea>
                    </div>
                    <button class="boton boton-principal boton-enviar" type="submit">Enviar mensaje <span aria-hidden="true">&#8594;</span></button>
                </form>

                <!-- PHP muestra el resultado del envio sin insertar texto directamente en JavaScript. -->
                <?php if ($estado === 'exito'): ?>
                    <p class="aviso aviso-exito" role="status">Tu mensaje se guardo correctamente.</p>
                <?php elseif ($estado === 'error'): ?>
                    <p class="aviso aviso-error" role="alert">No se pudo guardar el mensaje. Revisa la conexion e intentalo de nuevo.</p>
                <?php elseif ($estado === 'datos'): ?>
                    <p class="aviso aviso-error" role="alert">Completa todos los campos con datos validos.</p>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <!-- El pie muestra el anio actual usando la funcion date() de PHP. -->
    <footer class="pie-pagina">
        <a class="marca marca-pie" href="#inicio">MA<span>.</span></a>
        <p>Practica de programacion web · <?php echo date('Y'); ?></p>
        <a href="#inicio">Volver arriba &#8593;</a>
    </footer>

    <!-- Los scripts separados mantienen organizadas las interacciones y los avisos. -->
    <script src="JS/main.js"></script>
    <script src="JS/AlertInsert.js"></script>
</body>
</html>