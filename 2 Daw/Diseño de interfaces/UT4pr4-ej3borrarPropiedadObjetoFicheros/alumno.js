  let alumno = [{
          nombre: "David Perez",
          grupo: "DAW2",
          fct: "no"
      },
      {
          nombre: "Ana Garcia",
          grupo: "DAW2",
          fct: "si"
      },
      {
          nombre: "Gema Perez",
          grupo: "ASIR2",
          fct: "no"
      }
  ]

  body = document.querySelector("body");
  titulo = document.createElement("h3");
  titulo.textContent = "Vamos a comprobar como se borra la propiedad fct del alumno";
  body.appendChild(titulo);
  divalumno = document.createElement("div");
  alumno.forEach((alumn) => {
      for (i in alumn) {
          parrafo = document.createElement("p");
          parrafo.textContent = alumn[i];
          body.appendChild(parrafo);
      };
  });

  titulo2 = document.createElement("h3");
  titulo2.textContent = "Borrando la propiedad fct para el primer alumno";
  body.appendChild(titulo2);
  divalumno = document.createElement("div");
  alumno.forEach((alumn) => {
      for (i in alumn) {
          if (alumn.nombre == "David Perez") {
              delete alumn.fct;
          }
          parrafo = document.createElement("p");
          parrafo.textContent = alumn[i];
          body.appendChild(parrafo);
      };
  });