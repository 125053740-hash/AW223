<?php
header('Content-Type: text/html; charset=UTF-8');
require_once __DIR__ . '/conexion.php';

$gastos = [];
$errorListado = false;

try {
    $resultadoGastos = $conexion->query(
        'SELECT id, monto, categoria, concepto, pagado, fecha FROM datos ORDER BY fecha DESC, id DESC'
    );
    while ($gasto = $resultadoGastos->fetch_assoc()) {
        $gastos[] = $gasto;
    }
    $resultadoGastos->free();
} catch (mysqli_sql_exception $error) {
    error_log('Error al consultar los gastos: ' . $error->getMessage());
    $errorListado = true;
}

$conexion->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar gasto</title>
</head>
<body>
    <main>
        <h1>Registrar un nuevo gasto</h1>
        <p>Completa el formulario para guardar un gasto.</p>

        <p id="resultado" role="status" aria-live="polite"></p>

        <form action="guardar_gasto.php" method="POST" accept-charset="UTF-8">
            <div>
                <label for="concepto">Concepto</label>
                <input type="text" id="concepto" name="txtconcepto" maxlength="50" required>
            </div>
            <div>
                <label for="monto">Monto</label>
                <input type="number" id="monto" name="txtmonto" min="0" max="99999999999" step="1" required>
            </div>
            <div>
                <label for="categoria">Categoría</label>
                <input type="text" id="categoria" name="txtcategoria" maxlength="50" required>
            </div>
            <button type="submit">Registrar gasto</button>
        </form>

        <section>
            <h2>Gastos registrados</h2>
            <?php if ($errorListado): ?>
                <p role="alert">No se pudieron cargar los gastos.</p>
            <?php elseif (count($gastos) === 0): ?>
                <p>Todavía no hay gastos registrados.</p>
            <?php else: ?>
                <table border="1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Concepto</th>
                            <th>Categoría</th>
                            <th>Monto</th>
                            <th>Pagado</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($gastos as $gasto): ?>
                            <tr>
                                <td><?php echo htmlspecialchars((string) $gasto['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($gasto['concepto'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($gasto['categoria'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars((string) $gasto['monto'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo $gasto['pagado'] ? 'Sí' : 'No'; ?></td>
                                <td><?php echo htmlspecialchars($gasto['fecha'], ENT_QUOTES, 'UTF-8'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </section>
    </main>

    <script>
        const mensajes = {
            exito: 'El gasto se guardó correctamente.',
            datos: 'Revisa los datos: concepto y categoría son obligatorios y el monto debe ser un número entero válido.',
            error: 'No se pudo guardar el gasto. Revisa la conexión con la base de datos.'
        };
        const estado = new URLSearchParams(window.location.search).get('estado');
        const resultado = document.getElementById('resultado');

        if (estado && Object.prototype.hasOwnProperty.call(mensajes, estado)) {
            resultado.textContent = mensajes[estado];
        }
    </script>
</body>
</html>
