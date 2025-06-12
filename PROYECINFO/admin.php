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
                <li><a href="imgproduc.php?page=imagenes">Imágenes de Producto</a></li>
                <li><a href="compras.php?page=compras">Compras</a></li>
                <li><a href="boletas.php?page=boletas">Boletas Electrónicas</a></li>
                <li><a href="comentarios.php?page=comentarios">Comentarios</a></li>
                <li><a href="tikesoporte.php?page=soporte">Tickets de Soporte</a></li>
                <li><a href="mensaje.php?page=mensajes">Mensajes de Soporte</a></li>
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
                <div class="pagina-no-encontrada">
                    <h2>⚠ Página no encontrada</h2>
                    <p>La sección que estás buscando no existe o fue movida.</p>
                    <p>Por favor verifica el enlace o consulta al administrador.</p>
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
