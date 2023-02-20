function validarForm() {
  
    // El campo nombre no puede estar vacío o estar compuesto solo por espacios en blanco
    var nombre = document.getElementById("nombre").value;
    if ( /^\s+$/.test(nombre) ) {
        alert("El campo nombre no puede estar vacío");
        return false;
    }
    // El campo dirección no puede estar vacío o estar compuesto solo por espacios en blanco
    var direcc = document.getElementById("direccion").value;
    if ( direcc === "" || /^\s+$/.test(direcc) ) {
        alert("El campo dirección no puede estar vacío");
      //  document.getElementById("errdir").innerHTML = "El campo dirección no puede estar vacío";
        return false;
    }
    // El campo descripción no puede estar vacío o estar compuesto solo por espacios en blanco
    var desc = document.getElementById("descripcion").value;
    if ( desc === "" || /^\s+$/.test(desc) ) {
        alert("El campo descripción no puede estar vacío");
        return false;
    }
    // El campo teléfono no puede estar vacío o estar compuesto solo por espacios en blanco
    var telf = document.getElementById("telf").value;
    if ( telf === "" || /^\s+$/.test(telf) ) {
        alert("El campo teléfono no puede estar vacío");
        return false;
    }
    expr = /^([0-9])+$/;
    if ( !expr.test(telf) ) {
        alert("El campo teléfono debe ser numérico");
        return false;
    }
    
    // El campo tipo no puede estar vacío o estar compuesto solo por espacios en blanco
    var tipo = document.getElementById("tipo").value;
    if ( tipo === "" || /^\s+$/.test(tipo) ) {
        alert("El campo tipo no puede estar vacío");
        return false;
    }
    if ( tipo !== "N" && tipo !== "P" ) {
        alert("El campo tipo solamente puede ser 'N' o 'P'");
        return false;
    }
   
    return true;
}            


