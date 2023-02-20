      let listDiv = "";
      let listUl = "";
      let lis = "";
      let toggleList = "";
      let descriptionInput = "";
      let descriptionP = "";
      let descriptionButton = "";
      let addItemInput = "";
      let addItemButton = "";


      window.addEventListener("load", iniciar);

      function iniciar() {
          listDiv = document.querySelector('.list');
          listUl = listDiv.querySelector('ul');
          lis = listUl.children;
          toggleList = document.getElementById('toggleList');
          descriptionInput = document.querySelector('input.description');
          descriptionP = document.querySelector('p.description');
          descriptionButton = document.querySelector('button.description');
          addItemInput = document.querySelector('input.addItemInput');
          addItemButton = document.querySelector('button.addItemButton');

          for (let i = 0; i < lis.length; i += 1) {
              attachListItemButtons(lis[i]);
          }
          listUl.addEventListener('click', crearbotones);
          toggleList.addEventListener('click', MostrarOcultarLista);
          descriptionButton.addEventListener('click', CambiarTextoLista);
          addItemButton.addEventListener('click', AñadirElemento);
      }

      function attachListItemButtons(li) {
          let subir = document.createElement('button');
          subir.className = 'subir';
          subir.textContent = 'subir';
          li.appendChild(subir);

          let bajar = document.createElement('button');
          bajar.className = 'bajar';
          bajar.textContent = 'bajar';
          li.appendChild(bajar);

          let borrar = document.createElement('button');
          borrar.className = 'borrar';
          borrar.textContent = 'borrar';
          li.appendChild(borrar);
      }

      function crearbotones(event) {
          let targetBoton = event.target;
          let padre = targetBoton.parentElement;
          if (targetBoton.matches(".subir")) {
              padre.after(padre.previousElementSibling);
          } else if (targetBoton.matches(".bajar")) {
              padre.before(padre.nextElementSibling);
          } else if (targetBoton.matches(".borrar")) {
              listUl.removeChild(padre);
          }


          // Realiza las acciones de los botones subir, borrar y bajar para los elementos de la lista
      }

      function MostrarOcultarLista() {
          if (toggleList.innerText == "Ocultar lista" || toggleList.style.visibility == "visible") {
              toggleList.innerText = "Mostrar Lista";
              listDiv.style.visibility = "hidden";
          } else {
              toggleList.innerText = "Ocultar Lista";
              listDiv.style.visibility = "visible";
          }
          // Muestra u oculta la información de las cosas que son violeta (listDiv)
      }

      function CambiarTextoLista() {
          descriptionP.innerText = descriptionInput.value;

          //Modifica  el texto de la lista (descriptionP) con el valor del input (descriptionInput).
          // Inicialmente COSAS QUE SON VIOLETA
      }

      function AñadirElemento() {
          let newitem = document.createTextNode(addItemInput.value);
          let newLista = document.createElement('li');
          newLista.appendChild(newitem);
          attachListItemButtons(newLista)
          listUl.appendChild(newLista);
          //Añade un nuevo elemento a la lista con el valor del input (addItemInput). 
          //Recuerda que el elemento tendrá que tener sus botones de subir, bajar y borrar.
      }