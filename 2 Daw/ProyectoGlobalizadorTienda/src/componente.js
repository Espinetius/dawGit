const archivoJSON = "../productos.json";

window.addEventListener("load", iniciar);

function iniciar() {
    numProdu = localStorage.getItem("carritoinicial").split(",")
    numproductos= numProdu.length-1;
    divProducto = document.getElementById("divProducto");
    if (numproductos!=0) {
        document.getElementById("numProductos").innerHTML = numproductos;
    }
    fetch (archivoJSON)
        .then(respuesta => respuesta.json())
        .then(json => cargarJSON(json))

}

function cargarJSON(obj) {
    itsLogged();
    descriProducto(obj);
    document.getElementById("añadirCarro").addEventListener("click", añadiendoCarrito);
    ofertaflash(obj);
        
}
