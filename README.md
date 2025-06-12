# PROYECINFOT
# INFOTEC 🚀

Sitio web de tienda y soporte técnico con gestión de usuarios y administradores, desarrollado en PHP, MySQL y JavaScript.

---

## 📁 Estructura del proyecto (resumen)


---

## 📌 Funcionalidades principales

### 1. **Autenticación**
- **Registro de usuario:** `config/registro.php`
  - Valida correo único.
  - Hashea contraseña con `password_hash`.
- **Inicio de sesión:** `config/iniciar_sesion.php`
  - Verifica rol: `admin` o `usuario`.
  - Utiliza `password_verify` para contraseñas seguras.
- **Cierre de sesión:** `cerrar_sesion.php`
  - `session_unset()` y `session_destroy()` y redirección.

### 2. **Roles y Navegación**
- **Admin (`admin.php`):** panel con gestión de usuarios, productos, soporte, tickets, compras y boletas electrónicas.
- **Usuario (`usuario.php`):** panel con opciones para ver productos, solicitar soporte o comprar.

### 3. **Registro de Soporte/Tickets**
- Formulario en `solicitar_soporte.php`: categoría y descripción.
- Inserta en `tickets_soporte` si está autenticado.

### 4. **Carrito de Comercio**
- Páginas de productos (`venta_u.php`, `servicio_u.php`): muestran categorías como PCs, laptops, impresoras.
- Botones de "Comprar" redirigen a `pago.php` vía WhatsApp o pasarela de pagos.

### 5. **Pago Integrado**
- `pago.php` contiene formulario con integración PayPal.
- Botón crea orden y redirige tras captura exitosa.

### 6. **Estilos y Diseño**
- Varios CSS para cada sección (.hero, modal, layout, tablas, etc.).
- Uso de clases para organización visual, mobile responsiveness, botones CTA, etc.

### 7. **Scripts JS**
- `modal.js`: abre/cierra modal de registro e inicio de sesión.
- `panel.js`: controla la tabla dinámica de productos (agregar fila, total dinámico).

---

## 💬 Comentarios y Buenas Prácticas

- Comentarios en CSS y PHP en línea que explican el propósito del bloque o función, en lugar de redundancias.
- Seguridad en PHP: uso de `password_hash`, `password_verify`, validación, sanitización (`trim()`, `htmlspecialchars()`).
- Sesiones: rol y nombre almacenado, validación antes de permitir acceso.
- Código modular: scripts externos, separar lógica de presentación.

---

## 🚀 Requisitos & Uso

1. Instalar **XAMPP** (o similar) con PHP/MariaDB.
2. Crear base de datos e importar tablas: `usuarios`, `administrador`, `tickets_soporte`.
3. Ajustar `config/conexion.php` con credenciales.
4. Colocar proyecto dentro de `htdocs` (o carpeta equivalente).
5. Acceder desde `http://localhost/tu_proyecto/`.
6. Registrar usuario, iniciar sesión, probar roles y páginas.

---

## 🧩 Posibles Mejoras

- Añadir control de sesión inactiva y `session_regenerate_id()` en login.
- Migrar a MVC o framework (Laravel, Symfony) para mejor estructura.
- CRUD completo para productos, soporte, compras y boletas.
- Implementar validación de formularios frontend (JS) y backend.
- Agregar tratamiento de errores y logs.
- Usar Composer y PSR‑12 para estandarizar código.

---

## 📚 Licencia

Este proyecto es de uso interno/educativo; puedes adaptarlo libremente para tus necesidades.

---

### 🔗 Contacto

INFOTEC - Soporte técnico  
**WhatsApp:** +51 923 213 425  
**Email:** multiservicio.infoteccix@gmail.com  

— ¡Gracias por contribuir!
