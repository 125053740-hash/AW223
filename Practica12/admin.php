<?php
// Carga la funcion que consulta los mensajes almacenados.
require_once 'consulta_mensajes.php';
$mensajes = consultaMensajes();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes | Portafolio</title>
    <link rel="stylesheet" href="CSS/estilos.css">
</head>
<body class="pagina-admin">
    <!-- La misma barra permite regresar al portafolio principal. -->
    <header class="encabezado">
        <a class="marca" href="index.php">MA<span>.</span></a>
        <p class="texto-encabezado">Administracion de mensajes</p>
        <a class="boton boton-claro" href="index.php">Volver al portafolio</a>
    </header>

    <main class="admin-contenido">
        <!-- Cada fila se construye con los datos que devuelve consultaMensajes(). -->
        <div class="admin-titulo">
            <p class="etiqueta">BANDEJA DE ENTRADA</p>
            <h2>Mensajes recibidos</h2>
            <p>Registros guardados desde el formulario de contacto.</p>
        </div>

        <div class="tabla-contenedor">
            <table class="tabla-mensajes">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Mensaje</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($mensajes->num_rows > 0): ?>
                        <?php while ($mensaje = $mensajes->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($mensaje['nombre'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($mensaje['correo'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo nl2br(htmlspecialchars($mensaje['mensaje'], ENT_QUOTES, 'UTF-8')); ?></td>
                                <td><?php echo htmlspecialchars($mensaje['timeStaps'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td class="acciones">
                                    <a href="editar.php?id=<?php echo (int) $mensaje['id']; ?>">Editar</a>
                                    <a class="accion-borrar" data-confirmar-eliminacion href="eliminar_mensaje.php?id=<?php echo (int) $mensaje['id']; ?>">Eliminar</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">Todavia no hay mensajes guardados.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

    <!-- JavaScript controla el cuadro de confirmacion antes de borrar. -->
    <script src="JS/main.js"></script>
</body>
</html>