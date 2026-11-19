# Practica12: portafolio personal

Este proyecto reutiliza las secciones del portafolio: presentacion, informacion personal, proyectos, habilidades y contacto. El formulario guarda mensajes en MySQL y la pantalla de administracion permite consultarlos, editarlos y eliminarlos.

## Archivos principales

- `index.php`: landing page y formulario de contacto.
- `CSS/estilos.css`: apariencia general y adaptacion a pantallas pequenas.
- `JS/main.js`: botones de bienvenida y habilidades, y confirmacion para borrar.
- `JS/AlertInsert.js`: avisos que dependen del resultado del envio.
- `conexion.php`: conexion a MySQL.
- `guardar_mensaje.php`, `consulta_mensajes.php`, `editar.php`, `actualizar_mensaje.php` y `eliminar_mensaje.php`: operaciones para administrar mensajes.

## Como probarlo

1. Inicia Apache y MySQL en tu entorno local.
2. En phpMyAdmin crea la base `portafolio_db` y una tabla `mensajes` con las columnas `id`, `nombre`, `correo`, `mensaje` y `timeStaps`.
3. Si tu usuario o contrasena de MySQL son diferentes, actualiza los valores de `conexion.php`.
4. Abre `http://localhost/AW223/Practica12/` si el proyecto esta dentro de la carpeta publica de Apache.
5. Envia un mensaje y entra en **Mensajes** para probar la consulta, edicion y eliminacion.

Los comentarios en los archivos explican la tarea de cada seccion y los conceptos de PHP, HTML, CSS y JavaScript que aparecen en ella.