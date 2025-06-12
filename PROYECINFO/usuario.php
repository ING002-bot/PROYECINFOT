<?php
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'usuario') {
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
    <title>Bienvenido - INFOTEC</title>
    <link rel="stylesheet" href="./CSS/usuario.css">
</head>
<body>
    <header>
        <h1>Bienvenido - INFOTEC</h1>
        <nav>
            <a href="nosotros_u.php">Nosotros</a>
            <a href="cerrarsesion.php">Cerrar Sesión</a>
        </nav>
    </header>

    <main>
        <h2>Hola, <?php echo htmlspecialchars($_SESSION['nombre']); ?> 👋</h2>
        <p>Gracias por iniciar sesión. Desde aquí puedes acceder a nuestros productos y soporte técnico.</p>

        <!-- Ejemplo de contenido -->
        <section class="opciones">
            <div class="card">
                <h3>Ver Productos</h3>
                <p>Revisa los productos disponibles para venta.</p>
                <a href="./venta_u.php">Ver más</a>
            </div>
            <div class="card">
                <h3>Ver Servicios Tecnicos</h3>
                <p>Revisa los Servicios Tecnicos.</p>
                <a href="./servicio_u.php">Ver más</a>
            </div>
            <div class="card">
                <h3>Solicitar Soporte</h3>
                <p>¿Problemas con tu PC, laptop o impresora? Contáctanos.</p>
                <a href="https://wa.me/51923213425" target="_blank">Solicitar</a>
            </div>

        </section>
    </main>
</body>
</html>
