class Novela {
    constructor(id, nombre, resumen, autor) {
        this.id = id;
        this.nombre = nombre;
        this.resumen = resumen;
        this.autor = autor;
    }

    mostrarInformacion() {
        document.write("ID: " + this.id + "<br>Nombre: " + this.nombre + "<br>Resumen: " + this.resumen + "<br>Autor: " + this.autor + "<br>");
    }
}
class Saga extends Novela {
    constructor(id, nombre, resumen, autor, volumen) {
        super(id, nombre, resumen, autor);
        this.volumen = volumen;
    }
    mostrarVolumen() {
        document.write(this.mostrarInformacion())
        document.write("Volumen: " + this.volumen);
    }

}

novela1 = new Novela("1", "Las maravillosas aventuras de kevin", "Kevin de fiesta", "Alejandro Peco");
saga1 = new Saga("2", "La insinuacion", "El levantamiento de cejas por parte de Kevin a cada persona que se cruza con el, y su demostracion de amor platonico a Pequito", "Cristina Pop", "La primera noche");
novela1.mostrarInformacion();
saga1.mostrarVolumen();