<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zona Administracion - Mi portafolio</title>
    <link rel="stylesheet" href="./CSS/estilos.css">
</head>
<body>
    <header>
        <h1>Zona Administracion</h1>
        <p>Mensajes Recibidos</p>
    </header>

    <nav class="admin-home" aria-label="Navegación de administración">
        <a href="index.html" aria-label="Volver al portafolio">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="m3 10 9-7 9 7"></path>
                <path d="M5 9v12h14V9"></path>
                <path d="M9 21v-8h6v8"></path>
            </svg>
        </a>
    </nav>

    <main class="admin-main">
        <section class="mensajes-card" aria-labelledby="titulo-mensajes">
            <h2 id="titulo-mensajes">Mensajes Recibidos</h2>
            <div class="tabla-contenedor">
                <table class="tabla-mensajes">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Mensaje</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Ana</td>
                            <td><a href="mailto:ana@example.com">ana@example.com</a></td>
                            <td>Hola, me interesa tu portafolio.</td>
                            <td class="tabla-opciones">
                                <a href="editar.php?id=1" aria-label="Editar mensaje 1">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M12 20h9"></path>
                                        <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L8 18l-4 1 1-4Z"></path>
                                    </svg>
                                </a>
                                <span class="icono-borrar" role="img" aria-label="Borrar (solo visual)">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M3 6h18"></path>
                                        <path d="M8 6V4h8v2"></path>
                                        <path d="m19 6-1 14H6L5 6"></path>
                                        <path d="M10 11v5M14 11v5"></path>
                                    </svg>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>José</td>
                            <td><a href="mailto:jose@example.com">jose@example.com</a></td>
                            <td>Quisiera más información sobre tus proyectos.</td>
                            <td class="tabla-opciones">
                                <a href="editar.php?id=2" aria-label="Editar mensaje 2">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M12 20h9"></path>
                                        <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L8 18l-4 1 1-4Z"></path>
                                    </svg>
                                </a>
                                <span class="icono-borrar" role="img" aria-label="Borrar (solo visual)">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M3 6h18"></path>
                                        <path d="M8 6V4h8v2"></path>
                                        <path d="m19 6-1 14H6L5 6"></path>
                                        <path d="M10 11v5M14 11v5">  </path>
                                    </svg>
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <footer>
        <p>© 2026 Mi Portafolio / Práctica de Programación Web</p>
    </footer>
</body>
</html>
