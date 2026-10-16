<?php
try {
    require_once("conexion.php");
    $mensajes = $conexion->query(
        "SELECT nombre, correo, mensaje, timeStaps AS fecha FROM mensajes ORDER BY timeStaps DESC"
    );
} catch (mysqli_sql_exception $error) {
    error_log($error->getMessage());
    http_response_code(500);
    exit("No se pudieron cargar los mensajes.");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>
    <link rel="stylesheet" href="./CSS/estilos.css">
</head>
<body>
    <header>
        <h1>Administración</h1>
        <p>Mensajes recibidos</p>
    </header>

    <nav class="admin-home">
        <a href="index.php">Volver al portafolio</a>
    </nav>

    <main class="admin-main">
        <section class="mensajes-card">
            <h2>Mensajes</h2>
            <div class="tabla-contenedor">
                <table class="tabla-mensajes">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Mensaje</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($mensajes->num_rows === 0): ?>
                            <tr>
                                <td colspan="4">No hay mensajes.</td>
                            </tr>
                        <?php else: ?>
                            <?php while ($fila = $mensajes->fetch_assoc()): ?>
                                <tr>
                                    <td><?= htmlspecialchars($fila["nombre"], ENT_QUOTES, "UTF-8") ?></td>
                                    <td><?= htmlspecialchars($fila["correo"], ENT_QUOTES, "UTF-8") ?></td>
                                    <td><?= nl2br(htmlspecialchars($fila["mensaje"], ENT_QUOTES, "UTF-8")) ?></td>
                                    <td><?= htmlspecialchars(date("d/m/Y H:i", strtotime($fila["fecha"])), ENT_QUOTES, "UTF-8") ?></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>
