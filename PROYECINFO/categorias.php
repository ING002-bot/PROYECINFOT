<?php
require 'config/conexion.php';

// Insertar nueva categoría
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre_categoria'])) {
    $nombre_categoria = trim($_POST['nombre_categoria']);

    if (!empty($nombre_categoria)) {
        try {
            // Ajuste aquí: la columna se llama "nombre" según tu base de datos
            $sql = "INSERT INTO categorias (nombre) VALUES (:nombre_categoria)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nombre_categoria', $nombre_categoria);
            $stmt->execute();
            // No redireccionamos para mostrar en la misma página
            $mensaje = "✅ Categoría agregada correctamente.";
        } catch (PDOException $e) {
            $error = "❌ Error al insertar categoría: " . $e->getMessage();
        }
    } else {
        $error = "⚠ El nombre de la categoría no puede estar vacío.";
    }
}

// Obtener categorías
try {
    $sql = "SELECT * FROM categorias ORDER BY id_categoria DESC";
    $stmt = $pdo->query($sql);
    $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("❌ Error al obtener categorías: " . $e->getMessage());
}

// Eliminar categoría
if (isset($_GET['eliminar'])) {
    $id_categoria = intval($_GET['eliminar']);
    try {
        $sql = "DELETE FROM categorias WHERE id_categoria = :id_categoria";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_categoria', $id_categoria);
        $stmt->execute();
        // Refrescar la lista sin redireccionar
        header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
        exit();
    } catch (PDOException $e) {
        die("❌ Error al eliminar categoría: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Categorías - INFOTEC</title>
    <link rel="stylesheet" href="CSS/admin.css">
</head>
<body>
    <div class="container">
        <h2>Categorías</h2>

        <?php if (!empty($mensaje)): ?>
            <p style="color:green;"><?php echo $mensaje; ?></p>
        <?php endif; ?>
        <?php if (!empty($error)): ?>
            <p style="color:red;"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST" class="form-agregar">
            <input type="text" name="nombre_categoria" placeholder="Nombre de la categoría" required>
            <button type="submit">Agregar Categoría</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre de Categoría</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($categorias)): ?>
                    <?php foreach ($categorias as $cat): ?>
                        <tr>
                            <td><?php echo $cat['id_categoria']; ?></td>
                            <td><?php echo htmlspecialchars($cat['nombre']); ?></td>
                            <td>
                                <a href="?eliminar=<?php echo $cat['id_categoria']; ?>" onclick="return confirm('¿Eliminar esta categoría?')">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="3">No hay categorías registradas.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
