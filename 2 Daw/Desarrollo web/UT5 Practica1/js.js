window.onload = function() {
    document.getElementById("1").ondblclick = tripleN;
    document.getElementById("1").onmouseover = fondo;
    document.getElementById("1").onmouseout = cambiarFondoPorDefecto;
    document.getElementById("enlace_1").onclick = muestraOculta;
    document.getElementById("enlace_2").onclick = muestraOculta;
    document.getElementById("enlace_3").onclick = muestraOculta;
    window.onmousemove = moverRaton;
    window.onclick = pulsarRaton;
    window.onkeypress = pulsarTeclado;
}


//Ejercicio 1
function tripleN() {
    c_1 = document.getElementById("1");
    numero = c_1.innerHTML;
    numero *= 3;
    c_1.innerHTML = numero;
}

function fondo() {
    c_1 = document.getElementById("1");
    c_1.style.background = "lightblue";
    c_1.style.color = "red";
}

function cambiarFondoPorDefecto() {
    c_1 = document.getElementById("1");
    c_1.style.background = "white";
    c_1.style.color = "black";
}
//Ejercicio 2
function estado(contenido, enlace) {
    if (contenido.style.visibility == "hidden") {
        contenido.style.visibility = "visible";
        enlace.innerHTML = "Ocultar contenidos";
    } else {
        contenido.style.visibility = "hidden";
        enlace.innerHTML = "Se ha ocultado el contenido";
    }

}

function muestraOculta() {
    if (this == document.getElementById("enlace_1")) {
        estado(document.getElementById("contenidos_1"), this);
    } else
    if (this == document.getElementById("enlace_2")) {
        estado(document.getElementById("contenidos_2"), this);
    } else if (this == document.getElementById("enlace_3")) {
        estado(document.getElementById("contenidos_3"), this);
    }
}
//Ejercicio 3
function moverRaton(elEvento) {
    cambios("Ratón", "grey", "Se mueve el ratón", elEvento);
}

function pulsarRaton(elEvento) {
    cambios("Ratón", "lightyellow", "Se pulsa el ratón", elEvento);
}

function pulsarTeclado(elEvento) {
    cambios("Teclado", "lightblue", "Se pulsa el teclado", elEvento);
}

function cambios(titulo, color, fila2, elEvento) {
    var nav = document.getElementById("nav");
    var pag = document.getElementById("pag");

    if (titulo == "Ratón") {
        nav.innerHTML = "Navegador: " + elEvento.clientX + ", " + elEvento.clientY;
        pag.innerHTML = "Pagina: " + elEvento.pageX + ", " + elEvento.pageY;
    } else {
        var evento = window.event || elEvento;
        nav.innerHTML = "Carácter: " + evento.key;
        pag.innerHTML = "Código: " + event.charCode;
    }

    document.getElementById("titulo").innerHTML = titulo;
    document.getElementById("contenedor").style.background = color;
    document.getElementById("fila").innerHTML = fila2;
}