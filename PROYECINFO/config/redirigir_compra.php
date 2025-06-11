<?php
session_start();

if (!isset($_SESSION['correo'])) {
    // Si no hay sesión, redirige al index con el parámetro para abrir el modal
    header("Location: ../index.php ?abrirLogin=1");
    exit();
} else {
    // Si ya inició sesión, lo llevas a la compra
    header("Location: ../pago.php"); // o la página que desees
    exit();
}