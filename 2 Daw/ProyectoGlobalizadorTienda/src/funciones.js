if(localStorage.getItem("carritoinicial")==null) {
    carritoinicial="";
    localStorage.setItem("carritoinicial", carritoinicial);
}else {
    carritoinicial=localStorage.getItem("carritoinicial");
}
const audio = new Audio("./src/sounds/noti.wav");
function tiposProductos(obj) {
    tipos = "";
    arrayTipos = tipos.split(",");
    for (i = 0; i < obj.length; i++) {
        arrayTipos[i] = obj.nombre;
    }
    console.log(arrayTipos);
    return arrayTipos;
}

function imprimirProducto(obj) {
    for (i = 0; i < obj.length; i++) {
        divProducto.innerHTML += "<div class = 'card card - cover overflow - hidden text - bg - dark rounded - 4 shadow - lg' style = 'width:30%;'><div class = 'd-flex flex-column p-5 pb-3 text-white text-shadow-1'><img src='./src/imagenes/" + obj[i]['foto'] +"'/><p> " + obj[i]['nombre'] + " </p> </div> </div><div class = 'h-60 shadow-lg p-4 ' style = 'width: 70%; ' ><p>" + obj[i]['nombre'] + "</p><p> Descripcion del producto </p> <p> " + obj[i]['descripcion'] + "</p> <p class = 'text-end' >Precio: " + obj[i]['precio'] + "</p><input type = 'button' name = 'compra' class = 'añadirCarrito' value ='Añadir al carrito' ><input type = 'button' name = 'descripcion' class = 'verDescripcion' value ='Ver descripcion del producto' ></div></div>";
    }
}
function imprimirTiposProductos(obj) {
    for(i=0; i<obj.length; i++) {
        divTarjeta.innerHTML += "<div class='card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg' style='background-image: url('./src/imagenes/"+obj[i]['foto']+");'><div class='d-flex flex-column h-110 p-3 pb-1 text-white text-shadow-1 text-center'><h3 class='pt-5 mt-5 mb-4 display-6 lh-1 fw-bold'>Placas Bases</h3></div></div>";
    }
}
function ofertaflash(obj) {
    flash = parseInt(Math.random()*obj.length);
    ofertaFlash.innerHTML += "<div class='card card-cover overflow-hidden text-bg-dark rounded-4 shadow-lg p-10'><div class='d-flex flex-column  p-3 pb-1 text-shadow-1 text-center'><h3 class=' display-6 lh-1 fw-bold'>"+obj[flash]['nombre']+"</h3></div></div>";
    ofertaFlash.innerHTML += "<img class='d-flex justify-self-center' src='./src/imagenes/"+obj[flash]['foto']+"' style='width:80%; height:60%;'/>";
}
function descuentos(obj) {
    for(i=0;i<3;i++) {
        descuent = parseInt(Math.random()*obj.length);
        ofertadesc[i].innerHTML += "<div class='card card-cover overflow-hidden rounded-4 shadow-lg p-10'><div class='d-flex flex-column  p-3 pb-1 text-shadow-1 text-center'><h3 class=' display-6 lh-1 fw-bold bg-dark text-white rounded'>"+obj[descuent]['nombre']+"</h3></div></div>";
        descuporcen= parseInt(Math.random()*50);
        ofertadesc[i].innerHTML += "<div class='d-flex justify-content-center align-center w-100' ><p sytle='font-size: 10em;'>"+descuporcen+" % de Descuento!</p><p>APROVECHA AHORA</p></div>";
    }
}
function descriProducto(obj) {
    for(i=0; i<obj.length;i++) {
        console.log("producto");
        if(obj[i]['nombre'].toLowerCase()== localStorage.getItem("verProducto").toLowerCase()){
            divProducto.innerHTML += "<div class = 'card card - cover   d-flex   justify-content-center overflow - hidden text - bg - dark rounded - 4 shadow - lg' style = 'width:30%;'><div class = 'd-flex flex-column p-5 pb-3 text-white text-shadow-1'><img src='./src/imagenes/" + obj[i]['foto'] +"'/><p> " + obj[i]['nombre'] + " </p> </div> </div><div class = 'h-60 shadow-lg p-4 ' style = 'width: 70%; ' ><p>" + obj[i]['nombre'] + "</p><p> Descripcion del producto </p> <p> " + obj[i]['descripcion'] + "</p> <p class = 'text-end' >Precio: " + obj[i]['precio'] + "</p><input type = 'button' name = 'compra' id = 'añadirCarro' value ='Añadir al carrito'></div></div>";
        }
    }
}
function botonVerDescripcion() {
    producto = this.parentNode.children[0].innerHTML;
    console.log(producto);
    localStorage.setItem("verProducto", producto);
    console.log(localStorage.getItem("verProducto"));
    window.open("./componente.html", "_self");
}
function añadiendoCarrito() {
    producto = this.parentNode.children[0].innerHTML;
    carritoinicial= carritoinicial +"," + producto;
    localStorage.setItem("carritoinicial", carritoinicial);
    console.log(localStorage.getItem("carritoinicial"));
    numproductos++;
    document.getElementById("numProductos").innerHTML = numproductos;
}
function cargarCesta(obj) {
    //carritoinicial = JSON.parse(localStorage.getItem("carritoinicial"));
    
    if(localStorage.getItem("carritoinicial")==null || localStorage.getItem("carritoinicial")=="") {
        divProducto.innerHTML += "No tiene ningun producto en su cesta";
    } else {
        //localStorage.getItem("carritoinicial");
        arrayProductos = localStorage.getItem("carritoinicial").split(",");
        for (i=0; i<obj.length ;i++) {
            console.log("entra en el for");
            for(j=0; j< arrayProductos.length;j++) {
            if(obj[i].nombre==arrayProductos[j]) {
                console.log("entra en el if");
                divProducto.innerHTML += "<div class='d-flex'><div class = 'card card - cover overflow - hidden text - bg - dark rounded - 4 shadow - lg' style = 'width:25%;'><div class = 'd-flex flex-column p-5 pb-3 text-white text-shadow-1'><img src='./src/imagenes/" + obj[i]['foto'] +"'/><p> " + obj[i]['nombre'] + " </p> </div> </div><div class = 'h-60 shadow-lg p-4 ' style = 'width: 70%; ' ><p>" + obj[i]['nombre'] + "</p><p> Descripcion del producto </p> <p> " + obj[i]['descripcion'] + "</p> <p class = 'text-end' >Precio: " + obj[i]['precio'] + "$</p></div></div></div>";
                precioTotal= precioTotal+ parseFloat(obj[i].precio);
            }
        }
        }
    }
}
function limpiaCarrito() {
    alimpiar=localStorage.getItem("carritoinicial");
    limpio=[];
    localStorage.setItem("carritoinicial", limpio);
    alert("Cesta Vaciada"); 
    window.open("carrito.html", "_self");
}
function pagar() {
    alert("Esta funcion no esta desarrollada");
}
function login() {
    localStorage.setItem("user", "admin");
    localStorage.setItem("pass", "1234");
    Notification.requestPermission()
        .then(resultado => {
            if(resultado=="granted") {
                usuarios=localStorage.getItem("user").split(",");
                passwords=localStorage.getItem("pass").split(";");
                for(i=0;i<=usuarios.length; i++){
                    if(usuarios[i]== document.getElementById("mailAcceso").value) {
                        if (passwords[i]!= document.getElementById("passAcceso").value) {
                            alert("Contraseña no valida");
                        } else {
                            localStorage.setItem("logged", "true");
                            notificacionLogged = new Notification("Logeado Correctamente");
                            localStorage.setItem("noti", "true");
                            window.open("index.html", "_self");
                        }
                    }
                }
                if (localStorage.getItem("logged")!= "true") {
                    alert("Ese usuario no existe");
                    localStorage.setItem("logged", "false");
                }   
            }
});
}
function itsLogged() {
    if (localStorage.getItem("logged") == "false") {
        document.getElementById("log").innerHTML += "Login/Registro";
    } else {
        document.getElementById("log").innerHTML += "Cuenta";
    }
}
function register() {
    newUser = document.getElementById("mailRegistro").innerHTML;
    newPass = document.getElementById("passResgitro").innerHTML;
    usuarios = localStorage.getItem("user");
    passwords = localStorage.getItem("pass");
    usuarios = usuarios + ", " +newUser;
    passwords = passwords +","+newPass;
    localStorage.setItem("user", usuarios);
    localStorage.setItem("pass", passwords);
    localStorage.setItem("logged", "true");
    window.open("index.html", "_self");
    
}
function imprimirDescriUser() {
    document.getElementById("infoUser").innerHTML += "<p class='my-4 border-bottom'><u>Usuario:</u> "+localStorage.getItem("user")+"</p><p><u>Informacion del usuario:</u></p><p class='my-5 px-5 border-bottom'>Informacion del usuario algo detallada, aqui iria la informacion del usuario que de en su descripcion</p></p><button id='botonUser' class='rounded'>Cerrar Sesion</button>";
    
}
function cerrarSession() {
    localStorage.setItem("logged", "false");
    localStorage.setItem("noti", "false");
    window.open("index.html","_self");
}
function clickTarjeta() {
    localStorage.setItem("filtro", "false");
    let tarjeta=this.children[0].innerHTML;
    localStorage.setItem("tipoComponente", tarjeta);
    localStorage.setItem("filtro", "true");
    window.open("./componentes.html", "_self");
}
function imprimirTarjeta(obj) {
    for (i=0; i<obj.length;i++){
        if (obj[i].tipo.toLowerCase() == localStorage.getItem("tipoComponente").toLowerCase()) {
            console.log("entra al if");
            divProducto.innerHTML += "<div class = 'card card - cover   d-flex   justify-content-center overflow - hidden text - bg - dark rounded - 4 shadow - lg' style = 'width:30%;'><div class = 'd-flex flex-column p-5 pb-3 text-white text-shadow-1'><img src='./src/imagenes/" + obj[i]['foto'] +"'/><p> " + obj[i]['nombre'] + " </p> </div> </div><div class = 'h-60 shadow-lg p-4 ' style = 'width: 70%; ' ><p>" + obj[i]['nombre'] + "</p><p> Descripcion del producto </p> <p> " + obj[i]['descripcion'] + "</p> <p class = 'text-end' >Precio: " + obj[i]['precio'] + "</p><input type = 'button' name = 'compra' id = 'añadirCarro' value ='Añadir al carrito'><input type = 'button' name = 'descripcion' class = 'verDescripcion' value ='Ver descripcion del producto' ></div></div>";
        }
    }
}
function busquedaSpeech() {
    const SpeechRecognition = webkitSpeechRecognition;
        const recognition = new SpeechRecognition();
        recognition.start();
        recognition.onstart = function() {
            //animacion abrir cuadro
            notification = new Notification("Hable ahora, estoy escuchando");
        }
        recognition.onspeechend = function() {
            recognition.stop();
            notification.close();
        }
        recognition.onresult = function(e) {
            console.log(e.results);
            let transcript = e.results[0][0].transcript;
            document.getElementById("cuadroBusqueda").innerHTML=transcript;
        }
}
function busquedaTexto() {
    localStorage.setItem("filtro", "false");
    let filtro = this.parentNode.children[0].innerHTML;
    console.log(filtro);
    localStorage.setItem("tipoComponente", filtro);
    localStorage.setItem("filtro", "true");
    window.open("./componentes.html", "_self");
}