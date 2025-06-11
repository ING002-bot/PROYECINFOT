<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Venta - INFOTEC</title>
  <link rel="stylesheet" href="CSS/formulario.css">
</head>
<body>
  <div class="form-container">
    <h2>Formulario de Venta</h2>
    <form action="/procesar-venta" method="POST">
      <label for="cliente">Nombre del cliente:</label>
      <input type="text" id="cliente" name="cliente" required>

      <label for="producto">Producto:</label>
      <input type="text" id="producto" name="producto" required>

      <label for="cantidad">Cantidad:</label>
      <input type="number" id="cantidad" name="cantidad" min="1" required>

      <label for="metodo">Método de pago:</label>
      <select id="metodo" name="metodo" required>
        <option value="">-- Seleccionar --</option>
        <option value="efectivo">Efectivo</option>
        <option value="tarjeta">Tarjeta</option>
        <option value="transferencia">Transferencia</option>
      </select>

      <label for="direccion">Dirección de envío:</label>
      <textarea id="direccion" name="direccion" rows="3" required></textarea>

      <button type="submit">Realizar compra</button>
    </form>
  </div>
</body>
</html>
