<?php
session_start(); // Iniciar o reanudar la sesión para usar $_SESSION :contentReference[oaicite:1]{index=1}

include 'config/conexion.php'; // Conectar a la base de datos usando PDO

// Verificar que el usuario está autenticado y tiene rol de 'usuario'
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'usuario') {
    // Si no cumple, redirigir al index para evitar acceso no autorizado
    header("Location: index.php");
    exit();
}

// Procesamiento del formulario cuando se envía por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_SESSION['id'];              // Obtenemos el ID del usuario desde la sesión
    $categoria = $_POST['categoria'];           // Leemos la categoría del formulario
    $descripcion = $_POST['descripcion'];       // Leemos la descripción del ticket

    // Preparar la inserción de un nuevo ticket de soporte
    $sql = "INSERT INTO tickets_soporte (id_usuario, categoria, descripcion) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    // Ejecutar la sentencia y verificar éxito o error
    if ($stmt->execute([$id_usuario, $categoria, $descripcion])) {
        // Si se insertó bien, notificar con alerta y redirigir a usuario.php
        echo "<script>alert('¡Ticket de soporte enviado exitosamente!'); window.location.href='usuario.php';</script>";
    } else {
        // Si hubo error, mostrar alerta y permitir regresar atrás
        echo "<script>alert('Error al enviar el ticket'); window.history.back();</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitar Soporte Técnico</title>
    <link rel="stylesheet" href="CSS/solicitar_soporte.css">
</head>
<body>
    <div class="form-wrapper">
        <h2 style="margin-bottom: 20px; text-align: center;">Solicitar Soporte Técnico</h2>
        <form action="solicitar_soporte.php" method="POST">
            <!-- Categoría del problema: se usa un select para opciones claras -->
            <label for="categoria">Categoría:</label>
            <select name="categoria" id="categoria" required>
                <option value="">--Selecciona una categoría--</option>
                <option value="Computadora">Computadora</option>
                <option value="Laptop">Laptop</option>
                <option value="Impresora">Impresora</option>
                <option value="Red/Internet">Red/Internet</option>
            </select>

            <!-- Descripción detallada del problema -->
            <label for="descripcion">Descripción del problema:</label>
            <textarea name="descripcion" id="descripcion" rows="5" required></textarea>

            <!-- Botón para enviar la solicitud -->
            <button type="submit">Enviar Solicitud</button>
        </form>
    </div>
</body>
</html>
