<?php
session_start(); // Iniciar o reanudar la sesión para acceder a $_SESSION :contentReference[oaicite:1]{index=1}

// Si no hay una sesión válida o el rol no es 'usuario', se restablece la sesión y se redirige al inicio
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'usuario') {
    session_unset();   // Elimina todas las variables de sesión almacenadas
    session_destroy(); // Termina la sesión actual
    header("Location: index.php"); // Redirige al usuario a la página principal
    exit(); // Asegura que no se ejecute más código después
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido - INFOTEC</title>
    <!-- Estilos personalizados para la vista de usuario -->
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
        <!-- Mostrar saludo personalizado, evitando inyección con htmlspecialchars -->
        <h2>Hola, <?php echo htmlspecialchars($_SESSION['nombre']); ?> 👋</h2>
        <p>Gracias por iniciar sesión. Desde aquí puedes acceder a nuestros productos y soporte técnico.</p>

        <!-- Opciones disponibles para el usuario -->
        <section class="opciones">
            <!-- Acceder a productos disponibles -->
            <div class="card">
                <h3>Ver Productos</h3>
                <p>Revisa los productos disponibles para venta.</p>
                <a href="./venta_u.php">Ver más</a>
            </div>

            <!-- Acceder a servicios técnicos -->
            <div class="card">
                <h3>Ver Servicios Técnicos</h3>
                <p>Revisa los Servicios Técnicos.</p>
                <a href="./servicio_u.php">Ver más</a>
            </div>

            <!-- Envío de solicitud vía WhatsApp para soporte -->
            <div class="card">
                <h3>Solicitar Soporte</h3>
                <p>¿Problemas con tu PC, laptop o impresora? Contáctanos.</p>
                <a href="https://wa.me/51923213425" target="_blank">Solicitar</a>
            </div>
        </section>
    </main>
</body>
</html>
