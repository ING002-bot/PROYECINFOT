<?php
session_start();
include 'config/conexion.php';

// Verifica si el usuario ha iniciado sesión y es un usuario
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'usuario') {
    header("Location: index.php");
    exit();
}

// Procesa el formulario si se envió
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_SESSION['id'];
    $categoria = $_POST['categoria'];
    $descripcion = $_POST['descripcion'];

    $sql = "INSERT INTO tickets_soporte (id_usuario, categoria, descripcion) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$id_usuario, $categoria, $descripcion])) {
        echo "<script>alert('¡Ticket de soporte enviado exitosamente!'); window.location.href='usuario.php';</script>";
    } else {
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
            <label for="categoria">Categoría:</label>
            <select name="categoria" id="categoria" required>
                <option value="">--Selecciona una categoría--</option>
                <option value="Computadora">Computadora</option>
                <option value="Laptop">Laptop</option>
                <option value="Impresora">Impresora</option>
                <option value="Red/Internet">Red/Internet</option>
            </select>

            <label for="descripcion">Descripción del problema:</label>
            <textarea name="descripcion" id="descripcion" rows="5" required></textarea>

            <button type="submit">Enviar Solicitud</button>
        </form>
    </div>
</body>
</html>
