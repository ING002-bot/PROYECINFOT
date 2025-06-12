<?php
session_start(); // Inicia la sesión para usar $_SESSION eliminar la lógica repetida :contentReference[oaicite:1]{index=1}

/*
 Determina si el usuario está logueado mediante la existencia de una clave 'correo' en sesión
 útil para condicionar ciertos comportamientos en el frontend
*/
$usuario_logueado = isset($_SESSION['correo']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Infotec</title>
    <link rel="stylesheet" href="./CSS/venta.css">
</head>
<body>
    <header>
        <h1>Bienvenidos a la mejor tienda</h1>
        <nav>
            <ul>
                <li><a href="usuario.php">Atras</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="pc">
            <h2>PCs</h2>
            <div class="group">
                <div class="product">
                    <img src="./IMAGES/pcg2.webp" alt="PC Gamer">
                    <p>Computadora PC GAMER Core I7-8th Ram 16GB DISCO 1TB+SSD 480GB 
                        RX 580 8GB M24</p>
                    <p class="price">S/ 4,500</p>
                    <a href="config/redirigir_compra.php" style="padding: 10px; background-color: #25D366; color: white; text-decoration: none;">Comprar</a>

                    
                </div>
                <div class="product">
                    <img src="./IMAGES/pcg2.webp" alt="PC Gamer">
                    <p>Computadora PC GAMER Core I7-8th Ram 16GB DISCO 1TB+SSD 480GB 
                        RX 580 8GB M24</p>
                    <p class="price">S/ 4,500</p>
                    <a href="config/redirigir_compra.php" style="padding: 10px; background-color: #25D366; color: white; text-decoration: none;">Comprar</a>
                </div>
                <div class="product">
                    <img src="./IMAGES/pcg3.webp" alt="PC Gamer">
                    <p>COMPUTADORA GAMER PC RYZEN 7 5700X RAM 32GB SSD 1TB GRAFICA 
                        RTX 4060 8GB</p>
                    <p class="price">S/ 5,000</p>
                    <a href="config/redirigir_compra.php" style="padding: 10px; background-color: #25D366; color: white; text-decoration: none;">Comprar</a>

                </div>
                <div class="product">
                    <img src="./IMAGES/pcg4.webp" alt="PC Gamer">
                    <p>PC GAMER AMD RYZEN 5 5500 RTX 4060 8GB MONITOR 24" 120HZ RAM 
                        16GB SSD 1TB M.2</p>
                    <p class="price">S/ 3,759</p>
                    <a href="config/redirigir_compra.php" style="padding: 10px; background-color: #25D366; color: white; text-decoration: none;">Comprar</a>

            </div>
                <div class="product">
                    <img src="./IMAGES/pcg5.webp" alt="PC Gamer">
                    <p>Computadora PC Gamer Core i7 14700KF RAM 32GB SSD 1TB GRAFICA 
                        RTX 5070 12GB</p>
                    <p class="price">S/ 8,780</p>
                    <a href="config/redirigir_compra.php" style="padding: 10px; background-color: #25D366; color: white; text-decoration: none;">Comprar</a>

                </div>
                <div class="product">
                    <img src="./IMAGES/pcg6.webp" alt="PC Gamer">
                    <p>COMPUTADORA PC Intel Core i5 16GB 256GB SSD 1TB HDD Monitor 
                        LED Curvo 23.8</p>
                    <p class="price">S/ 1,399</p>
                    <a href="config/redirigir_compra.php" style="padding: 10px; background-color: #25D366; color: white; text-decoration: none;">Comprar</a>

                </div>
            </div>
        </section>

        <section id="laptop">
            <h2>Laptops</h2>
            <div class="group">
                <div class="product">
                    <img src="./IMAGES/lt1.webp" alt="Laptop HP">
                    <p>Gamer Amd Ryzen 7 16gb 512ssd Tuf Gaming A15 Fa507nur-lp037w Serie 7000 15.6" 
                        Fhd Rtx4050</p>
                    <p class="price">S/ 4,780</p>
                    <a href="config/redirigir_compra.php" style="padding: 10px; background-color: #25D366; color: white; text-decoration: none;">Comprar</a>

                </div>
                <div class="product">
                    <img src="./IMAGES/lt2.webp" alt="Laptop HP">
                    <p>Laptop Gamer Asus ROG Zephyrus G16 16" 165Hz Intel i7 16GB RTX 4070 512GB SSD 
                        Eclipse Gray</p>
                    <p class="price">S/ 6,800</p>
                    <a href="config/redirigir_compra.php" style="padding: 10px; background-color: #25D366; color: white; text-decoration: none;">Comprar</a>

                </div>
                <div class="product">
                    <img src="./IMAGES/lt3.webp" alt="Laptop HP">
                    <p>Laptop Asus Vivobook 15 Intel Core I5-13420h 12gb 512ssd 
                        15.6" Fhd</p>
                    <p class="price">S/ 1,800</p>
                    <a href="config/redirigir_compra.php" style="padding: 10px; background-color: #25D366; color: white; text-decoration: none;">Comprar</a>

                </div>
                <div class="product">
                    <img src="./IMAGES/lt4.webp" alt="Laptop HP">
                    <p>Gamer Intel Core Ultra 9 64gb 2tbssd Rog Strix Scar 18 G835lx-sa119w 18" 2.5k 
                        Rtx5090</p>
                    <p class="price">S/ 21,999</p>
                    <a href="config/redirigir_compra.php" style="padding: 10px; background-color: #25D366; color: white; text-decoration: none;">Comprar</a>

                </div>
                <div class="product">
                    <img src="./IMAGES/lt5.avif" alt="Laptop HP">
                    <p>Laptop Hp Intel Core I5-1334u 8gb Ram 512gb Ssd 15.6" + Mochila + Mouse 15-fd0253la</p>
                    <p class="price">S/ 1,999</p>
                    <a href="config/redirigir_compra.php" style="padding: 10px; background-color: #25D366; color: white; text-decoration: none;">Comprar</a>

                </div>
                <div class="product">
                    <img src="./IMAGES/lt6.webp" alt="Laptop HP">
                    <p>Laptop Intel Core Ultra 5 Serie H 8GB 512GB SSD 14" Con Inteligencia Artificial 14-ep1001la</p>
                    <p class="price">S/ 2,799</p>
                    <a href="config/redirigir_compra.php" style="padding: 10px; background-color: #25D366; color: white; text-decoration: none;">Comprar</a>

                </div>
            </div>
        </section>

        <section id="Impresora">
            <h2>Impresora</h2>
            <div class="group">
                <div class="product">
                    <img src="./IMAGES/im1.webp" alt="Impresora HP">
                    <p>Impresora HP Smart Tank 580</p>
                    <p class="price">S/799</p>
                    <a href="config/redirigir_compra.php" style="padding: 10px; background-color: #25D366; color: white; text-decoration: none;">Comprar</a>

                </div>
                <div class="product">
                    <img src="./IMAGES/im2.webp" alt="Laptop HP">
                    <p>Impresora L5590 Epson</p>
                    <p class="price">S/ 1,199</p>
                    <a href="config/redirigir_compra.php" style="padding: 10px; background-color: #25D366; color: white; text-decoration: none;">Comprar</a>

                </div>
                <div class="product">
                    <img src="./IMAGES/im3.webp" alt="Laptop HP">
                    <p>Impresora Multifunción Canon Pixma G3110</p>
                    <p class="price">S/619</p>
                    <a href="config/redirigir_compra.php" style="padding: 10px; background-color: #25D366; color: white; text-decoration: none;">Comprar</a>

                </div>
                <div class="product">
                    <img src="./IMAGES/im4.webp" alt="Laptop HP">
                    <p>Impresora Multifuncional Dcpt530dw Duplex0</p>
                    <p class="price">S/799</p>
                    <a href="config/redirigir_compra.php" style="padding: 10px; background-color: #25D366; color: white; text-decoration: none;">Comprar</a>

                </div>
                <div class="product">
                    <img src="./IMAGES/im5.webp" alt="Laptop HP">
                    <p>Impresora Multifuncional EcoTank L3250 WIFI</p>
                    <p class="price">S/679</p>
                    <a href="config/redirigir_compra.php" style="padding: 10px; background-color: #25D366; color: white; text-decoration: none;">Comprar</a>

                </div>
                <div class="product">
                    <img src="./IMAGES/im6.webp" alt="Laptop HP">
                    <p>Impresora Multifuncional Ecotank L5590 USB LAN WI-FI</p>
                    <p class="price">S/ 1,049</p>
                    <a href="config/redirigir_compra.php" style="padding: 10px; background-color: #25D366; color: white; text-decoration: none;">Comprar</a>

                </div>
            </div>
        </section>

        <section id="otros">
            <h2>Otros</h2>
            <div class="group">
                <div class="product">
                    <img src="./IMAGES/ot1.webp" alt="Mouse Logitech">
                    <p>MOUSE INALAMBRICO M170 LOGITECH NEGRO</p>
                    <p class="price">S/42,00 </p>
                    <a href="config/redirigir_compra.php" style="padding: 10px; background-color: #25D366; color: white; text-decoration: none;">Comprar</a>

                </div>
                <div class="product">
                    <img src="./IMAGES/ot2.webp" alt="Mouse Logitech">
                    <p>Teclado mecánico inalámbrico con Bluetooth, 
                        teclas modelo K68</p>
                    <p class="price">S/119,00 </p>
                    <a href="config/redirigir_compra.php" style="padding: 10px; background-color: #25D366; color: white; text-decoration: none;">Comprar</a>

                </div>
                <div class="product">
                    <img src="./IMAGES/ot3.webp" alt="Mouse Logitech">
                    <p>Altavoz inalámbrico Plug and Play JBL PS3500 
                        - Negro</p>
                    <p class="price">S/339,00 </p>
                    <a href="config/redirigir_compra.php" style="padding: 10px; background-color: #25D366; color: white; text-decoration: none;">Comprar</a>

                </div>
                <div class="product">
                    <img src="./IMAGES/ot4.webp" alt="Mouse Logitech">
                    <p>Sony Audífonos Bluetooth WH-CH720N Noise 
                        Cancelling</p>
                    <p class="price">S/159,00 </p>
                    <a href="config/redirigir_compra.php" style="padding: 10px; background-color: #25D366; color: white; text-decoration: none;">Comprar</a>

                </div>
                <div class="product">
                    <img src="./IMAGES/ot5.webp" alt="Mouse Logitech">
                    <p>KIT DE 4 TINTAS EPSON 504</p>
                    <p class="price">S/135,00 </p>
                    <a href="config/redirigir_compra.php" style="padding: 10px; background-color: #25D366; color: white; text-decoration: none;">Comprar</a>
                </div>
                <div class="product">
                    <img src="./IMAGES/ot6.webp" alt="Mouse Logitech">
                    <p>ALMOHADILLA PARA IMPRESORA L110L120L200L210L220</p>
                    <p class="price">S/23,98 </p>
                    <a href="config/redirigir_compra.php" style="padding: 10px; background-color: #25D366; color: white; text-decoration: none;">Comprar</a>

                </div>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 Tienda INFOTEC | Todos los derechos reservados</p>
    </footer>
            <script>
        // Valor de PHP sobre si el usuario está logueado o no
        const usuarioLogueado = <?php echo $usuario_logueado ? 'true' : 'false'; ?>;

        function comprar() {
            if (usuarioLogueado) {
            window.location.href = 'pago.php';
            } else {
            // Redirige al index.php con el parámetro que activa el modal
            window.location.href = 'index.php?abrirLogin=1';
            }
        }
        </script>
</body>
</html>