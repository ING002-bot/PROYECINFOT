<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pago en línea</title>
    <!-- Estilos personalizados para el formulario de pago -->
    <link rel="stylesheet" href="./CSS/pago.css">
    <!-- SDK de PayPal: ambiente sandbox (client-id=sb) y moneda USD -->
    <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>
</head>
<body>

    <!-- Contenedor principal para el formulario de pago -->
    <div class="form-wrapper">
        <form action="procesar_pago.php" method="POST" id="pago-formulario">
            <!-- Campo para nombre completo del comprador -->
            <label for="nombre">Nombre completo:</label>
            <input type="text" name="nombre" required>

            <!-- Campo para el correo electrónico -->
            <label for="email">Correo electrónico:</label>
            <input type="email" name="email" required>

            <!-- Campo para indicar el producto a comprar -->
            <label for="producto">Producto:</label>
            <input type="text" name="producto" required>

            <!-- Campo para ingresar el precio en USD -->
            <label for="precio">Precio (USD):</label>
            <input type="number" name="precio" step="0.01" required>

            <!-- Campo oculto para marcar si el pago fue aprobado -->
            <input type="hidden" name="pago_completado" id="pago_completado" value="0">

            <!-- Contenedor donde se renderizan los botones de PayPal -->
            <div id="paypal-button-container"></div>
        </form>
    </div>

    <!-- Script para inicializar y configurar el botón de PayPal -->
    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                // Obtener el precio ingresado por el usuario (valor por defecto 1.00 si está vacío)
                const price = document.querySelector('input[name="precio"]').value || '1.00';
                // Crear orden con el monto especificado
                return actions.order.create({
                    purchase_units: [{
                        amount: { value: price }
                    }]
                });
            },
            onApprove: function(data, actions) {
                // Cuando el pago es aprobado, capturar los detalles
                return actions.order.capture().then(function(details) {
                    // Mostrar alerta a usuario confirmando el pago
                    alert('Pago completado por: ' + details.payer.name.given_name);
                    // Marcar el campo oculto para indicar que el pago fue completado
                    document.getElementById('pago_completado').value = "1";
                    // Enviar el formulario para procesarlo en el servidor
                    document.getElementById('pago-formulario').submit();
                });
            }
        }).render('#paypal-button-container'); // Renderizar el botón en este contenedor
    </script>

</body>
</html>
