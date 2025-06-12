<?php
include 'conexion.php'; // ➤ Establece conexión a la base de datos usando PDO

// Solo permitimos procesar cuando se envía el formulario mediante POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ——— Recoger datos del formulario (trim para eliminar espacios externos) ———
    $nombre   = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $correo   = trim($_POST['correo']);
    $telefono = trim($_POST['telefono']);
    $direccion= trim($_POST['direccion']);
    $password = $_POST['password'];

    // ——— Validación: prevenir registro duplicado ———
    $verificar_sql = "SELECT id_usuario FROM usuarios WHERE correo = ?";
    $stmt = $pdo->prepare($verificar_sql);
    $stmt->execute([$correo]);
    if ($stmt->rowCount() > 0) {
        // Si el correo ya existe, se notifica y se previene duplicación
        echo "<script>alert('El correo ya está registrado.'); window.history.back();</script>";
        exit();
    }

    // ——— Seguridad: encriptar contraseña de forma segura ———
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // ——— Inserción en la tabla usuarios ———
    $sql = "INSERT INTO usuarios (nombre, apellido, correo, contraseña, direccion, telefono) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $resultado = $stmt->execute([$nombre, $apellido, $correo, $passwordHash, $direccion, $telefono]);

    if ($resultado) {
        // Registro exitoso: redirigir y notificar al usuario
        echo "<script>alert('Registro exitoso. Ahora puedes iniciar sesión.'); window.location.href = '../index.php';</script>";
    } else {
        // Error al registrar: informar
        echo "<script>alert('Error al registrar. Inténtalo nuevamente.'); window.history.back();</script>";
    }
} else {
    // Acceso directo al archivo sin enviar formulario
    echo "Acceso no permitido.";
}
