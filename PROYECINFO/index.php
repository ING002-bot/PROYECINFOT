<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Infotec - Soporte Técnico</title>
  <!-- Fuente Roboto desde Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <!-- Hoja de estilos personalizada -->
  <link rel="stylesheet" href="./CSS/estilos.css">
</head>
<body>
  <!-- Encabezado con logo y navegación principal -->
  <header>
    <img src="IMAGES/logo.png" alt="Infotec Logo">
    <nav>
      <a href="venta.php">Equipos</a>
      <a href="servicio.php">Soporte</a>
      <a href="nosotros.php">Contacto</a>
      <!-- Enlaces para abrir los modales de registro o inicio de sesión -->
      <a class="registro-sesion" href="#" onclick="abrirModal('registro')">Registrar</a>
      <a class="registro-sesion" href="#" onclick="abrirModal('inicio')">Iniciar Sesión</a>
    </nav>
  </header>

  <!-- Sección principal con llamada a la acción -->
  <section class="hero">
    <div class="hero-text">
      <h1>Soporte técnico</h1>
      <p>Pide tu demostración Sin Compromiso</p>
      <!-- Botón que abre un chat de WhatsApp -->
      <a class="whatsapp-button" href="https://wa.me/51923213425">📞 923 213 425</a>
    </div>
    <img src="./IMAGES/ind1.webp" alt="Laptop con software">
  </section>

  <!-- Sección informativa de soporte técnico -->
  <section class="support-section">
    <h2>Soporte Técnico</h2>
    <p>
      Especialistas en soporte técnico en todas las marcas de puntos de ventas de todo tipo de negocios. Brindamos atención personalizada y soluciones efectivas para que tu sistema funcione siempre al 100%.
    </p>
  </section>

  <!-- MODAL DE REGISTRO DE USUARIOS -->
  <div class="modal" id="modal-registro">
    <div class="modal-contenido">
      <span class="cerrar" onclick="cerrarModal('registro')">&times;</span>
      <h2>Crear Cuenta</h2>
      <form action="config/registro.php" method="POST">
        <!-- Campos del formulario de registro -->
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="apellido" placeholder="Apellido" required>
        <input type="email" name="correo" placeholder="Correo electrónico" required>
        <input type="text" name="telefono" placeholder="Teléfono" required>
        <input type="text" name="direccion" placeholder="Dirección" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Registrarse</button>
      </form>
      <p class="enlace-modal">
        ¿Ya tienes cuenta?
        <a href="#" onclick="cambiarModal('registro', 'inicio')">Iniciar sesión</a>
      </p>
    </div>
  </div>

  <!-- MODAL DE INICIO DE SESIÓN -->
  <div class="modal" id="modal-inicio">
    <div class="modal-contenido">
      <span class="cerrar" onclick="cerrarModal('inicio')">&times;</span>
      <h2>Iniciar Sesión</h2>
      <form action="./config/iniciar_sesion.php" method="POST">
        <!-- Campos del formulario de inicio -->
        <input type="email" name="correo" placeholder="Correo electrónico" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Entrar</button>
      </form>
      <p class="enlace-modal">
        ¿No tienes cuenta?
        <a href="#" onclick="cambiarModal('inicio', 'registro')">Registrarse</a>
      </p>
    </div>
  </div>

  <!-- Script para manejar la apertura/cierre de modales -->
  <script src="./JS/modal.js"></script>
  <script>
    // Abre el modal correspondiente según el id
    function abrirModal(id) {
      const modal = document.getElementById('modal-' + id);
      if (modal) modal.style.display = 'flex';
    }

    // Cierra el modal correspondiente según el id
    function cerrarModal(id) {
      const modal = document.getElementById('modal-' + id);
      if (modal) modal.style.display = 'none';
    }

    // Verifica si la URL contiene ?abrirLogin=1 para abrir el modal de inicio automáticamente
    document.addEventListener("DOMContentLoaded", function () {
      const urlParams = new URLSearchParams(window.location.search);
      if (urlParams.get("abrirLogin") === "1") {
        abrirModal('inicio');
      }
    });
  </script>
</body>
</html>
