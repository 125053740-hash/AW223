<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Mensaje - Mi Portafolio</title>
    <link rel="stylesheet" href="./CSS/estilos.css">
</head>
<body>
    <header>
        <h1>Zona Administracion</h1>
        <p>Formulario para Editar</p>
    </header>

    <nav class="admin-home admin-edit-nav" aria-label="Navegación de administración">
        <a href="admin.php" aria-label="Volver a la zona de administración">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M3 12a9 9 0 1 0 2.64-6.36L3 8"></path>
                <path d="M3 3v5h5"></path>
            </svg>
        </a>
        <a href="index.html" aria-label="Volver al portafolio">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="m3 10 9-7 9 7"></path>
                <path d="M5 9v12h14V9"></path>
                <path d="M9 21v-8h6v8"></path>
            </svg>
        </a>
    </nav>

    <main class="admin-main">
        <section class="mensajes-card" aria-labelledby="titulo-editar">
            <h2 id="titulo-editar">Editar Mensaje</h2>
            <form class="formulario-editar">
                <div class="campo">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Escribe tu nombre">
                </div>
                <div class="campo">
                    <label for="correo">Correo electrónico</label>
                    <input type="email" id="correo" name="correo" placeholder="ejemplo@correo.com">
                </div>
                <div class="campo">
                    <label for="mensaje">Mensaje</label>
                    <textarea id="mensaje" name="mensaje" rows="5"></textarea>
                </div>
                <button type="submit">Actualizar Mensaje</button>
            </form>
        </section>
    </main>

    <footer>
        <p>© 2026 Mi Portafolio / Práctica de Programación Web</p>
    </footer>
</body>
</html>
