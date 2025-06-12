<?php
session_start();
include 'config/conexion.php';

// Verifica si el usuario ha iniciado sesión y es del rol 'usuario'
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'usuario') {
    header("Location: index.php");
    exit();
}

// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_SESSION['id'];               // ID del usuario desde sesión
    $asunto = $_POST['asunto'];                  // Asunto del ticket
    $mensaje = $_POST['mensaje'];                // Mensaje detallado
    $estado = 'abierto';                         // Estado por defecto

    try {
        $sql = "INSERT INTO tickets_soporte (id_usuario, asunto, mensaje, estado) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$id_usuario, $asunto, $mensaje, $estado])) {
            echo "<script>alert('¡Ticket enviado exitosamente!'); window.location.href='usuario.php';</script>";
        } else {
            echo "<script>alert('Error al enviar el ticket.'); window.history.back();</script>";
        }
    } catch (PDOException $e) {
        echo "<script>alert('Error en la base de datos: " . $e->getMessage() . "'); window.history.back();</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitar Soporte Técnico</title>
    <link rel="stylesheet" href="CSS/solicitar_soporte.css">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        .form-wrapper {
            width: 400px;
            margin: 60px auto;
            padding: 30px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #3a2edb;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #25D366;
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 8px;
            margin-top: 15px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #1ca64c;
        }
    </style>
</head>
<body>
    <div class="form-wrapper">
        <h2>Solicitar Soporte Técnico</h2>
        <form action="solicitar_soporte.php" method="POST">
            <!-- Asunto del ticket -->
            <label for="asunto">Asunto:</label>
            <input type="text" id="asunto" name="asunto" required placeholder="Ej. Del Problema">

            <!-- Mensaje del problema -->
            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" rows="5" required placeholder="Describe detalladamente tu problema..."></textarea>

            <!-- Botón de envío -->
            <button type="submit">Enviar Solicitud</button>
        </form>
    </div>
</body>
</html>
