// Busca cada elemento antes de usarlo para evitar errores en otras paginas.
const botonMensaje = document.getElementById('btn-mensaje');
const mensajeEncabezado = document.getElementById('mensaje');

// Al pulsar el boton, cambia el texto de bienvenida.
if (botonMensaje && mensajeEncabezado) {
    botonMensaje.addEventListener('click', function () {
        mensajeEncabezado.textContent = 'Hola, gracias por visitar mi portafolio.';
    });
}

// Cambia el color de fondo de todas las habilidades.
const botonColor = document.getElementById('btn-color');
const habilidades = document.querySelectorAll('.lista-habilidades li');
let colorAlternativo = false;

if (botonColor) {
    botonColor.addEventListener('click', function () {
        colorAlternativo = !colorAlternativo;

        habilidades.forEach(function (habilidad) {
            habilidad.style.backgroundColor = colorAlternativo ? '#d45a42' : '';
        });
    });
}

// Activa o quita una clase CSS para cambiar el tipo de letra.
const botonLetra = document.getElementById('btn-letra');
const listaHabilidades = document.querySelector('.lista-habilidades');

if (botonLetra && listaHabilidades) {
    botonLetra.addEventListener('click', function () {
        listaHabilidades.classList.toggle('letra-alternativa');
    });
}

// Pide confirmacion antes de eliminar un mensaje desde la tabla de administracion.
document.querySelectorAll('[data-confirmar-eliminacion]').forEach(function (enlace) {
    enlace.addEventListener('click', function (evento) {
        if (!window.confirm('¿Estas seguro de eliminar este mensaje?')) {
            evento.preventDefault();
        }
    });
});