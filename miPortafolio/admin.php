<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zona Administracion - Mensajes Recibidos</title>
    
    <link rel="stylesheet" href="css/estilos.css?v=2.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    
    <script>
        function confirmarEliminacion(id) {
            if (confirm("¿Estás seguro de borrar este mensaje?")) {
                window.location.href = "eliminar_mensaje.php?id=" + id;
            }
        }
    </script>
</head>
<body>

    <header>
        <h1>Zona Administracion</h1>
        <p>Mensajes Recibidos</p>
    </header>

    <nav class="nav-admin">
        <a href="index.php" title="Volver al Portafolio"><i class="fa-solid fa-house fa-lg"></i></a>
    </nav>

    <main>
        <section class="seccion-admin">
            <div class="tarjeta-admin">
                <h2>Mensajes Recibidos</h2>
                <table class="tabla-mensajes">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Mensaje</th>
                            <th>Fecha</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require 'consulta_mensajes.php';
                        $rsMensajes = consultaMensajes();

                        while ($arrMensaje = mysqli_fetch_array($rsMensajes)){

                        echo "<tr>
                            <td>".htmlspecialchars($arrMensaje['nombre'])."</td>
                            <td>".htmlspecialchars($arrMensaje['correo'])."</td>
                            <td>".htmlspecialchars($arrMensaje['mensaje'])."</td>
                            <td>".$arrMensaje['timeStaps']."</td>
                            
                            <td class='acciones'>
                                <!-- MODIFICACIÓN: ID Dinámico para editar[cite: 11, 14] -->
                                <a href='editar.php?id=".$arrMensaje['id']."' title='Editar'><i class='fa-regular fa-pen-to-square'></i></a>
                                
                                <!-- MODIFICACIÓN: Llamada a la función con el ID dinámico para confirmar y eliminar -->
                                <a href='javascript:void(0);' onclick='confirmarEliminacion(".$arrMensaje['id'].")' title='Borrar'><i class='fa-regular fa-trash-can'></i></a>
                            </td>
                        </tr>";
                        }
                       ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 Mi portafolio web</p>
        <p>Práctica de programación web todos los derechos se reservan</p>
    </footer>

    <!-- MODIFICACIÓN: Alerta de confirmación al regresar de la eliminación[cite: 9, 11] -->
    <?php if (isset($_GET['estado'])): ?>
        <script>
            <?php if ($_GET['estado'] === 'eliminado'): ?>
                alert("El mensaje ha sido eliminado con éxito.");
            <?php elseif ($_GET['estado'] === 'actualizado'): ?>
                alert("El mensaje ha sido actualizado correctamente.");
            <?php endif; ?>
        </script>
    <?php endif; ?>
</body>
</html>