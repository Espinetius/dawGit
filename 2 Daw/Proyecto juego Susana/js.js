window.onload = function() {
    if (localStorage.getItem("i") == null) {
        i = 1;
        localStorage.setItem("i", i);
    }
    contador = 120;
    player = document.getElementById("nombjugador");
    player.addEventListener("change", imprimirjugador);
    botonMenuPrincipal = document.getElementById("menuNav");
    botonRefresh = document.getElementById("refresh");
    botonFinJuego = document.getElementById("finJuego");
    //temporizador = new Temporizador('reloj', 10, 0);

    menuNav = document.getElementById("menuNav");
    formulario = document.getElementById("formularioInicio");
    nombJugador = document.getElementById("nombjugador");
    botonFormulario = document.getElementById("botonFormulario");
    menuprincipal = document.getElementById("menupricipal");
    botonRefresh.addEventListener("click", opciones);
    document.getElementById("tipoJuego").addEventListener("change", imprimirDescripcion);
    if (player.value.length == 0) {
        document.getElementById("nombrejugador").innerHTML = "DEBE INTRODUCIR SU NOMBRE <br> si no, no podra identificarse en el ranking";
    }
    botonFormulario.addEventListener("click", opciones);
    /* typed = new Typed('.typed', {
        stringsElement: '.typed-strings',
        typeSpeed: 45,
        backSpeed: false,
    }); */
}

function imprimirjugador() {

    document.getElementById("nombrejugador").innerHTML = "Preparate " + player.value + "! <br> Ahora selecciona una historia y pulsa el boton de jugar!";
    document.getElementById("jugador").innerHTML = player.value;

}

function imprimirRanking() {
    arraypartida = new Array();
    jugadores = localStorage.getItem("i");
    jugadores++;
    for (j = 1; j < jugadores; j++) {

        nodoelemento = document.createElement("p");
        nodoelemento.textContent = localStorage.getItem("partida" + j);
        document.getElementById("ranking").appendChild(nodoelemento);

    }
}

function imprimirDescripcion() {
    if (document.getElementById("tipoJuego").value == "poli") {
        document.getElementById("tipoHistoriaDescripcion").innerHTML = "Esto es una historia con un asesinato en el que tendras que resolver el caso desde el punto de vista de la policia. Estas preparado?";
    } else if (document.getElementById("tipoJuego").value == "drama") {
        document.getElementById("tipoHistoriaDescripcion").innerHTML = "Esto es una historia de drama.......Preparate a llorar."
    } else {
        document.getElementById("tipoHistoriaDescripcion").innerHTML = "Debe de seleccionar un tipo de historia para poder empezar a jugar"
    }
}

/*
function Temporizador(id, inicio, final) {
     this.id= id;
    this.inicio = inicio;
    this.final = final;
    this.contador = inicio;
    this.conteoSegundos = function() {
        if (this.contador==this.final) {
            this.conteoSegundos = null;
            return;
        }
        document.getElementById("reloj").innerHTML=this.contador--;
        setTimeout(this.conteoSegundos.bind(this), 1000);
   };
}
*/

function temporizador() {
    tiempo = setInterval(function() {
        if (contador != 0) {
            contador--;
        } else {
            alert("SE HA TERMINADO EL TIEMPO!");
            window.open("fin.html", "_blank");
            window.close();
            clearInterval(tiempo);
        }
        document.getElementById("reloj").innerHTML = contador;
    }, 1000);
}

function opciones() {
    sessionStorage.setItem("player", player.value);
    if (document.getElementById("tipoJuego").value == "poli") {
        sessionStorage.setItem("historia", "Historia Policiaca")
        formulario.classList.add("esconder");
        document.getElementById("audiointro").pause();
        document.getElementById("audiopoli").play();
        policiaca();
    } else if (document.getElementById("tipoJuego").value == "drama") {
        sessionStorage.setItem("historia", "Historia de Drama")
        formulario.classList.add("esconder");
        document.getElementById("audiointro").pause();
        document.getElementById("audiodrama").play();
        drama();
    }
    i = localStorage.getItem("i");
    i++;
    localStorage.setItem("i", i);
    localStorage.setItem("partida" + i, sessionStorage.getItem("player") + "  <--->  " + sessionStorage.getItem("historia"));
}

