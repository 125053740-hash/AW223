const parametros= new URLSearchParams(window.location.search);
const estado = parametros.get("estadophp");

if(estado === "exito"){
    alert(" Tu Mensaje enviado con éxito");
}else if(estado === "error"){
    alert("Hubo un error al enviar tu mensaje. Por favor, inténtalo de nuevo.");
}
if(estado === "error_nombre"){
    alert("Algo fallo, intentalo nuevamente");
}
if(estado =!null){
    window.history.replaceState({}, document.title, window.location.pathname);
}