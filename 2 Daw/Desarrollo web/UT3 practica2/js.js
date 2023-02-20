document.write('EJERCICIO 1');
fecha = new Date();
mes = fecha.getMonth();
let mesreyes;
dia = fecha.getDate();
let diareyes;
if (mes > 1) {
    mesreyes = 12 - mes;
} else {
    mesreyes = mes;
}
if (dia > 6) {
    if (mes % 2 != 0) {
        diareyes = 31 - dia + 6;
        mesreyes--;
    } else if (mes == 2) {
        diareyes = 28 - dia + 6;
        mesreyes--;
    } else {
        diareyes = 30 - dia + 6;
        mesreyes--;
    }
} else {
    diareyes = 6 - dia;
}
if (mesreyes != mes) {
    alert('Quedan ' + diareyes + ' dias y ' + mesreyes + ' meses!');
} else {
    alert('Quedan ' + diareyes + '!');
}

document.write('</br>EJERCICIO 2');
let diasemana;
switch (fecha.getDay()) {
    case 1:
        diasemana = 'Lunes';
        break;
    case 2:
        diasemana = 'Martes';
        break;
    case 3:
        diasemana = 'Miercoles';
        break;
    case 4:
        diasemana = 'Jueves';
        break;
    case 5:
        diasemana = 'Viernes';
        break;
    case 6:
        diasemana = 'Sabado';
        break;
    case 7:
        diasemana = 'Domingo';
        break;
}
let mesString;
switch (fecha.getMonth()) {
    case 0:
        mesString = 'Enero';
        break;
    case 1:
        mesString = 'Febrero';
        break;
    case 2:
        mesString = 'Marzo';
        break;
    case 3:
        mesString = 'Abril';
        break;
    case 4:
        mesString = 'Mayo';
        break;
    case 5:
        mesString = 'Junio';
        break;
    case 6:
        mesString = 'Julio';
        break;
    case 7:
        mesString = 'Agosto';
        break;
    case 8:
        mesString = 'Septiembre';
        break;
    case 9:
        mesString = 'Octubre';
        break;
    case 10:
        mesString = 'Noviembre';
        break;
    case 11:
        mesString = 'Diciembre';
        break;
}

alert('Hoy es ' + diasemana + ' ,' + fecha.getDate() + ' de ' + mesString + ' de ' + fecha.getFullYear() + ' y son las ' + fecha.toLocaleTimeString() + ' horas');

document.write('</br>EJERCICIO 3');
let numero = Number(prompt('Introduzca el radio de la circunferencia:'));
let area = 2 * Math.PI * numero;
if (area != NaN) {
    alert(`El area es ${area.toPrecision(2)}`);
} else {
    alert(`El ${numero} introducido no es valido`);
}

document.write('</br>EJERCICIO 4');
let numero1 = Number(prompt('Introduce un numero:'));
let numero2 = Number(prompt('Introduce otro numero:'));
let random1 = Math.random() * numero1;
let random2 = Math.random() * numero2;
let resultado = (random1 > random2) ? random1 - random2 : random2 - random1;
alert(`El numero aleatorio entre los numeros que introdujo es ${resultado.toPrecision(4)}`);

document.write('</br>EJERCCIO 5');
let cadena = prompt('</br>Introduce un pequeño texto:');
document.write('</br>Primera mitad de los caracteres ' + cadena.substring(0, (cadena.length / 2)));
document.write('</br>Ultimo caracter: ' + cadena.charAt(cadena.length - 1));
document.write('</br>La cadena del reves: ');
let i;
for (i = 0; i < cadena.length; i++) {
    document.write(cadena.charAt(cadena.length - i - 1));
}
document.write('</br>Los caracteres separados por guion:');
for (i = 0; i < cadena.length; i++) {
    if (i != cadena.length - 1) {
        document.write(cadena.charAt(i) + '-');
    } else {
        document.write(cadena.charAt(i));
    }

}
let vocales = 0;
for (i = 0; i < cadena.length; i++) {
    if (cadena.charAt(i) == 'a' || cadena.charAt(i) == 'e' || cadena.charAt(i) == 'i' || cadena.charAt(i) == 'o' || cadena.charAt(i) == 'u') {
        vocales++;
    }
}
document.write(`</br>Hay un total de ${vocales} en el texto`);