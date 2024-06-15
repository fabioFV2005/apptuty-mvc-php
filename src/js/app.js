let paso = 1;
const pasoInicial = 1;
const pasoFinal = 3;

const cita = {
    id: '',
    nombre: '',
    fecha: '',
    hora: '',
    servicios: []
}

document.addEventListener('DOMContentLoaded', function() {
    iniciarApp();
});

function iniciarApp() {
    mostrarSeccion(); // Muestra y oculta las secciones
    tabs(); // Cambia la sección cuando se presionen los tabs
    botonesPaginador(); // Agrega o quita los botones del paginador
    paginaSiguiente(); 
    paginaAnterior();

    consultarAPI(); // Consulta la API en el backend de PHP
  
    idCliente();
    nombreCliente(); // Añade el nombre del cliente al objeto de cita
    seleccionarFecha(); // Añade la fecha de la cita en el objeto
    seleccionarHora(); // Añade la hora de la cita en el objeto

    mostrarResumen(); // Muestra el resumen de la cita
}

function mostrarSeccion() {

    // Ocultar la sección que tenga la clase de mostrar
    const seccionAnterior = document.querySelector('.mostrar');
    if(seccionAnterior) {
        seccionAnterior.classList.remove('mostrar');
    }

    // Seleccionar la sección con el paso...
    const pasoSelector = `#paso-${paso}`;
    const seccion = document.querySelector(pasoSelector);
    seccion.classList.add('mostrar');

    // Quita la clase de actual al tab anterior
    const tabAnterior = document.querySelector('.actual');
    if(tabAnterior) {
        tabAnterior.classList.remove('actual');
    }

    // Resalta el tab actual
    const tab = document.querySelector(`[data-paso="${paso}"]`);
    tab.classList.add('actual');
}

function tabs() {

    // Agrega y cambia la variable de paso según el tab seleccionado
    const botones = document.querySelectorAll('.tabs button');
    botones.forEach( boton => {
        boton.addEventListener('click', function(e) {
            e.preventDefault();

            paso = parseInt( e.target.dataset.paso );
            mostrarSeccion();

            botonesPaginador(); 
        });
    });
}

function botonesPaginador() {
    const paginaAnterior = document.querySelector('#anterior');
    const paginaSiguiente = document.querySelector('#siguiente');

    if(paso === 1) {
        paginaAnterior.classList.add('ocultar');
        paginaSiguiente.classList.remove('ocultar');
    } else if (paso === 3) {
        paginaAnterior.classList.remove('ocultar');
        paginaSiguiente.classList.add('ocultar');

        mostrarResumen();
    } else {
        paginaAnterior.classList.remove('ocultar');
        paginaSiguiente.classList.remove('ocultar');
    }

    mostrarSeccion();
}

function paginaAnterior() {
    const paginaAnterior = document.querySelector('#anterior');
    paginaAnterior.addEventListener('click', function() {

        if(paso <= pasoInicial) return;
        paso--;
        
        botonesPaginador();
    })
}
function paginaSiguiente() {
    const paginaSiguiente = document.querySelector('#siguiente');
    paginaSiguiente.addEventListener('click', function() {

        if(paso >= pasoFinal) return;
        paso++;
        
        botonesPaginador();
    })
}

async function consultarAPI() {

    try {
        const url = '/api/servicios';
        const resultado = await fetch(url);
        const servicios = await resultado.json();
        mostrarServicios(servicios);
    
    } catch (error) {
        console.log(error);
    }
}

