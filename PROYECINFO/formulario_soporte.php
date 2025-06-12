<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contacto Soporte Técnico</title>
  <link rel="stylesheet" href="CSS/formulario.css">
</head>
<body>
  <div class="form-container">
    <h2>Contacto con Soporte Técnico</h2>
    <form action="/enviar-soporte" method="POST">
      <label for="nombre">Nombre completo:</label>
      <input type="text" id="nombre" name="nombre" required>

      <label for="correo">Correo electrónico:</label>
      <input type="email" id="correo" name="correo" required>

      <label for="tipo">Tipo de dispositivo:</label>
      <select id="tipo" name="tipo" required>
        <option value="">-- Seleccionar --</option>
        <option value="laptop">Laptop</option>
        <option value="pc">PC de escritorio</option>
        <option value="impresora">Impresora</option>
        <option value="otro">Otro</option>
      </select>

      <label for="mensaje">Descripción del problema:</label>
      <textarea id="mensaje" name="mensaje" rows="5" required></textarea>

      <button type="submit">Enviar solicitud</button>
    </form>
  </div>
</body>
</html>
