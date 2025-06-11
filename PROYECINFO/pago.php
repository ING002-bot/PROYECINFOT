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
        <form action="" method="POST" id="pago-formulario">
            <label for="nombre">Nombre completo:</label>
            <input type="text" name="nombre" required>

            <label for="email">Correo electrónico:</label>
            <input type="email" name="email" required>

            <label for="producto">Producto:</label>
            <input type="text" name="producto" required>

            <label for="precio">Precio (USD):</label>
            <input type="number" name="precio" step="0.01" required>

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
                });
            }
        }).render('#paypal-button-container');
    </script>

</body>
</html>
