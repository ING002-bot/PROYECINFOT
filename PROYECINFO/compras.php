<?php
session_start();
// Validar sesión de administrador
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Control - INFOTEC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./CSS/panel.css">
    <!-- Scripts del panel administrativo original -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <header class="encabezado">
        <div class="logo">INFOTEC</div>
        <div class="usuario">
            Conectado como: <strong>INFOTEC ADMIN</strong>
            <a href="cerrarsesion.php" class="cerrar-sesion">Cerrar Sesión</a>
        </div>
    </header>

    <div class="contenedor">
        <aside class="menu-lateral" id="sidenavAccordion">
            <h3>MENÚ PRINCIPAL</h3>
            <ul>
                <li><a href="admin.php">Panel de Control</a></li>
                <li><a href="usuarios.php?page=usuarios">Usuarios Registrados</a></li>
                <li><a href="producto.php?page=productos">Productos</a></li>
                <li><a href="categorias.php?page=categorias">Categorías</a></li>
                <li><a href="admin.php?page=imagenes">Imágenes de Producto</a></li>
                <li><a href="admin.php?page=compras">Compras</a></li>
                <li><a href="admin.php?page=boletas">Boletas Electrónicas</a></li>
                <li><a href="admin.php?page=comentarios">Comentarios</a></li>
                <li><a href="tikesoporte.php?page=soporte">Tickets de Soporte</a></li>
                <li><a href="admin.php?page=mensajes">Mensajes de Soporte</a></li>
            </ul>
        </aside>

        <main class="contenido">
            <?php
            $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
            $path = 'admin_pages/' . $page . '.php';
            if (file_exists($path)) {
                include $path;
            } else {
                echo '
                <div class="pagina-no-encontrada" style="text-align:center; padding: 50px;">
                    <img src="https://cdn-icons-png.flaticon.com/512/2748/2748558.png" alt="Error 404" style="width:120px; opacity:0.8;">
                    <h2 style="color:#ff3b6c; font-size: 2.2em; margin-top: 20px;">¡Oops! Algo no está conectado... 🔌</h2>
                    <p style="font-size: 1.1em; color:#444; max-width:600px; margin: 20px auto;">
                        La sección que intentas acceder no está disponible en este momento. Puede que esté en mantenimiento, en desarrollo, 
                        o que el enlace esté mal escrito. Pero tranquilo, no es culpa del sistema (¡todavía 😅!).
                    </p>
                    <p style="font-size: 1em; color:#666;">Puedes regresar al <a href="admin.php" style="color:#3a2edb; text-decoration: underline;">Panel de Control</a> o explorar otra opción del menú lateral.</p>
                    <p style="margin-top: 30px; font-size: 0.9em; color: #888;">¿Tienes dudas? Contáctanos desde el soporte técnico de INFOTEC.</p>
                </div>';
            }
            ?>
        </main>
    </div>

    <footer class="pie">
        <p>Derechos reservados © INFOTEC 2025</p>
        <p><a href="politicas.php">Política de Privacidad</a> · <a href="terminosycondi.php">Términos y Condiciones</a></p>
    </footer>

    <!-- Scripts de Bootstrap y funcionalidad del panel -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/panel.js"></script>
</body>
</html>
