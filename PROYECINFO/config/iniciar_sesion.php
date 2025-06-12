<?php
session_start();  // 📌 Inicia la sesión para permitir uso de $_SESSION
include 'conexion.php'; // Conexión PDO; verifica que la ruta y credenciales sean correctas

// Solo procesamos cuando se envía el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = trim($_POST['correo']);    // Limpieza básica del input
    $password = $_POST['password'];

    try {
        // ——————— Intento de login como administrador ———————
        $stmtAdmin = $pdo->prepare("SELECT * FROM administrador WHERE correo = ?");
        $stmtAdmin->execute([$correo]);

        if ($stmtAdmin->rowCount() == 1) {
            $admin = $stmtAdmin->fetch(PDO::FETCH_ASSOC);

            // Comprobamos contraseña plana o hasheada
            if ($password === $admin['contraseña'] || password_verify($password, $admin['contraseña'])) {
                // Establecemos sesión de administrador
                $_SESSION['rol'] = 'admin';
                $_SESSION['id'] = $admin['id_admin'];
                $_SESSION['nombre'] = $admin['nombre'];

                // Redirigimos al panel administrativo
                echo "<script>alert('Bienvenido administrador'); window.location.href = '../admin.php';</script>";
                exit();
            }
        }

        // ——————— Intento de login como usuario estándar ———————
        $stmtUser = $pdo->prepare("SELECT * FROM usuarios WHERE correo = ?");
        $stmtUser->execute([$correo]);

        if ($stmtUser->rowCount() == 1) {
            $usuario = $stmtUser->fetch(PDO::FETCH_ASSOC);

            if ($password === $usuario['contraseña'] || password_verify($password, $usuario['contraseña'])) {
                // Establecemos sesión de usuario
                $_SESSION['rol'] = 'usuario';
                $_SESSION['id'] = $usuario['id_usuario'];
                $_SESSION['nombre'] = $usuario['nombre'];

                // Redirigimos al dashboard de usuario
                echo "<script>alert('Inicio de sesión exitoso'); window.location.href = '../usuario.php';</script>";
                exit();
            }
        }

        // ——————— Si no coincide ninguna credencial ———————
        echo "<script>alert('Correo o contraseña incorrectos.'); window.history.back();</script>";

    } catch (PDOException $e) {
        // Captura errores de PDO (SQL, conexión, etc.)
        echo "Error en la base de datos: " . htmlspecialchars($e->getMessage());
    }

} else {
    // Si se accede sin POST, denegamos el acceso
    echo "Acceso denegado.";
}
