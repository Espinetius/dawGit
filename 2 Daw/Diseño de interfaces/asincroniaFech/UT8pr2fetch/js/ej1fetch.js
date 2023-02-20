// Fetch API desde un JSON (Objeto)
boton = document.getElementById("cargarJSONArray");
boton.addEventListener("click", cargarUsuarios);

function cargarUsuarios() {
    const url = "./empleados.json";
    fetch(url)
        .then(respuesta => respuesta.json())
        .then(json => cargarJSON(json))
        .catch(e => console.log(e));
}

function cargarJSON(myObj) {
    console.log(myObj);
    for (i = 0; i < myObj.length; i++) {
        document.getElementById("contenido").innerHTML += "Empleados: <br>";
        document.getElementById("contenido").innerHTML += "ID: " + myObj[i].id + ", nombre: " + myObj[i].nombre + ", empresa: " + myObj[i].empresa + ", trabajo: " + myObj[i].trabajo + "<hr>";
    }
}