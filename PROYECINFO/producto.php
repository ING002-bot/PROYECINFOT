<?php
require 'config/conexion.php';

// Obtener lista de productos y categorías
try {
    $sql = "SELECT p.id_producto, p.nombre, p.descripcion, p.precio, p.stock, c.nombre AS nombre_categoria
            FROM productos p
            JOIN categorias c ON p.id_categoria = c.id_categoria
            ORDER BY p.id_producto DESC";
    $stmt = $pdo->query($sql);
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sqlCat = "SELECT * FROM categorias ORDER BY nombre ASC";
    $stmtCat = $pdo->query($sqlCat);
    $categorias = $stmtCat->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error al obtener datos: " . $e->getMessage());
}

// Agregar producto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre_producto'])) {
    $nombre = trim($_POST['nombre_producto']);
    $descripcion = trim($_POST['descripcion']);
    $precio = floatval($_POST['precio']);
    $stock = intval($_POST['stock']);
    $id_categoria = intval($_POST['id_categoria']);

    if ($nombre && $descripcion && $precio >= 0 && $stock >= 0 && $id_categoria) {
        $sql = "INSERT INTO productos (nombre, descripcion, precio, stock, id_categoria)
                VALUES (:nombre, :descripcion, :precio, :stock, :id_categoria)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':stock', $stock);
        $stmt->bindParam(':id_categoria', $id_categoria);
        $stmt->execute();

        echo "<script>location.href = 'productos.php#recargar';</script>";
        exit();
    } else {
        echo "<p style='color:red'>Datos inválidos.</p>";
    }
}

// Eliminar producto
if (isset($_GET['eliminar'])) {
    $id = intval($_GET['eliminar']);
    $sql = "DELETE FROM productos WHERE id_producto = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    echo "<script>location.href = 'productos.php#recargar';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Productos - INFOTEC</title>
    <link rel="stylesheet" href="./CSS/productos.css">
    <style>
        .container {
            width: 90%;
            margin: auto;
        }
        .form-agregar {
            margin-bottom: 20px;
        }
        input, textarea, select, button {
            display: block;
            width: 100%;
            margin-top: 10px;
            padding: 8px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        thead {
            background: #333;
            color: white;
        }
        td, th {
            padding: 10px;
            border: 1px solid #ccc;
        }
        tr:nth-child(even) {
            background: #f2f2f2;
        }
        a {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Gestión de Productos</h2>

        <!-- Formulario para agregar producto -->
        <form method="POST" class="form-agregar">
            <input type="text" name="nombre_producto" placeholder="Nombre del producto" required>
            <textarea name="descripcion" placeholder="Descripción del producto" required></textarea>
            <input type="number" name="precio" placeholder="Precio" step="0.01" required>
            <input type="number" name="stock" placeholder="Stock disponible" required>
            <select name="id_categoria" required>
                <option value="">Selecciona una categoría</option>
                <?php foreach ($categorias as $cat): ?>
                    <option value="<?php echo $cat['id_categoria']; ?>">
                        <?php echo htmlspecialchars($cat['nombre']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Agregar Producto</button>
        </form>

        <!-- Tabla de productos existentes -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Categoría</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $prod): ?>
                    <tr>
                        <td><?php echo $prod['id_producto']; ?></td>
                        <td><?php echo htmlspecialchars($prod['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($prod['descripcion']); ?></td>
                        <td>S/ <?php echo number_format($prod['precio'], 2); ?></td>
                        <td><?php echo $prod['stock']; ?></td>
                        <td><?php echo htmlspecialchars($prod['nombre_categoria']); ?></td>
                        <td>
                            <a href="?eliminar=<?php echo $prod['id_producto']; ?>" onclick="return confirm('¿Seguro de eliminar este producto?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
        // Refresca solo si hay un hash especial en la URL
        if (window.location.hash === '#recargar') {
            history.replaceState(null, null, 'productos.php');
        }
    </script>
</body>
</html>
