<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Infotec - Soporte Técnico</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./CSS/estilos.css">
</head>
<body>
  <header>
    <img src="IMAGES/logo.png" alt="Infotec Logo">
    <nav>
      <a href="venta.php">Equipos</a>
      <a href="servicio.php">Soporte</a>
      <a href="nosotros.php">Contacto</a>
      <a class="registro-sesion" href="#" onclick="abrirModal('registro')">Registrar</a>
      <a class="registro-sesion" href="#" onclick="abrirModal('inicio')">Iniciar Sesión</a>
    </nav>
  </header>

  <section class="hero">
    <div class="hero-text">
      <h1>Soporte técnico</h1>
      <p>Pide tu demostración Sin Compromiso</p>
      <a class="whatsapp-button" href="https://wa.me/51923213425">📞 923 213 425</a>
    </div>
    <img src="./IMAGES/ind1.webp" alt="Laptop con software">
  </section>

  <section class="support-section">
    <h2>Soporte Técnico</h2>
    <p>
      Especialistas en soporte técnico en todas las marcas de puntos de ventas de todo tipo de negocios. Brindamos atención personalizada y soluciones efectivas para que tu sistema funcione siempre al 100%.
    </p>
  </section>
  <!-- MODAL REGISTRO -->
<div class="modal" id="modal-registro">
  <div class="modal-contenido">
    <span class="cerrar" onclick="cerrarModal('registro')">&times;</span>
    <h2>Crear Cuenta</h2>
    <form action="config/registro.php" method="POST">
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

<!-- MODAL INICIO SESIÓN -->
<div class="modal" id="modal-inicio">
  <div class="modal-contenido">
    <span class="cerrar" onclick="cerrarModal('inicio')">&times;</span>
    <h2>Iniciar Sesión</h2>
    <form action="./config/iniciar_sesion.php" method="POST">
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

<!-- Script de modales -->
<script src="./JS/modal.js"></script>
<script>
  function abrirModal(id) {
    const modal = document.getElementById('modal-' + id);
    if (modal) modal.style.display = 'flex';
  }

  function cerrarModal(id) {
    const modal = document.getElementById('modal-' + id);
    if (modal) modal.style.display = 'none';
  }

  // ✅ Detectar si la URL contiene ?abrirLogin=1 y abrir el modal de inicio
  document.addEventListener("DOMContentLoaded", function () {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get("abrirLogin") === "1") {
      abrirModal('inicio');
    }
  });
</script>


</body>
</html>
