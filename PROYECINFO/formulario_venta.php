<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Venta</title>
    <link rel="stylesheet" href="./CSS/venta.css">
</head>
<body>
    <h1>Formulario de Venta</h1>
    <?php
        $desc = isset($_GET['desc']) ? htmlspecialchars($_GET['desc']) : '';
        $price = isset($_GET['price']) ? htmlspecialchars($_GET['price']) : '';
    ?>
    <form action="procesar_venta.php" method="POST">
        <label for="producto">Producto:</label>
        <input type="text" id="producto" name="producto" value="<?php echo $desc; ?>" readonly><br><br>

        <label for="precio">Precio (S/):</label>
        <input type="text" id="precio" name="precio" value="<?php echo $price; ?>" readonly><br><br>

        <label for="cliente">Nombre del Cliente:</label>
        <input type="text" id="cliente" name="cliente" required><br><br>

        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" min="1" required><br><br>

        <input type="submit" value="Realizar Compra">
    </form>
</body>
</html>
