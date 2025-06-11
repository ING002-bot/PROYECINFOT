<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Infotec</title>
    <link rel="stylesheet" href="./CSS/servicio.css">
</head>
<body>
    <header>
        <h1>Servicio Tecnico</h1>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="venta.php">Compras</a></li>
                <li><a href="nosotros.php">Nosotros</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="maintenance">
            <h2>Mantenimiento Preventivo</h2>
            <div class="group">
                <div class="maintenance-p">
                    <h3>PCs</h3>
                    <img src="./IMAGES/ppc.jpg" alt="PC Gamer">
                    <p>El mantenimiento preventivo en una CPU busca evitar fallas...</p>
                    <p class="price">S/ 20,00</p>
                    <button onclick="location.href='index.php'">Solicitar servicio</button>
                </div>
                <div class="maintenance-p">
                    <h3>Laptops</h3>
                    <img src="./IMAGES/plap.jpg" alt="Laptop">
                    <p>El mantenimiento preventivo se realiza de manera periódica...</p>
                    <p class="price">S/ 25,00</p>
                    <button onclick="location.href='index.php'">Solicitar servicio</button>
                </div>
                <div class="maintenance-p">
                    <h3>Impresoras</h3>
                    <img src="./IMAGES/pimp.jpg" alt="Impresora">
                    <p>El mantenimiento preventivo se lleva a cabo regularmente...</p>
                    <p class="price">S/ 35,00</p>
                    <button onclick="location.href='index.php'">Solicitar servicio</button>
                </div>
            </div>
            
            <h2>Mantenimiento Correctivo</h2>
            <div class="group">
                <div class="maintenance-c">
                    <h3>PCs</h3>
                    <img src="./IMAGES/cpc.jpg" alt="PC Gamer">
                    <p>El mantenimiento correctivo se realiza cuando la CPU presenta una falla...</p>
                    <p class="price">S/ 40,00</p>
                    <button onclick="location.href='index.php'">Solicitar servicio</button>
                </div>
                <div class="maintenance-c">
                    <h3>Laptops</h3>
                    <img src="./IMAGES/clap.jpg" alt="Laptop">
                    <p>El mantenimiento correctivo se aplica cuando ya se ha producido un fallo...</p>
                    <p class="price">S/ 50,00</p>
                    <button onclick="location.href='index.php'">Solicitar servicio</button>
                </div>
                <div class="maintenance-c">
                    <h3>Impresoras</h3>
                    <img src="./IMAGES/cimp.jpg" alt="Impresora">
                    <p>El mantenimiento correctivo se realiza cuando la impresora presenta fallas...</p>
                    <p class="price">S/ 60,00</p>
                    <button onclick="location.href='index.php'">Solicitar servicio</button>
                </div>
            </div>

            <h2>Mantenimiento Predictivo</h2>
            <div class="group">
                <div class="maintenance-pd">
                    <h3>PCs</h3>
                    <img src="./IMAGES/prpc.jpg" alt="PC Gamer">
                    <p>El mantenimiento predictivo en una CPU de escritorio se basa en el monitoreo...</p>
                    <p class="price">S/ 50,00</p>
                    <button onclick="location.href='index.php'">Solicitar servicio</button>
                </div>
                <div class="maintenance-pd">
                    <h3>Laptops</h3>
                    <img src="./IMAGES/prlap.jpg" alt="Laptop">
                    <p>El mantenimiento predictivo en laptops se basa en el uso de herramientas de monitoreo...</p>
                    <p class="price">S/ 60,00</p>
                    <button onclick="location.href='index.php'">Solicitar servicio</button>
                </div>
                <div class="maintenance-pd">
                    <h3>Impresoras</h3>
                    <img src="./IMAGES/primp.jpg" alt="Impresora">
                    <p>El mantenimiento predictivo en impresoras se basa en el análisis de datos como...</p>
                    <p class="price">S/ 70,00</p>
                    <button onclick="location.href='index.php'">Solicitar servicio</button>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 Tienda INFOTEC | Todos los derechos reservados</p>
    </footer>
</body>
</html>
