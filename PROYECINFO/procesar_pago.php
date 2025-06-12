<?php
require 'conexion.php';
require 'vendor/autoload.php'; // Asegúrate de que Dompdf esté instalado por Composer

use Dompdf\Dompdf;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $producto = $_POST['producto'];
    $precio = $_POST['precio'];

    try {
        // 1. Insertar en tabla compras
        $stmtCompra = $pdo->prepare("INSERT INTO compras (id_usuario, fecha_compra, total) VALUES (?, NOW(), ?)");
        $stmtCompra->execute([null, $precio]); // id_usuario es null por ahora si no hay login
        $idCompra = $pdo->lastInsertId();

        // 2. Insertar en tabla detalles_compra
        $stmtDetalle = $pdo->prepare("INSERT INTO detalles_compra (id_compra, id_producto, cantidad, subtotal) VALUES (?, ?, ?, ?)");
        $stmtDetalle->execute([$idCompra, null, 1, $precio]); // id_producto null temporalmente

        // 3. Generar contenido de boleta
        $html = "<h1>Boleta Electrónica</h1>";
        $html .= "<p><strong>Nombre:</strong> {$nombre}</p>";
        $html .= "<p><strong>Correo:</strong> {$email}</p>";
        $html .= "<p><strong>Producto:</strong> {$producto}</p>";
        $html .= "<p><strong>Total Pagado:</strong> $ {$precio}</p>";
        $html .= "<p><strong>Fecha:</strong> " . date('Y-m-d H:i:s') . "</p>";

        // 4. Generar PDF con Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $pdfOutput = $dompdf->output();
        $pdfFileName = 'boletas/boleta_' . $idCompra . '.pdf';
        file_put_contents($pdfFileName, $pdfOutput);

        // 5. Insertar en tabla boletas
        $stmtBoleta = $pdo->prepare("INSERT INTO boletas (id_compra, archivo_pdf, fecha_emision) VALUES (?, ?, NOW())");
        $stmtBoleta->execute([$idCompra, $pdfFileName]);

        echo "<script>alert('Pago registrado y boleta generada exitosamente.'); window.location.href='index.php';</script>";
        exit();
    } catch (PDOException $e) {
        echo "<p>Error en el proceso: " . $e->getMessage() . "</p>";
    }
} else {
    echo "<p>Acceso denegado.</p>";
}
?>
