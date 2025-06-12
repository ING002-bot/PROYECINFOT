<?php
session_start();

// Validamos que estén definidas las variables necesarias
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'usuario') {
    // Si no es un usuario logueado, redirige al inicio con el modal de login activado
    header("Location: ../index.php?abrirLogin=1");
    exit();
}

// Si el usuario está logueado correctamente como 'usuario', lo mandamos a pagar
header("Location: ../solicitar_soporte.php");
exit();
