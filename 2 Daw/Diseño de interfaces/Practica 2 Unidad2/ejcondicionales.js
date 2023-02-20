document.write("Ejercicio 1 </br>");
let numero = prompt("Introduce un número");
if (numero == 0) {
    document.write("El numero es igual a 0");
} else if (numero > 0) {
    document.write("El numero es positivo");
} else {
    document.write("El numero es negativo");
}
document.write("</br>Ejercicio 2 </br>");
numero = prompt("Introduce un numero positivo entre 0 y 999.");
if (numero.length > 0) {
    document.write(`El numero tiene ${numero.length} cifras </br>`);
} else {
    document.write(`Número incorrecto </br>`);
}
document.write(`Ejercicio 3  </br>`);
nota = Number(prompt(`Introduce la nota`));
switch (true) {
    case (nota > 0 && nota <= 4):
        document.write(`Tu nota es Insuficiente`);
        break;
    case nota == 5:
        document.write('Tu nota es Suficiente');
        break;
    case nota == 6:
        document.write("Tu nota es Bien");
        break;
    case (nota > 6 && nota <= 8):
        document.write(`Tu nota es Notable`);
        break;
    case (nota > 8 && nota <= 10):
        document.write(`Tu nota es Sobresaliente`);
        break;
    default:
        document.write(`La nota introducida no es valida.`);
}
document.write(`</br>Ejercicio 4 </br>`);
numero = prompt(`Introduce un numero entre el 0 y el 999`);
resultado = (numero.length > 0) ? document.write(`El numero tiene ${numero.length} cifras`) : document.write(`Numero incorrecto`);
document.write(`</br>Ejercicio 5 </br>`);
let nombre = prompt(`Bienvenido! Por favor, introduzca su nombre:`);
let edad = Number(prompt(`Introduzca su edad:`));
let permiso = false;
mayor = (edad >= 18) ? true : false;
if (mayor == false) {
    permiso = prompt(`Introduce si tiene permiso paterno`);
}
switch (true) {
    case mayor == true:
        document.write(`Te llamas ${nombre} tienes ${edad}.Eres mayor de edad. Puedes descargar el juego.`);
        break;
    case (mayor == false && permiso == 'si'):
        document.write(`Te llamas ${nombre} tienes ${edad}.Eres menor de edad. Tienes permiso paterno. Puedes descargar el juego.`);
        break;
    case (mayor == false && permiso == 'no'):
        document.write(`Te llamas ${nombre} tienes ${edad}.Eres menor de edad. No tienes permiso paterno. No puedes descargar el juego.`);
        break;
    default:
        document.write(`Los datos introducidos no son validos`);

}