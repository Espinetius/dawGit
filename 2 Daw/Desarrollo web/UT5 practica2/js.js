window.onload = function() {
    document.getElementsByTagName("form");
    document.getElementById("passconfirm").onblur = passIguales;
    document.getElementById("enviar").click = finformulario;
}

//Ejercicio 1
function passIguales() {
    let pass1 = document.getElementById('pass').value;
    let pass2 = document.getElementById('passconfirm').value;
    if (pass1 != pass2) {
        document.getElementById("nomachpass").style.visibility = "visible";
    } else {
        document.getElementById("nomachpass").style.visibility = "hidden";
    }
}

function finformulario() {
    preventDefault();
    let edad = document.getElementById("mayor").value;
    alert('Contraseña bien introducida, y es mayor de edad');
}

//Ejercicio 2
function textareaEj2(obj) {
    document.getElementById("mensajeEj2").innerHTML = 'Aun puedes escribir ' + (100 - obj.value.length) + ' caracteres de 100 caracteres';
}

//Ejercicio 3
function certificadoEj3() {
    let nombre = document.getElementById("name").value;
    let tituloActividad = document.getElementById("titActi");
    let pass = document.getElementById("pass").value;
    let backgroundColor = document.getElementById("colorFondo").value;
    let fecha = document.getElementById("fechDip");
    let caliAct = document.getElementById("caliActi").value;
    let ifAlumno = document.getElementsByName("alumno").value;
    let mail = document.getElementById("mail").value;
    let valCurso = document.getElementById("valCurso").value;
    let conditions = document.getElementsByName("conditions").value;
    let diploma = window.open();
    diploma.body.innerHTML = "<h1>Certificado de actividad</h1>";
    diploma.body.innerHTML = "<p>Enhorabuena " + nombre + " has realizado la actividad de " + tituloActividad + " a fecha de " + fecha + "</p>";
    diploma.body.innerHTML = "<p>Has sacado un " + caliAct + ". Se te enviara este certificado a " + mail + "</p>";
    diploma.body.innerHTML = "<p>su Valoracion del curso ha sido de " + valCurso + "</p>";
}