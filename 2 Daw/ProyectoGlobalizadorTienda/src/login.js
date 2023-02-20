const archivoJSON = "../productos.json";
localStorage.setItem("user", "admin");
localStorage.setItem("password", "1234");
window.addEventListener("load", iniciar);

function iniciar() {
    if (localStorage.getItem("logged")!="true") {
        document.getElementById("botonLogin").addEventListener("click", login);
        document.getElementById("botonRegistro").addEventListener("click", register);
    } else {
        window.open("cuenta.html","_self");
    }


}