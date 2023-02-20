const archivoJSON = "../productos.json";
window.addEventListener("load", iniciar);

function iniciar() {
    if(localStorage.getItem("logged") == "false") {
        window.open("./login.html", "_self");
    } else {
    imprimirDescriUser();
    document.getElementById("botonUser").addEventListener("click", cerrarSession);
    }
}