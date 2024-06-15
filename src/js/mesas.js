document.addEventListener('DOMContentLoaded', function() {
    iniciarApp();
});

async function iniciarApp() {
    await consultarAPI();
    // Ahora las mesas están cargadas, podemos añadir el event listener a cada mesa
    const mesasDivs = document.querySelectorAll('.mesa');
    mesasDivs.forEach(mesaDiv => {
        mesaDiv.addEventListener('click', () => {
            const idMesa = mesaDiv.dataset.idMesa;
            seleccionarMesa(idMesa, mesaDiv);
        });
    });
}

async function consultarAPI() {
    try {
        const url = '/api/mesas';
        const resultado = await fetch(url);
        const mesas = await resultado.json();
        mostrarMesas(mesas);
    } catch (error) {
        console.log(error);
    }
}

function mostrarMesas(mesas) {
    const contenedorMesas = document.querySelector('#mesas');
    contenedorMesas.innerHTML = ''; // Limpiar el contenedor antes de agregar las mesas

    mesas.forEach(mesa => {
        const { id, activa } = mesa;

        const mesaDiv = document.createElement('DIV');
        mesaDiv.classList.add('mesa');
        mesaDiv.dataset.idMesa = id; // Asignar el id de la mesa como atributo data
        mesaDiv.textContent = `Mesa ${id}: ${activa == 1 ? 'Llena' : 'Vacía'}`;

        contenedorMesas.appendChild(mesaDiv);
    });
}

function seleccionarMesa(idMesa, divMesa) {
    // Toggle de clase para cambiar el color de fondo
    divMesa.classList.toggle('seleccionada');
}
