const archivoJSON = "../productos.json";
precioTotal=0;

window.addEventListener("load", iniciar);

function iniciar() {
    divProducto = document.getElementById("divProducto");
    fetch (archivoJSON)
        .then(respuesta => respuesta.json())
        .then(json => cargarJSON(json))

}
function cargarJSON(obj) {
    if (localStorage.getItem("logged") == "false") {
        alert("Debes acceder a tu cuenta primero");
        window.open("login.html", "_self");
    } else {
    cargarCesta(obj);
    document.getElementById("totalPagar").innerHTML += precioTotal + "$";
    document.getElementById("limpiaCesta").addEventListener("click", limpiaCarrito);
    document.getElementById("botonPagar").addEventListener("click", pagar);
    }
}