function mostrarServicios(servicios) {
    servicios.forEach( servicio => {
        const { id, nombre, precio, imagenProducto} = servicio;

        const nombreServicio = document.createElement('P');
        nombreServicio.classList.add('nombre-servicio');
        nombreServicio.textContent = nombre;

        const precioServicio = document.createElement('P');
        precioServicio.classList.add('precio-servicio');
        precioServicio.textContent = `${precio} Bs`;



        const imagenServicio = document.createElement('IMG');
        imagenServicio.classList.add('imagen-servicio');
        imagenServicio.src = `/img/ImagenProductos/${imagenProducto}.png`;

        imagenServicio.width = 200; // Ancho en píxeles
imagenServicio.height = 200; // Alto en píxeles

        const servicioDiv = document.createElement('DIV');
        servicioDiv.classList.add('servicio');
        servicioDiv.dataset.idServicio = id;

        const contadorServicio = document.createElement('span');
        contadorServicio.classList.add('contador-servicio');
        contadorServicio.textContent = '0'; // Inicializamos el contador en 0

        const botonDisminuir = document.createElement('BUTTON');
        botonDisminuir.textContent = '-';
        botonDisminuir.classList.add('boton-disminuir'); // Agregar la clase CSS

        botonDisminuir.onclick = function() {
            deseleccionar(servicio);
            decrementarContador(contadorServicio); // Decrementamos el contador
           
        };
        const botonAumentar = document.createElement('BUTTON');
        botonAumentar.textContent = '+';
        botonAumentar.classList.add('boton-aumentar');
        botonAumentar.onclick = function() {
            seleccionarServicio(servicio);
            incrementarContador(contadorServicio); // Incrementamos el contador
        };
       




        servicioDiv.appendChild(nombreServicio);
        servicioDiv.appendChild( imagenServicio);
        servicioDiv.appendChild(precioServicio);
        servicioDiv.appendChild(botonDisminuir);
        servicioDiv.appendChild(contadorServicio);
        servicioDiv.appendChild(botonAumentar);
        document.querySelector('#servicios').appendChild(servicioDiv);

    });
}

function deseleccionar(servicio) {
    const { id } = servicio;
    const { servicios } = cita;

    // Encuentra el índice de la primera instancia del servicio con el ID dado
    const indiceAEliminar = servicios.findIndex(s => s.id === id);

    // Si se encuentra el servicio, elimínalo
    if (indiceAEliminar !== -1) {
        servicios.splice(indiceAEliminar, 1);
        console.log(`Se eliminó una instancia del servicio con ID ${id}.`);
    } else {
        console.log(`No se encontró ningún servicio con el ID ${id}.`);
    }
}

function incrementarContador(elemento, id) {
    let contador = parseInt(elemento.textContent);
    contador++;
    elemento.textContent = contador.toString();

    // Si el contador es mayor que 0, agregar la clase 'seleccionado' al div del servicio
    
}

function decrementarContador(elemento, servicio) {
    let contador = parseInt(elemento.textContent);
    contador--;
    if (contador < 0) contador = 0; // No permitir valores negativos

 
    elemento.textContent = contador.toString();
    if (contador < 1) {
        const divServicio = document.querySelector(`[data-id-servicio="${id}"]`);
        divServicio.classList.remove('seleccionado');
    }
   
    // Si el contador llega a 0, remover la clase 'seleccionado' del div del servicio
   
}
function seleccionarServicio(servicio) {
    const { id } = servicio;
    const { servicios } = cita;

    // Identificar el elemento al que se le da click
    const divServicio = document.querySelector(`[data-id-servicio="${id}"]`);

    // Comprobar si un servicio ya fue agregado 
  
        // Agregarlo
        
        cita.servicios = [...servicios, servicio];
        divServicio.classList.add('seleccionado');
    
     console.log(cita);
}


function idCliente() {
    cita.id = document.querySelector('#id').value;
}
function nombreCliente() {
    cita.nombre = document.querySelector('#nombre').value;
}

function seleccionarFecha() {
    const inputFecha = document.querySelector('#fecha');
    inputFecha.addEventListener('input', function(e) {

        const dia = new Date(e.target.value).getUTCDay();

        if( [2].includes(dia) ) {
            e.target.value = '';
            mostrarAlerta('LOS MARTES NO ATENDEMOS', 'error', '.formulario');
        } else {
            cita.fecha = e.target.value;
        }
        
    });
}

function seleccionarHora() {
    const inputHora = document.querySelector('#hora');
    inputHora.addEventListener('input', function(e) {


        const horaCita = e.target.value;
        const hora = horaCita.split(":")[0];
        if(hora < 12 || hora > 22) {
            e.target.value = '';
            mostrarAlerta('Hora No Válida', 'error', '.formulario');
        } else {
            cita.hora = e.target.value;

            // console.log(cita);
        }
    })
}

