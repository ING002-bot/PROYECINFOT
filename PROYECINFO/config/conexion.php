<?php
// Archivo: conexion.php
// Conexión a la base de datos INFOTEC

$host = "localhost";        // Servidor de base de datos
$dbname = "infotec";        // Nombre de la base de datos
$username = "root";         // Usuario de MySQL (por defecto 'root' en local)
$password = "";             // Contraseña (vacía por defecto en XAMPP/WAMP)

// Intentar establecer la conexión usando PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Puedes descomentar esta línea si quieres ver un mensaje temporalmente
    // echo "✔ Conexión exitosa a la base de datos INFOTEC.";
} catch (PDOException $e) {
    die("✘ Error al conectar con la base de datos: " . $e->getMessage());
}
?>
