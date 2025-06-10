/* JS para abrir/cerrar modales */
function abrirModal(tipo) {
  document.getElementById('modal-' + tipo).style.display = 'flex';
}

function cerrarModal(tipo) {
  document.getElementById('modal-' + tipo).style.display = 'none';
}

window.onclick = function(event) {
  if (event.target.id === 'modal-registro') cerrarModal('registro');
  if (event.target.id === 'modal-inicio') cerrarModal('inicio');
}

// Cambiar de un modal a otro
function cambiarModal(actual, siguiente) {
  cerrarModal(actual);
  abrirModal(siguiente);
}
