// Lee el parametro de estado que PHP agrega a la direccion despues del envio.
const parametrosUrl = new URLSearchParams(window.location.search);
const estadoEnvio = parametrosUrl.get('estadophp');

// Muestra una alerta segun el resultado que devolvio guardar_mensaje.php.
if (estadoEnvio === 'exito') {
    window.alert('Tu mensaje se envio con exito.');
} else if (estadoEnvio === 'error') {
    window.alert('Hubo un error al guardar tu mensaje.');
} else if (estadoEnvio === 'datos') {
    window.alert('Revisa los datos del formulario e intenta de nuevo.');
}

// Quita el parametro para que al recargar la pagina no se repita la alerta.
if (estadoEnvio) {
    window.history.replaceState({}, document.title, window.location.pathname + window.location.hash);
}