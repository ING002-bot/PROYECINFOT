<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicio Técnico - INFOTEC</title>
    <link rel="stylesheet" href="./CSS/nosotros.css">
    
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    
    <style>
        #map {
        height: 280px;              /* Altura más baja para que no invada el footer */
        width: 95%;                 /* Ancho reducido para que no sobresalga lateralmente */
        margin: 20px auto 10px auto;/* Margen inferior reducido */
        border-radius: 10px;
        border: none;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); /* Estética ligera */
    }

    </style>
</head>
<body>
    <header>
        <h1>INFOTEC</h1>
        <nav>
            <ul>
                <li><a href="usuario.php">Atras</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="us">
            <h2>🧾 Nosotros</h2>
            <div class="group">
                <div class="p">
                <p>
                En <strong>INFOTEC</strong> nos dedicamos con pasión al mundo de la tecnología. Somos una empresa especializada en la venta de computadoras, laptops, impresoras, accesorios y servicios técnicos, orientados a ofrecer soluciones confiables, eficientes y personalizadas a cada cliente.
                <br><br>
                Con años de experiencia en el rubro y un equipo de técnicos calificados, brindamos atención profesional tanto a usuarios particulares como a empresas. Nos enorgullece ofrecer productos de calidad, asesoramiento experto y un servicio postventa que garantiza tu tranquilidad.
                <br><br>
                En INFOTEC creemos que la tecnología debe estar al alcance de todos, por eso trabajamos para ofrecerte lo mejor en rendimiento, precio y soporte técnico.
                <br><br>
                ¡Tu confianza nos impulsa a seguir creciendo!
                </p>
                </div>
            </div>
        </section>


        <section id="contacts">
            <h2>📞 Contacto</h2>
            <div class="group">
                <div class="p">
                    <p>
                        📍 Dirección: Ca. Los Mangos #401 V Sector Villa Hermosa-JLO-CIX<br>
                        📞 WhatsApp: +51 923 213 425<br>
                        📧 Email: multiservicio.infoteccix@gmail.com<br>
                        ⏰ Lunes a sábado, de 8:00 a.m. a 8:00 p.m.
                    </p>
                    <div id="map"></div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Tienda INFOTEC | Todos los derechos reservados</p>
    </footer>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        const map = L.map('map').setView([-6.7737, -79.8409], 17);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors',
        }).addTo(map);

        L.marker([-6.7737, -79.8409])
            .addTo(map)
            .bindPopup('<b>INFOTEC</b><br>Ca. Los Mangos #401<br>Villa Hermosa, JLO, Chiclayo')
            .openPopup();
    </script>
</body>
</html>
