const archivoJSON = "../productos.json";

window.addEventListener("load", iniciar);

function iniciar() {
    numProdu = localStorage.getItem("carritoinicial").split(",")
    numproductos= numProdu.length-1;
    if (numproductos!=0) {
        document.getElementById("numProductos").innerHTML = numproductos;
    }
    divProducto = document.getElementById("divProducto");
    fetch (archivoJSON)
        .then(respuesta => respuesta.json())
        .then(json => cargarJSON(json))

}

function cargarJSON(obj) {
    itsLogged();
    if (localStorage.getItem("filtro")!= "true") { 
        imprimirProducto(obj);
    } else {
        imprimirTarjeta(obj);
    }
    for(i=0; i<document.getElementsByClassName("verDescripcion").length;i++) {
        document.getElementsByClassName("verDescripcion")[i].addEventListener("click", botonVerDescripcion);
        document.getElementsByClassName("añadirCarrito")[i].addEventListener("click", añadiendoCarrito);
    }
    for(i=0;i<document.getElementsByClassName("tarjetas").length; i++) {
        document.getElementsByClassName("tarjetas")[i].addEventListener("click", clickTarjeta);
    }
}
