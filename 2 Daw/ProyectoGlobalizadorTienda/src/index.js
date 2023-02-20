const archivoJSON = "../productos.json";
window.addEventListener("load", iniciar);

function iniciar() {
    ofertaFlash = document.getElementById("ofertaFlash");
    ofertadesc = document.getElementsByClassName("desc");
    numProdu = localStorage.getItem("carritoinicial").split(",")
    numproductos= numProdu.length-1;
    document.getElementById("busqueda").addEventListener("blur", busquedaSpeech);
    document.getElementById("botonbusqueda").addEventListener("click", busquedaTexto);
    if (numproductos!=0) {
        document.getElementById("numProductos").innerHTML = numproductos;
    }
    fetch(archivoJSON)
        .then(respuesta => respuesta.json())
        .then(json => cargarJSON(json))
        
}

function cargarJSON(obj) {
    if(localStorage.getItem("noti")=="true") {
        audio.play();
    }
    localStorage.setItem("filtro", "false");
    ofertaflash(obj);
    descuentos(obj);
    itsLogged();
    for(i=0; i<document.getElementsByClassName("tarjetas").length; i++) {
        document.getElementsByClassName("tarjetas")[i].addEventListener("click", clickTarjeta);
    }
    document.getElementById("busqueda").addEventListener("click", busquedaSpeech);
}
