<?php
session_start();
include 'conexion.php'; // Asegúrate que la ruta es correcta

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = trim($_POST['correo']);
    $password = $_POST['password'];

    try {
        // Verificar si es administrador
        $stmtAdmin = $pdo->prepare("SELECT * FROM administrador WHERE correo = ?");
        $stmtAdmin->execute([$correo]);

        if ($stmtAdmin->rowCount() == 1) {
            $admin = $stmtAdmin->fetch(PDO::FETCH_ASSOC);

            if ($password === $admin['contraseña'] || password_verify($password, $admin['contraseña'])) {
                $_SESSION['rol'] = 'admin';
                $_SESSION['id'] = $admin['id_admin'];
                $_SESSION['nombre'] = $admin['nombre'];
                echo "<script>alert('Bienvenido administrador'); window.location.href = '../admin.php';</script>";
                exit();
            }
        }

        // Verificar si es usuario
        $stmtUser = $pdo->prepare("SELECT * FROM usuarios WHERE correo = ?");
        $stmtUser->execute([$correo]);

        if ($stmtUser->rowCount() == 1) {
            $usuario = $stmtUser->fetch(PDO::FETCH_ASSOC);

            if ($password === $usuario['contraseña'] || password_verify($password, $usuario['contraseña'])) {
                $_SESSION['rol'] = 'usuario';
                $_SESSION['id'] = $usuario['id_usuario'];
                $_SESSION['nombre'] = $usuario['nombre'];
                echo "<script>alert('Inicio de sesión exitoso'); window.location.href = '../usuario.php';</script>";
                exit();
            }
        }

        // Si no coincide con ninguno
        echo "<script>alert('Correo o contraseña incorrectos.'); window.history.back();</script>";

    } catch (PDOException $e) {
        echo "Error en la base de datos: " . $e->getMessage();
    }

} else {
    echo "Acceso denegado.";
}
