/*!
 * INFOTEC - Panel de Administración
 * Basado en la plantilla SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
 * Copyright 2013-2023 Start Bootstrap
 * Licencia MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 */

// ======================================
// Scripts principales del panel INFOTEC
// ======================================

// Este evento se ejecuta cuando el contenido del DOM ha sido completamente cargado
window.addEventListener('DOMContentLoaded', event => {

    // Obtiene el botón para alternar el menú lateral (sidebar)
    const sidebarToggle = document.body.querySelector('#sidebarToggle');

    // Verifica si el botón existe en el documento
    if (sidebarToggle) {

        // Puedes descomentar la siguiente sección si deseas mantener
        // el estado del menú lateral (abierto o cerrado) al recargar la página
        /*
        if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
            document.body.classList.toggle('sb-sidenav-toggled');
        }
        */

        // Evento que se ejecuta al hacer clic en el botón del menú lateral
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault(); // Evita la acción predeterminada del botón

            // Alterna (muestra u oculta) la clase que controla la visibilidad del menú lateral
            document.body.classList.toggle('sb-sidenav-toggled');

            // Guarda en el almacenamiento local el estado actual del menú lateral
            localStorage.setItem(
                'sb|sidebar-toggle',
                document.body.classList.contains('sb-sidenav-toggled')
            );
        });
    }

});
