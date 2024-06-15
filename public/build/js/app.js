let paso=1;const pasoInicial=1,pasoFinal=3,cita={id:"",nombre:"",fecha:"",hora:"",servicios:[]};function iniciarApp(){mostrarSeccion(),tabs(),botonesPaginador(),paginaSiguiente(),paginaAnterior(),consultarAPI(),idCliente(),nombreCliente(),seleccionarFecha(),seleccionarHora(),mostrarResumen()}function mostrarSeccion(){const e=document.querySelector(".mostrar");e&&e.classList.remove("mostrar");const t=`#paso-${paso}`;document.querySelector(t).classList.add("mostrar");const o=document.querySelector(".actual");o&&o.classList.remove("actual");document.querySelector(`[data-paso="${paso}"]`).classList.add("actual")}function tabs(){document.querySelectorAll(".tabs button").forEach((e=>{e.addEventListener("click",(function(e){e.preventDefault(),paso=parseInt(e.target.dataset.paso),mostrarSeccion(),botonesPaginador()}))}))}function botonesPaginador(){const e=document.querySelector("#anterior"),t=document.querySelector("#siguiente");1===paso?(e.classList.add("ocultar"),t.classList.remove("ocultar")):3===paso?(e.classList.remove("ocultar"),t.classList.add("ocultar"),mostrarResumen()):(e.classList.remove("ocultar"),t.classList.remove("ocultar")),mostrarSeccion()}function paginaAnterior(){document.querySelector("#anterior").addEventListener("click",(function(){paso<=pasoInicial||(paso--,botonesPaginador())}))}function paginaSiguiente(){document.querySelector("#siguiente").addEventListener("click",(function(){paso>=pasoFinal||(paso++,botonesPaginador())}))}async function consultarAPI(){try{const e="/api/servicios",t=await fetch(e);mostrarServicios(await t.json())}catch(e){console.log(e)}}function mostrarServicios(e){e.forEach((e=>{const{id:t,nombre:o,precio:n,imagenProducto:a}=e,c=document.createElement("P");c.classList.add("nombre-servicio"),c.textContent=o;const i=document.createElement("P");i.classList.add("precio-servicio"),i.textContent=`${n} Bs`;const r=document.createElement("IMG");r.classList.add("imagen-servicio"),r.src=`/img/ImagenProductos/${a}.png`,r.width=200,r.height=200;const s=document.createElement("DIV");s.classList.add("servicio"),s.dataset.idServicio=t;const d=document.createElement("span");d.classList.add("contador-servicio"),d.textContent="0";const l=document.createElement("BUTTON");l.textContent="-",l.classList.add("boton-disminuir"),l.onclick=function(){deseleccionar(e),decrementarContador(d)};const u=document.createElement("BUTTON");u.textContent="+",u.classList.add("boton-aumentar"),u.onclick=function(){seleccionarServicio(e),incrementarContador(d)},s.appendChild(c),s.appendChild(r),s.appendChild(i),s.appendChild(l),s.appendChild(d),s.appendChild(u),document.querySelector("#servicios").appendChild(s)}))}function deseleccionar(e){const{id:t}=e,{servicios:o}=cita,n=o.findIndex((e=>e.id===t));-1!==n?(o.splice(n,1),console.log(`Se eliminó una instancia del servicio con ID ${t}.`)):console.log(`No se encontró ningún servicio con el ID ${t}.`)}function incrementarContador(e,t){let o=parseInt(e.textContent);o++,e.textContent=o.toString()}function decrementarContador(e,t){let o=parseInt(e.textContent);if(o--,o<0&&(o=0),e.textContent=o.toString(),o<1){document.querySelector(`[data-id-servicio="${id}"]`).classList.remove("seleccionado")}}function seleccionarServicio(e){const{id:t}=e,{servicios:o}=cita,n=document.querySelector(`[data-id-servicio="${t}"]`);cita.servicios=[...o,e],n.classList.add("seleccionado"),console.log(cita)}function idCliente(){cita.id=document.querySelector("#id").value}function nombreCliente(){cita.nombre=document.querySelector("#nombre").value}function seleccionarFecha(){document.querySelector("#fecha").addEventListener("input",(function(e){const t=new Date(e.target.value).getUTCDay();[2].includes(t)?(e.target.value="",mostrarAlerta("LOS MARTES NO ATENDEMOS","error",".formulario")):cita.fecha=e.target.value}))}function seleccionarHora(){document.querySelector("#hora").addEventListener("input",(function(e){const t=e.target.value.split(":")[0];t<12||t>22?(e.target.value="",mostrarAlerta("Hora No Válida","error",".formulario")):cita.hora=e.target.value}))}function mostrarAlerta(e,t,o,n=!0){const a=document.querySelector(".alerta");a&&a.remove();const c=document.createElement("DIV");c.textContent=e,c.classList.add("alerta"),c.classList.add(t);document.querySelector(o).appendChild(c),n&&setTimeout((()=>{c.remove()}),3e3)}function mostrarResumen(){const e=document.querySelector(".contenido-resumen");for(;e.firstChild;)e.removeChild(e.firstChild);if(Object.values(cita).includes("")||0===cita.servicios.length)return void mostrarAlerta("Faltan datos de Servicios, Fecha u Hora","error",".contenido-resumen",!1);const{nombre:t,fecha:o,hora:n,servicios:a}=cita,c=document.createElement("H3");c.textContent="Resumen de Productos solicitados",e.appendChild(c),a.forEach((t=>{const{id:o,precio:n,nombre:a}=t,c=document.createElement("DIV");c.classList.add("contenedor-servicio");const i=document.createElement("P");i.textContent=a;const r=document.createElement("P");r.innerHTML=`<span>Precio:</span> $${n}`,c.appendChild(i),c.appendChild(r),e.appendChild(c)}));const i=document.createElement("H3");i.textContent="Resumen de reserva/pedido",e.appendChild(i);const r=document.createElement("P");r.innerHTML=`<span>Nombre:</span> ${t}`;const s=new Date(o),d=s.getMonth(),l=s.getDate()+2,u=s.getFullYear(),m=new Date(Date.UTC(u,d,l)).toLocaleDateString("es-MX",{weekday:"long",year:"numeric",month:"long",day:"numeric"}),p=document.createElement("P");p.innerHTML=`<span>Fecha:</span> ${m}`;const v=document.createElement("P");v.innerHTML=`<span>Hora:</span> ${n} Horas`;const h=document.createElement("BUTTON");h.classList.add("boton-pedido"),h.textContent="Hacer pedido",h.onclick=reservarCita,e.appendChild(r),e.appendChild(p),e.appendChild(v),e.appendChild(h)}async function reservarCita(){const{nombre:e,fecha:t,hora:o,servicios:n,id:a}=cita,c=n.map((e=>e.id)),i=new FormData;i.append("fecha",t),i.append("hora",o),i.append("usuarioId",a),i.append("servicios",c);try{const e="/api/citas",t=await fetch(e,{method:"POST",body:i}),o=await t.json();console.log(o.resultado),o.resultado&&Swal.fire({title:"Pedido registrado",text:"Tu pedido fue registrado con exito",icon:"success"}).then((()=>{setTimeout((()=>{window.location.reload()}),3e3)}))}catch(e){Swal.fire({icon:"error",title:"Error...",text:"HUBO UN ERROR AL REGISTRAR LOS DATOS"})}}document.addEventListener("DOMContentLoaded",(function(){iniciarApp()}));