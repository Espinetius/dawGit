// Fetch API desde una API REST
// Fetch API desde un JSON (Objeto)
boton = document.getElementById("cargarAPI");
boton.addEventListener("click", cargarApi);

function cargarApi() {
    const urlPhotos = 'https://picsum.photos/v2/list?page=5&limit=10';
    fetch(urlPhotos)
        .then(respuesta => respuesta.json())
        .then(json => cargarJSON(json))
        .catch(e => console.log(e));
}

function cargarJSON(myObj) {
    console.log(myObj);
    for (i = 0; i < myObj.length; i++) {
        document.getElementById("contenido").innerHTML += "Autoria :";
        document.getElementById("contenido").innerHTML += myObj[i].author + "<a href='myObj[i].url'> --- Ver imagen </a><br>";
    }
}