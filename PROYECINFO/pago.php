<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pago en línea</title>
    <link rel="stylesheet" href="./CSS/pago.css">
    <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>
</head>
<body>

    <div class="form-wrapper">
        <form action="procesar_pago.php" method="POST" id="pago-formulario">
            <label for="nombre">Nombre completo:</label>
            <input type="text" name="nombre" required>

            <label for="email">Correo electrónico:</label>
            <input type="email" name="email" required>

            <label for="producto">Producto:</label>
            <input type="text" name="producto" required>

            <label for="precio">Precio (USD):</label>
            <input type="number" name="precio" step="0.01" required>

            <!-- Campo oculto para detectar si el pago fue aprobado -->
            <input type="hidden" name="pago_completado" id="pago_completado" value="0">

            <div id="paypal-button-container"></div>
        </form>
    </div>

    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                const price = document.querySelector('input[name="precio"]').value || '1.00';
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: price
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    alert('Pago completado por: ' + details.payer.name.given_name);
                    document.getElementById('pago_completado').value = "1";
                    document.getElementById('pago-formulario').submit();
                });
            }
        }).render('#paypal-button-container');
    </script>

</body>
</html>
