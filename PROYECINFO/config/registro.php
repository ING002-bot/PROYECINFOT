<?php
include 'conexion.php'; // Ajusta si la ruta es diferente

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $correo = trim($_POST['correo']);
    $telefono = trim($_POST['telefono']);
    $direccion = trim($_POST['direccion']);
    $password = $_POST['password'];

    // Verificar si el correo ya existe
    $verificar_sql = "SELECT id_usuario FROM usuarios WHERE correo = ?";
    $stmt = $pdo->prepare($verificar_sql);
    $stmt->execute([$correo]);

    if ($stmt->rowCount() > 0) {
        echo "<script>alert('El correo ya está registrado.'); window.history.back();</script>";
        exit();
    }

    // Encriptar la contraseña
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Insertar nuevo usuario
    $sql = "INSERT INTO usuarios (nombre, apellido, correo, contraseña, direccion, telefono) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $resultado = $stmt->execute([$nombre, $apellido, $correo, $passwordHash, $direccion, $telefono]);

    if ($resultado) {
        echo "<script>alert('Registro exitoso. Ahora puedes iniciar sesión.'); window.location.href = '../index.php';</script>";
    } else {
        echo "<script>alert('Error al registrar. Inténtalo nuevamente.'); window.history.back();</script>";
    }
} else {
    echo "Acceso no permitido.";
}
?>
