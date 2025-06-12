<?php
session_start();           // Inicia o continúa la sesión actual
session_unset();           // Elimina todas las variables almacenadas en la sesión
session_destroy();         // Finaliza y destruye completamente la sesión
header("Location: index.php"); // Redirige al usuario a la página de inicio
exit();                    // Detiene la ejecución del script
?>