function policiaca() {
    policiaca1 = document.getElementById("policiaca1");
    policiaca12 = document.getElementById("policiaca1-2");
    policiaca13 = document.getElementById("policiaca1-3");
    policiaca14 = document.getElementById("policiaca1-4");
    policiaca15 = document.getElementById("policiaca1-5");
    policiaca16 = document.getElementById("policiaca1-6");
    policiaca22 = document.getElementById("policiaca2-2");
    policiaca23 = document.getElementById("policiaca2-3");
    policiaca24 = document.getElementById("policiaca2-4");
    policiaca25 = document.getElementById("policiaca2-5");
    policiaca26 = document.getElementById("policiaca2-6");
    policiaca27 = document.getElementById("policiaca2-7");
    policiacaid = document.getElementById("policiaca");
    policiacaid.classList.remove("esconder");
    policiacaid.classList.add("mostrar");
    policiaca1.classList.remove("esconder");
    policiaca1.classList.add("mostrar");
    document.getElementById("temporizador").classList.remove("esconder");
    document.getElementById("temporizador").classList.add("mostrar");
    document.getElementById("imagen").src = "img/Crimen.png";
    temporizador();
    policiaca12.classList.add("esconder");
    policiaca13.classList.add("esconder");
    policiaca14.classList.add("esconder");
    policiaca15.classList.add("esconder");
    policiaca16.classList.add("esconder");
    policiaca22.classList.add("esconder");
    policiaca23.classList.add("esconder");
    policiaca24.classList.add("esconder");
    policiaca25.classList.add("esconder");
    policiaca26.classList.add("esconder");
    policiaca27.classList.add("esconder");
    b1 = document.getElementById("b1");
    b2 = document.getElementById("b2");
    b3 = document.getElementById("b3");
    b5 = document.getElementById("b5");
    b7 = document.getElementById("b7");
    b8 = document.getElementById("b8");
    b9 = document.getElementById("b9");
    b10 = document.getElementById("b10");
    b11 = document.getElementById("b11");
    b12 = document.getElementById("b12");
    b13 = document.getElementById("b13");
    b14 = document.getElementById("b14");
    b15 = document.getElementById("b15");
    b16 = document.getElementById("b16");
    b17 = document.getElementById("b17");
    b1.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        policiaca1.classList.remove("mostrar");
        policiaca1.classList.add("esconder");
        policiaca12.classList.remove("esconder");
        policiaca12.classList.add("mostrar");
        document.getElementById("imagen").src = "img/morge.webp";
        temporizador();
        //temporizador.conteoSegundos();
    });
    b2.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        policiaca1.classList.remove("mostrar");
        policiaca1.classList.add("esconder");
        policiaca22.classList.remove("esconder");
        policiaca22.classList.add("mostrar");
        document.getElementById("imagen").src = "img/morge.webp";
        temporizador();
        //temporizador.conteoSegundos();
    });
    b3.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        policiaca12.classList.remove("mostrar");
        policiaca12.classList.add("esconder");
        policiaca22.classList.remove("esconder");
        policiaca22.classList.add("mostrar");
        document.getElementById("imagen").src = "img/comisaria.jpg";
        temporizador();
        //temporizador.conteoSegundos();
    });
    b4.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        policiaca12.classList.remove("mostrar");
        policiaca12.classList.add("esconder");
        policiaca13.classList.remove("esconder");
        policiaca13.classList.add("mostrar");
        document.getElementById("imagen").src = "img/eidificio.jpg";
        temporizador();
        //temporizador.conteoSegundos();
    });
    b5.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        policiaca13.classList.remove("mostrar");
        policiaca13.classList.add("esconder");
        policiaca23.classList.remove("esconder");
        policiaca23.classList.add("mostrar");
        document.getElementById("imagen").src = "img/policia.jpg";
        temporizador();
        //temporizador.conteoSegundos();
    });
    b6.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        policiaca13.classList.remove("mostrar");
        policiaca13.classList.add("esconder");
        policiaca14.classList.remove("esconder");
        policiaca14.classList.add("mostrar");
        document.getElementById("imagen").src = "img/calles.jpg";
        temporizador();
        //temporizador.conteoSegundos();
    });
    b7.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        policiaca14.classList.remove("mostrar");
        policiaca14.classList.add("esconder");
        policiaca24.classList.remove("esconder");
        policiaca24.classList.add("mostrar");
        document.getElementById("imagen").src = "img/interrogatorio.jpg";
        temporizador();
        //temporizador.conteoSegundos();
    });
    b8.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        policiaca14.classList.remove("mostrar");
        policiaca14.classList.add("esconder");
        policiaca15.classList.remove("esconder");
        policiaca15.classList.add("mostrar");
        document.getElementById("imagen").src = "img/polienfadao.jpg";
        temporizador();
        //temporizador.conteoSegundos();
    });
    b9.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        policiaca15.classList.remove("mostrar");
        policiaca15.classList.add("esconder");
        policiaca16.classList.remove("esconder");
        policiaca16.classList.add("mostrar");
        document.getElementById("imagen").src = "img/interrogatorio.jpg";
        setTimeout('window.open("fin.html", "_blank")', 17000);
        setTimeout('window.close()', 17001);
    });
    b10.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        policiaca22.classList.remove("mostrar");
        policiaca22.classList.add("esconder");
        policiaca23.classList.remove("esconder");
        policiaca23.classList.add("mostrar");
        document.getElementById("imagen").src = "img/policia.jpg";
        temporizador();
        //temporizador.conteoSegundos();
    });
    b11.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        policiaca22.classList.remove("mostrar");
        policiaca22.classList.add("esconder");
        policiaca13.classList.remove("esconder");
        policiaca13.classList.add("mostrar");
        document.getElementById("imagen").src = "img/arresto.webp";
        temporizador();
        //temporizador.conteoSegundos();
    });
    b12.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        policiaca23.classList.remove("mostrar");
        policiaca23.classList.add("esconder");
        policiaca24.classList.remove("esconder");
        policiaca24.classList.add("mostrar");
        document.getElementById("imagen").src = "img/interrogatorio.jpg";
        temporizador();
        //temporizador.conteoSegundos();
    });
    b13.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        policiaca24.classList.remove("mostrar");
        policiaca24.classList.add("esconder");
        policiaca15.classList.remove("esconder");
        policiaca15.classList.add("mostrar");
        document.getElementById("imagen").src = "img/interrogatorio.jpg";
        temporizador();
        //temporizador.conteoSegundos();
    });
    b14.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        policiaca24.classList.remove("mostrar");
        policiaca24.classList.add("esconder");
        policiaca25.classList.remove("esconder");
        policiaca25.classList.add("mostrar");
        document.getElementById("imagen").src = "img/Rame-RIvers.png";
        temporizador();
        //temporizador.conteoSegundos();
    });
    b15.addEventListener("click", function() {
        document.getElementById("temporizador").classList.remove("mostrar");
        document.getElementById("temporizador").classList.add("esconder");
        policiaca25.classList.remove("mostrar");
        policiaca25.classList.add("esconder");
        policiaca27.classList.remove("esconder");
        policiaca27.classList.add("mostrar");
        document.getElementById("imagen").src = "img/confesion.jpg";
        setTimeout('window.open("fin.html", "_blank")', 17000);
        setTimeout('window.close()', 17001);
    });
    b16.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        policiaca25.classList.remove("mostrar");
        policiaca25.classList.add("esconder");
        policiaca26.classList.remove("esconder");
        policiaca26.classList.add("mostrar");
        document.getElementById("imagen").src = "img/confesion.jpg";
        temporizador();
        //temporizador.conteoSegundos();
    });
    b17.addEventListener("click", function() {
        document.getElementById("temporizador").classList.remove("mostrar");
        document.getElementById("temporizador").classList.add("esconder");
        policiaca26.classList.remove("mostrar");
        policiaca26.classList.add("esconder");
        policiaca27.classList.remove("esconder");
        policiaca27.classList.add("mostrar");
        document.getElementById("imagen").src = "img/jail.jpg";
        setTimeout('window.open("fin.html", "_blank")', 17000);
        setTimeout('window.close()', 17001);
    });
}

