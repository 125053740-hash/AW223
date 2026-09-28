const btnMensaje = document.getElementById('btn-mensaje');
const mensaje = document.getElementById('mensaje');

btnMensaje.addEventListener('click', function() {
    mensaje.textContent = '¡Hola! Bienvenido a mi Portafolio';
});

const btnColor = document.getElementById('btn-color');
const btnLetra = document.getElementById('btn-letra');
const habilidades = document.querySelectorAll('.lista-habilidades li');

btnColor.addEventListener('click', function() {
    habilidades.forEach(function(caja) {
        caja.style.backgroundColor = '#4CAF50';
        caja.style.color = 'white';
    });
});

btnLetra.addEventListener('click', function() {
    habilidades.forEach(function(caja) {
        caja.style.fontFamily = 'Courier New, monospace';
    });
});

const formulario = document.getElementById('formulario');
const nombre = document.getElementById('nombre');
const correo = document.getElementById('correo');

formulario.addEventListener('submit', function(e) {
    e.preventDefault();

    if (nombre.value.trim() === '') {
        alert('Por favor, escribe tu nombre');
        return;   
    }

    if (correo.value.trim() === '') {
        alert('El correo es obligatorio');
        return;
    }

    alert('Formulario enviado correctamente');
});   