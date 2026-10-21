<?php
require_once "conexion.php";

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: admin.php");
    exit();
}

$stmt = $conexion->prepare("SELECT * FROM mensajes WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$mensajeData = $resultado->fetch_assoc();

if (!$mensajeData) {
    header("Location: admin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zona Administración - Editar Mensaje</title>
    <link rel="stylesheet" href="css/estilos.css?v=2.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <header>
        <h1>Zona Administracion</h1>
        <p>Formulario para Editar</p>
    </header>

    <nav class="nav-admin">
        <a href="admin.php" title="Volver a Administración"><i class="fa-solid fa-rotate-right fa-lg"></i></a>
        <a href="index.php" title="Volver al Portafolio"><i class="fa-solid fa-house fa-lg"></i></a>
    </nav>

    <main>
        <section class="seccion-admin">
            <div class="tarjeta-formulario-admin">
                <h2>Editar Mensaje</h2>
                <form action="actualizar_mensaje.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $mensajeData['id']; ?>">
                    
                    <div class="campo">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($mensajeData['nombre']); ?>" required placeholder="Escribe tu nombre">
                    </div>
                    <div class="campo">
                        <label for="email">Correo electrónico</label>
                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($mensajeData['correo']); ?>" required placeholder="Escribe tu correo">
                    </div>
                    <div class="campo">
                        <label for="mensaje">Mensaje</label>
                        <textarea id="mensaje" name="mensaje" rows="5" required><?php echo htmlspecialchars($mensajeData['mensaje']); ?></textarea>
                    </div>
                    <button type="submit" class="boton">Actualizar Mensaje</button>
                </form>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 Mi portafolio web</p>
        <p>Práctica de programación web todos los derechos se reservan</p>
    </footer>

</body>
</html>