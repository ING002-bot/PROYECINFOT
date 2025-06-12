<?php
require 'config/conexion.php';

// Obtener tickets de soporte
try {
    $sql = "SELECT t.id_ticket, u.nombre, u.apellido, u.correo, t.asunto, t.mensaje, t.fecha_creacion, t.estado
            FROM tickets_soporte t
            JOIN usuarios u ON t.id_usuario = u.id_usuario
            ORDER BY t.id_ticket DESC";
    $stmt = $pdo->query($sql);
    $tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error al obtener tickets: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tickets de Soporte - INFOTEC</title>
    <link rel="stylesheet" href="CSS/admin.css">
    <style>
        .container {
            width: 90%;
            margin: auto;
            padding: 20px;
        }

        h2 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 16px;
        }

        thead {
            background-color: #333;
            color: white;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            vertical-align: top;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .estado-abierto {
            color: green;
            font-weight: bold;
        }

        .estado-cerrado {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tickets de Soporte</h2>

        <table>
            <thead>
                <tr>
                    <th>ID Ticket</th>
                    <th>Usuario</th>
                    <th>Correo</th>
                    <th>Asunto</th>
                    <th>Mensaje</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tickets as $ticket): ?>
                    <tr>
                        <td><?php echo $ticket['id_ticket']; ?></td>
                        <td><?php echo htmlspecialchars($ticket['nombre'] . ' ' . $ticket['apellido']); ?></td>
                        <td><?php echo htmlspecialchars($ticket['correo']); ?></td>
                        <td><?php echo htmlspecialchars($ticket['asunto']); ?></td>
                        <td><?php echo nl2br(htmlspecialchars($ticket['mensaje'])); ?></td>
                        <td><?php echo $ticket['fecha_creacion']; ?></td>
                        <td class="<?php echo ($ticket['estado'] === 'abierto') ? 'estado-abierto' : 'estado-cerrado'; ?>">
                            <?php echo ucfirst($ticket['estado']); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