function drama() {
    drama0 = document.getElementById("drama0");
    d1 = document.getElementById("d1");
    d2 = document.getElementById("d2");
    drama1 = document.getElementById("drama1");
    d3 = document.getElementById("d3");
    d4 = document.getElementById("d4");
    drama2 = document.getElementById("drama2");
    d5 = document.getElementById("d5");
    d6 = document.getElementById("d6");
    drama3 = document.getElementById("drama3");
    d7 = document.getElementById("d7");
    drama4 = document.getElementById("drama4");
    d8 = document.getElementById("d8");
    d9 = document.getElementById("d9");
    drama5 = document.getElementById("drama5");
    d10 = document.getElementById("d10");
    d11 = document.getElementById("d11");
    drama6 = document.getElementById("drama6");
    d12 = document.getElementById("d12");
    dramaLLegada1 = document.getElementById("dramaLLegada1");
    d13 = document.getElementById("d13");
    d14 = document.getElementById("d14");
    drama7 = document.getElementById("drama7");
    drama7verdad1 = document.getElementById("verdad1");
    d15 = document.getElementById("d15");
    drama7verdad2 = document.getElementById("verdad2");
    d16 = document.getElementById("d16");
    drama8 = document.getElementById("drama8");
    d17 = document.getElementById("d17");
    d18 = document.getElementById("d18");
    drama9 = document.getElementById("drama9");
    d19 = document.getElementById("d19");
    drama10 = document.getElementById("drama10");
    d20 = document.getElementById("d20");
    drama11 = document.getElementById("drama11");
    d21 = document.getElementById("d21");
    drama12 = document.getElementById("drama12");
    d22 = document.getElementById("d22");
    d23 = document.getElementById("d23");
    drama13 = document.getElementById("drama13");
    d24 = document.getElementById("d24");
    vida1 = document.getElementById("vida1");
    d25 = document.getElementById("d25");
    d26 = document.getElementById("d26");
    vida2 = document.getElementById("vida2");
    drama14 = document.getElementById("drama14");
    d27 = document.getElementById("d27");
    drama15 = document.getElementById("drama15");
    dramaId = document.getElementById("drama");
    dramaId.classList.remove("esconder");
    dramaId.classList.add("mostrar");
    drama0.classList.remove("esconder");
    drama0.classList.add("mostrar");
    document.getElementById("temporizador").classList.remove("esconder");
    document.getElementById("temporizador").classList.add("mostrar");
    temporizador();
    document.getElementById("imagen").src = "img/bedroom.jpg";
    drama1.classList.add("esconder");
    drama2.classList.add("esconder");
    drama3.classList.add("esconder");
    drama4.classList.add("esconder");
    drama5.classList.add("esconder");
    drama6.classList.add("esconder");
    dramaLLegada1.classList.add("esconder");
    drama7.classList.add("esconder");
    drama7verdad1.classList.add("esconder");
    drama7verdad2.classList.add("esconder");
    drama8.classList.add("esconder");
    drama9.classList.add("esconder");
    drama10.classList.add("esconder");
    drama11.classList.add("esconder");
    drama12.classList.add("esconder");
    drama13.classList.add("esconder");
    vida1.classList.add("esconder");
    vida2.classList.add("esconder");
    drama14.classList.add("esconder");
    drama15.classList.add("esconder");
    drama16.classList.add("esconder");
    d1.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        drama0.classList.remove("mostrar");
        drama0.classList.add("esconder");
        drama1.classList.remove("esconder");
        drama1.classList.add("mostrar");
        document.getElementById("imagen").src = "img/taxi.webp";
        temporizador();
        //temporizador.conteoSegundos();
    });
    d2.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        drama0.classList.remove("mostrar");
        drama0.classList.add("esconder");
        drama2.classList.remove("esconder");
        drama2.classList.add("mostrar");
        document.getElementById("imagen").src = "img/taxi.webp";
        temporizador();
        //temporizador.conteoSegundos();
    });
    d3.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        drama1.classList.remove("mostrar");
        drama1.classList.add("esconder");
        drama3.classList.remove("esconder");
        drama3.classList.add("mostrar");
        document.getElementById("imagen").src = "img/estacionTren.jpg";
        sessionStorage.setItem('verdad', '2');
        temporizador();
        //temporizador.conteoSegundos();
    });
    d4.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        drama1.classList.remove("mostrar");
        drama1.classList.add("esconder");
        drama4.classList.remove("esconder");
        drama4.classList.add("mostrar");
        document.getElementById("imagen").src = "img/llamada.jpg";
        sessionStorage.setItem('verdad', '1');
        temporizador();
        //temporizador.conteoSegundos();
    });
    d5.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        drama2.classList.remove("mostrar");
        drama2.classList.add("esconder");
        dramaLLegada1.classList.remove("esconder");
        dramaLLegada1.classList.add("mostrar");
        document.getElementById("imagen").src = "img/pasillo.jpg";
        temporizador();
        //temporizador.conteoSegundos();
    });
    d6.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        drama2.classList.remove("mostrar");
        drama2.classList.add("esconder");
        drama6.classList.remove("esconder");
        drama6.classList.add("mostrar");
        document.getElementById("imagen").src = "img/bulling.jpg";
        temporizador();
        //temporizador.conteoSegundos();
    });
    d7.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        drama3.classList.remove("mostrar");
        drama3.classList.add("esconder");
        dramaLLegada1.classList.remove("esconder");
        dramaLLegada1.classList.add("mostrar");
        document.getElementById("imagen").src = "img/pasillo.jpg";
        temporizador();
        //temporizador.conteoSegundos();
    });
    d8.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        drama4.classList.remove("mostrar");
        drama4.classList.add("esconder");
        drama5.classList.remove("esconder");
        drama5.classList.add("mostrar");
        document.getElementById("imagen").src = "img/accidente.jpg";
        temporizador();
        //temporizador.conteoSegundos();
    });
    d9.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        drama4.classList.remove("mostrar");
        drama4.classList.add("esconder");
        drama9.classList.remove("esconder");
        drama9.classList.add("mostrar");
        document.getElementById("imagen").src = "img/boceto-interior-del-tren-viajar-dentro-de-un-vintage-lujoso-ventana-la-vagón-bolsa-viaje-retro-ilustración-gráfica-mano-174508831.jpg";
        temporizador();
        //temporizador.conteoSegundos();
    });
    d10.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        drama5.classList.remove("mostrar");
        drama5.classList.add("esconder");
        drama13.classList.remove("esconder");
        drama13.classList.add("mostrar");
        document.getElementById("imagen").src = "img/agente.jpg";
        temporizador();
        //temporizador.conteoSegundos();
    });
    d11.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        drama5.classList.remove("mostrar");
        drama5.classList.add("esconder");
        drama12.classList.remove("esconder");
        drama12.classList.add("mostrar");
        document.getElementById("imagen").src = "img/robo.webp";
        temporizador();
        //temporizador.conteoSegundos();
    });
    d12.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        drama6.classList.remove("mostrar");
        drama6.classList.add("esconder");
        dramaLLegada1.classList.remove("esconder");
        dramaLLegada1.classList.add("mostrar");
        document.getElementById("imagen").src = "img/pasillo.jpg";
        temporizador();
        //temporizador.conteoSegundos();
    });
    d13.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        dramaLLegada1.classList.remove("mostrar");
        dramaLLegada1.classList.add("esconder");
        if (sessionStorage.getItem('verdad') == 1) {
            drama7.classList.remove("esconder");
            drama7.classList.add("mostrar");
            drama7verdad1.classList.remove("esconder");
            drama7verdad1.classList.add("mostrar");
            document.getElementById("imagen").src = "img/directora.webp";
        } else if (sessionStorage.getItem('verdad') == 2) {
            drama7.classList.remove("esconder");
            drama7.classList.add("mostrar");
            drama7verdad2.classList.remove("esconder");
            drama7verdad2.classList.add("mostrar");
            document.getElementById("imagen").src = "img/directora.webp";
        }
        temporizador();
        //temporizador.conteoSegundos();
    });
    d14.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        dramaLLegada1.classList.remove("mostrar");
        dramaLLegada1.classList.add("esconder");
        drama8.classList.remove("esconder");
        drama8.classList.add("mostrar");
        document.getElementById("imagen").src = "img/accidente.jpg";
        temporizador();
        //temporizador.conteoSegundos();
    });
    d15.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        drama7verdad1.classList.remove("mostrar");
        drama7verdad1.classList.add("esconder");
        vida1.classList.remove("esconder");
        vida1.classList.add("mostrar");
        document.getElementById("imagen").src = "img/clases.webp";
        temporizador();
        //temporizador.conteoSegundos();
    });
    d16.addEventListener("click", function() {
        document.getElementById("temporizador").classList.remove("mostrar");
        document.getElementById("temporizador").classList.add("esconder");
        drama7verdad2.classList.remove("mostrar");
        drama7verdad2.classList.add("esconder");
        vida2.classList.remove("esconder");
        vida2.classList.add("mostrar");
        document.getElementById("imagen").src = "img/clases.webp";
        setTimeout('window.open("fin.html", "_blank")', 17000);
        setTimeout('window.close()', 17001);

        //temporizador.conteoSegundos();
    });
    d17.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        drama8.classList.remove("mostrar");
        drama8.classList.add("esconder");
        drama10.classList.remove("esconder");
        drama10.classList.add("mostrar");
        document.getElementById("imagen").src = "img/directora.webp";
        temporizador();
        //temporizador.conteoSegundos();
    });
    d18.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        drama8.classList.remove("mostrar");
        drama8.classList.add("esconder");
        drama11.classList.remove("esconder");
        drama11.classList.add("mostrar");
        document.getElementById("imagen").src = "img/directora.webp";
        temporizador();
        //temporizador.conteoSegundos();
    });
    d19.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        drama9.classList.remove("mostrar");
        drama9.classList.add("esconder");
        dramaLLegada1.classList.remove("esconder");
        dramaLLegada1.classList.add("mostrar");
        document.getElementById("imagen").src = "img/pasillo.jpg";
        temporizador();
        //temporizador.conteoSegundos();
    });
    d20.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        drama10.classList.remove("mostrar");
        drama10.classList.add("esconder");
        vida1.classList.remove("esconder");
        vida1.classList.add("mostrar");
        document.getElementById("imagen").src = "img/clases.webp";
        temporizador();
        //temporizador.conteoSegundos();
    });
    d21.addEventListener("click", function() {
        document.getElementById("temporizador").classList.remove("mostrar");
        document.getElementById("temporizador").classList.add("esconder");
        drama11.classList.remove("mostrar");
        drama11.classList.add("esconder");
        vida2.classList.remove("esconder");
        vida2.classList.add("mostrar");
        document.getElementById("imagen").src = "img/clases.webp";
        setTimeout('window.open("fin.html", "_blank")', 17000);
        setTimeout('window.close()', 17001);

        //temporizador.conteoSegundos();
    });
    d22.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        drama12.classList.remove("mostrar");
        drama12.classList.add("esconder");
        drama14.classList.remove("esconder");
        drama14.classList.add("mostrar");
        document.getElementById("imagen").src = "img/policia.jpg";
        temporizador();
        //temporizador.conteoSegundos();
    });
    d23.addEventListener("click", function() {
        document.getElementById("temporizador").classList.remove("mostrar");
        document.getElementById("temporizador").classList.add("esconder");
        drama12.classList.remove("mostrar");
        drama12.classList.add("esconder");
        drama15.classList.remove("esconder");
        drama15.classList.add("mostrar");
        document.getElementById("imagen").src = "img/ladron.jpg";
        setTimeout('window.open("fin.html", "_blank")', 17000);
        setTimeout('window.close()', 17001);

        //temporizador.conteoSegundos();
    });
    d24.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        drama13.classList.remove("mostrar");
        drama13.classList.add("esconder");
        vida2.classList.remove("esconder");
        vida2.classList.add("mostrar");
        document.getElementById("imagen").src = "img/clases.webp";
        temporizador();
        //temporizador.conteoSegundos();
    });
    d25.addEventListener("click", function() {
        document.getElementById("temporizador").classList.remove("mostrar");
        document.getElementById("temporizador").classList.add("esconder");
        vida1.classList.remove("mostrar");
        vida1.classList.add("esconder");
        vida2.classList.remove("esconder");
        vida2.classList.add("mostrar");
        document.getElementById("imagen").src = "img/clases.webp";
        setTimeout('window.open("fin.html", "_blank")', 17000);
        setTimeout('window.close()', 17001);

        //temporizador.conteoSegundos();
    });
    d26.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        vida1.classList.remove("mostrar");
        vida1.classList.add("esconder");
        drama16.classList.remove("esconder");
        drama16.classList.add("mostrar");
        document.getElementById("imagen").src = "img/robo.webp";
        temporizador();
        //temporizador.conteoSegundos();
    });
    d27.addEventListener("click", function() {
        contador = 120;
        clearInterval(tiempo);
        drama14.classList.remove("mostrar");
        drama14.classList.add("esconder");
        drama13.classList.remove("esconder");
        drama13.classList.add("mostrar");
        document.getElementById("imagen").src = "img/agente.jpg";
        temporizador();
        //temporizador.conteoSegundos();
    });
    d28.addEventListener("click", function() {
        document.getElementById("temporizador").classList.remove("mostrar");
        document.getElementById("temporizador").classList.add("esconder");
        drama16.classList.remove("mostrar");
        drama16.classList.add("esconder");
        drama15.classList.remove("esconder");
        drama15.classList.add("mostrar");
        document.getElementById("imagen").src = "img/ladron.jpg";
        setTimeout('window.open("fin.html", "_blank")', 17000);
        setTimeout('window.close()', 17001);

        //temporizador.conteoSegundos();
    });
}