function mostrarAlerta(mensaje, tipo, elemento, desaparece = true) {

    // Previene que se generen más de 1 alerta
    const alertaPrevia = document.querySelector('.alerta');
    if(alertaPrevia) {
        alertaPrevia.remove();
    }

    // Scripting para crear la alerta
    const alerta = document.createElement('DIV');
    alerta.textContent = mensaje;
    alerta.classList.add('alerta');
    alerta.classList.add(tipo);

    const referencia = document.querySelector(elemento);
    referencia.appendChild(alerta);

    if(desaparece) {
        // Eliminar la alerta
        setTimeout(() => {
            alerta.remove();
        }, 3000);
    }
  
}


function mostrarResumen() {
    const resumen = document.querySelector('.contenido-resumen');

    // Limpiar el Contenido de Resumen
    while(resumen.firstChild) {
        resumen.removeChild(resumen.firstChild);
    }

    if(Object.values(cita).includes('') || cita.servicios.length === 0 ) {
        mostrarAlerta('Faltan datos de Servicios, Fecha u Hora', 'error', '.contenido-resumen', false);

        return;
    } 

    // Formatear el div de resumen
    const { nombre, fecha, hora, servicios } = cita;



    // Heading para Servicios en Resumen
    const headingServicios = document.createElement('H3');
    headingServicios.textContent = 'Resumen de Productos solicitados';
    resumen.appendChild(headingServicios);

    // Iterando y mostrando los servicios
    servicios.forEach(servicio => {
        const { id, precio, nombre } = servicio;
        const contenedorServicio = document.createElement('DIV');
        contenedorServicio.classList.add('contenedor-servicio');

        const textoServicio = document.createElement('P');
        textoServicio.textContent = nombre;

        const precioServicio = document.createElement('P');
        precioServicio.innerHTML = `<span>Precio:</span> $${precio}`;

        contenedorServicio.appendChild(textoServicio);
        contenedorServicio.appendChild(precioServicio);

        resumen.appendChild(contenedorServicio);
    });

    // Heading para Cita en Resumen
    const headingCita = document.createElement('H3');
    headingCita.textContent = 'Resumen de reserva/pedido';
    resumen.appendChild(headingCita);

    const nombreCliente = document.createElement('P');
    nombreCliente.innerHTML = `<span>Nombre:</span> ${nombre}`;

    // Formatear la fecha en español
    const fechaObj = new Date(fecha);
    const mes = fechaObj.getMonth();
    const dia = fechaObj.getDate() + 2;
    const year = fechaObj.getFullYear();

    const fechaUTC = new Date( Date.UTC(year, mes, dia));
    
    const opciones = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'}
    const fechaFormateada = fechaUTC.toLocaleDateString('es-MX', opciones);

    const fechaCita = document.createElement('P');
    fechaCita.innerHTML = `<span>Fecha:</span> ${fechaFormateada}`;

    const horaCita = document.createElement('P');
    horaCita.innerHTML = `<span>Hora:</span> ${hora} Horas`;

    // Boton para Crear una cita
    const botonReservar = document.createElement('BUTTON');
    botonReservar.classList.add('boton-pedido');
    botonReservar.textContent = 'Hacer pedido';
    botonReservar.onclick = reservarCita;

    resumen.appendChild(nombreCliente);
    resumen.appendChild(fechaCita);
    resumen.appendChild(horaCita);

    resumen.appendChild(botonReservar);
}
async function reservarCita() {
    const {nombre, fecha, hora, servicios, id} = cita;
    const idServicios = servicios.map( servicio => servicio.id);
  //  console.log(idServicios);
  const datos = new FormData();

  datos.append('fecha' , fecha);
  datos.append('hora', hora);
  datos.append('usuarioId', id );
  datos.append('servicios', idServicios);
//console.log([...datos]);
try {
    //peticion hacia la api
  const url = '/api/citas';
  const respuesta = await fetch(url,
    {
        method: 'POST',
        body: datos
    }
  );
    const resultado = await respuesta.json();
    console.log(resultado.resultado);
    if(resultado.resultado){
        Swal.fire({
            title: "Pedido registrado",
            text: "Tu pedido fue registrado con exito",
            icon: "success"
          }).then(() =>{
            setTimeout(() => {
                window.location.reload();
            }, 3000);
         
          } );
    }
  
} catch (error) {
    Swal.fire({
        icon: "error",
        title: "Error...",
        text: "HUBO UN ERROR AL REGISTRAR LOS DATOS",
      });
}



//console.log([...datos]);

  
  }