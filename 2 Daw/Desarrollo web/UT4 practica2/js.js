let semana = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'];
let diaString;
let mes = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];
let fechaString;
let f = new Date();
let hora = String(f).substring(16, 25);

function fecha(Date) {
    let diaF = f.getDate();
    let mesF;
    let anyoF = f.getFullYear();
    for (let i = 0; i < mes.length; i++) {
        if (f.getMonth() == i - 1) {
            mesF = mes[i - 1];
        }
    }
    fechaString = `${diaF} de ${mesF} del año ${anyoF}`;
    return fechaString;
}

function diasemana(Date) {
    let diaF = f.getDay();
    let diaStr;
    for (let j = 1; j < semana.length; j++) {
        if (diaF == j) {
            diaStr = semana[j - 1];
        }
    }
    diaString = `Hoy es ${diaStr}`;
    return diaString;
}
document.write(`${diasemana(f)}, ${fecha(f)} y son las ${hora}`);


//EJERCICIO 2 
let numero = Number(prompt("Introduce un numero"));

function noEsNumero() {
    alert("Lo introducido no es un numero");
}

function par() {
    document.write(`El numero ${numero} es par`);
}

function impar() {
    document.write(`El numero ${numero} es impar`);
}

function comprobar(numero) {
    if (numero % 2 == 0) {
        par();
    } else {
        impar();
    }
}
resultado = (isNaN(numero)) ? noEsNumero() : comprobar(numero);

//EJERCICIO 3
var palabras = new Array('botella', 'zeta', 'androide', 'minuto');
palabras.sort();
palabras.forEach(element => {
    document.write(`<p>${element}</p>`);
});

//EJERCICIO 4
let palabras = prompt("Introduce en una linea las palabrtas que quieras: ");
let miArray = palabras.split(" ");
document.write(`<p> La primera palabra introducida es: ${miArray[0]} </p>`);
document.write(`<p> La ultima palabra introducida es: ${miArray[miArray.length-1]}`);
document.write(`<p> Has introducido un total de ${miArray.length} palabras </p>`);
document.write(`<p> Las palabras introducidas son: </br> ${miArray.sort()} </p>`);
document.write(`<p> ${miArray.join('-')} </p>`);
document.write(`<p> ${miArray.slice(2,4)} </p>`);
let nuevasPalabras = prompt("Introduce 2 nuevas palabras: ");
let nuevoArray = nuevasPalabras.split(" ");
miArray.splice(3, 0, nuevoArray[0], nuevoArray[1]);
document.write(`<p> ${miArray} </p>`);

//EJERCICIO 5
let frase = prompt("Introduce una frase: ");
let palabras = frase.split(" ");

document.write(` El texto inicial es: ${frase} </br>`);

palabras.forEach(p => document.write(`${p.charAt(0).toUpperCase()+p.substring(1)} `));

//EJERCICIO 6
let texto = prompt("Introduzca una frase");
let palabra = texto.split(' ');
let resultado = "";
for (let i = 0; i < palabra.length; i++) {
    if (palabra[i].length > resultado.length) {
        resultado = palabra[i];
    };
};
alert("La palabra mas larga es " + resultado);

//EJERCICIO 7
let lista = [];
for (let i = 0; i < 7; i++) {
    let random = Math.random();
    random = random * 49 + 1;
    random = Math.trunc(random);
    lista[i] = random;
}

let reintegro = Math.random();
reintegro = reintegro * 10;
reintegro = Math.trunc(reintegro);

document.write(`Los numeros son: ${lista} y el reintegro es ${reintegro}`);