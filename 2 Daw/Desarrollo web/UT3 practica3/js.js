// EJERCICIO 1--> ABRIR PESTAÑA EMERGENTE CON LA WEB DEL DEPARTAMENTO Y REDIMENSIONADA AL 50% DE ANCHO
/*window.open("https://informatica.palomerasfp.es/", "resizable: yes, heigth: 350px");
// EJERCICIO 2--> ALERT CON AVISO DE COOKIES HABILITADAS
resultado = (navigator.cookieEnabled) ? 'si' : 'no';
alert('Estan las cookies habilitadas?: ' + resultado);
// EJERCICIO 3--> DIPLOMA
let nombre = prompt('Introduce tu nombre:');
let apellidos = prompt('Introduce tus apellidos:');
let certificado = window.open("", "Certificado");
certificado.document.write("<html>");
certificado.document.write("<body>");
certificado.document.write("<h2>ENHORABUENA </h2>" + nombre + "<p> </p>" + apellidos);
certificado.document.write("<h3>Aqui tienes tu diploma de participacion!!</h3>");
certificado.document.write("<button onclick=window.print('Imprimiendo')>Imprimir</button><button onclick=window.close()>Cerrar</button>");
certificado.document.write("</body>");
certificado.document.write("</html>");*/
// EJERCICIO 4--> FICHA
nombre = prompt("Introduce tu nombre:(en mayusculas) ");
apellidos = prompt("Introduce tus apellidos:(en maysuculas) ");
let fecha = prompt("Introduce tu fecha de nacimiento (dd/mm/aaaa): ");
let ficha = window.open("", "Ficha personal");
ficha.document.write("<html>");
ficha.document.write("<body>");
ficha.document.write("<h1>Practica 2 DWEC</h1>");
ficha.document.write(`<p>Buenos dias, ${nombre}  ${apellidos}</p>`);
ficha.document.write(`<p>Tu nombre completo es ${nombre} ${apellidos} tiene ${(nombre.length+apellidos.length)} caracteres inlcuidos espacios</p>`);
ficha.document.write(`<p>La primera letra 'A' de tu nombre esta en la posicion ${nombre.indexOf('A')}</p>`);
ficha.document.write(`<p>La ultima letra 'A' de tu nombre esta en la posicion ${nombre.lastIndexOf('A')}</p>`);
ficha.document.write(`<p>Tu nombre menos las tres primeras letras es ${nombre.substring(3)}</p>`);
ficha.document.write(`<p>Tu edad es ${2022-Number(fecha.substring(6))}</p>`);
let estacion = Number(fecha.substring(4, 5));
let estacionStr;
switch (true) {
    case estacion > 1 && estacion < 4:
        estacionStr = "Invierno";
        break;
    case estacion >= 4 && estacion < 6:
        estacionStr = "Primavera";
        break;
    case estacion >= 6 && estacion < 9:
        estacionStr = "Verano";
        break;
    case estacion >= 9 && estacion < 11:
        estacionStr = "Otoño";
        break;
    case estacion >= 11 && estacion < 13:
        estacionStr = "Invierno";
        break;
}

ficha.document.write(`<p>Naciste un feliz dia de ${estacionStr} del año ${fecha.substring(6)}</p>`);

let ventana3 = (function ventan() {
    let ventana = window.open("", "ventana3");
    ventana.document.write('<html>');
    ventana.document.write('<body>');
    ventana.document.write('<h3>Ejemplo de ventana nueva</h3>');
    ventana.document.write(`URL completa: ${document.URL}`);
    ventana.document.write(`Nombre del navegador: ${navigator.platform}`);
    ventana.document.write(`JAVA ${navigator.javaEnabled()}`);
    ventana.document.write('<iframes></iframes>');
    ventana.document.write('</body>');
    ventana.document.write('</html>');
});
ficha.document.write(`<button onclick=${ventana3}>Ventana</button>`);
ficha.document.write("</body>");
ficha.document.write("</html>");