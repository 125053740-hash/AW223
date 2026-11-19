<?php
// Comprueba que el identificador recibido sea un numero valido.
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: admin.php');
    exit();
}

// Busca el mensaje que se va a cargar en el formulario de edicion.
require_once 'conexion.php';
$consulta = $conexion->prepare('SELECT id, nombre, correo, mensaje FROM mensajes WHERE id = ?');
$consulta->bind_param('i', $id);
$consulta->execute();
$resultado = $consulta->get_result();
$mensaje = $resultado->fetch_assoc();
$consulta->close();
$conexion->close();

// Si el registro ya no existe, vuelve a la lista.
if (!$mensaje) {
    header('Location: admin.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar mensaje | Portafolio</title>
    <link rel="stylesheet" href="CSS/estilos.css">
</head>
<body class="pagina-admin">
    <!-- Encabezado sencillo que conserva la navegacion del proyecto. -->
    <header class="encabezado">
        <a class="marca" href="index.php">MA<span>.</span></a>
        <p class="texto-encabezado">Editar mensaje</p>
        <a class="boton boton-claro" href="admin.php">Volver a mensajes</a>
    </header>

    <main class="admin-contenido">
        <div class="admin-titulo">
            <p class="etiqueta">ACTUALIZAR REGISTRO</p>
            <h2>Editar mensaje</h2>
        </div>

        <!-- Los valores guardados aparecen escapados para tratarlos como texto. -->
        <form class="formulario-admin" action="actualizar_mensaje.php" method="POST">
            <input type="hidden" name="id" value="<?php echo (int) $mensaje['id']; ?>">
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" maxlength="100" value="<?php echo htmlspecialchars($mensaje['nombre'], ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>
            <div class="campo">
                <label for="correo">Correo electronico</label>
                <input type="email" id="correo" name="correo" maxlength="150" value="<?php echo htmlspecialchars($mensaje['correo'], ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>
            <div class="campo">
                <label for="texto-mensaje">Mensaje</label>
                <textarea id="texto-mensaje" name="mensaje" rows="5" maxlength="2000" required><?php echo htmlspecialchars($mensaje['mensaje'], ENT_QUOTES, 'UTF-8'); ?></textarea>
            </div>
            <button class="boton boton-principal" type="submit">Guardar cambios</button>
        </form>
        <a class="enlace-volver" href="admin.php">Cancelar y volver a mensajes</a>
    </main>
</body>
</html>