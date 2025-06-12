/* Funciones para abrir o cerrar modales específicos */

/**
 * Abre un modal determinado.
 * @param {string} tipo - Sufijo del ID del modal ('registro' o 'inicio').
 */
function abrirModal(tipo) {
  // Cambiamos el estilo para mostrar el modal
  document.getElementById('modal-' + tipo).style.display = 'flex';
}

/**
 * Cierra un modal determinado.
 * @param {string} tipo - Sufijo del ID del modal ('registro' o 'inicio').
 */
function cerrarModal(tipo) {
  // Ocultamos el modal cambiando su display
  document.getElementById('modal-' + tipo).style.display = 'none';
}

/**
 * Al hacer clic fuera del contenido del modal, lo cerramos.
 * Esto permite cerrar al hacer clic en el fondo.
 */
window.onclick = function(event) {
  if (event.target.id === 'modal-registro') cerrarModal('registro');
  if (event.target.id === 'modal-inicio')   cerrarModal('inicio');
};

/**
 * Cambia de un modal a otro (por ejemplo: de registro a inicio).
 * Este patrón evita duplicar lógica al cerrar y abrir.
 * @param {string} actual - Modal a cerrar.
 * @param {string} siguiente - Modal a abrir.
 */
function cambiarModal(actual, siguiente) {
  cerrarModal(actual);
  abrirModal(siguiente);
}
