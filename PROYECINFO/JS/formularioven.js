document.addEventListener("DOMContentLoaded", () => {
  const tabla = document.querySelector("#tablaProductos tbody");
  const totalGeneral = document.getElementById("totalGeneral");
  const btnAgregar = document.getElementById("agregarProducto");

  /**
   * Calcula y actualiza los subtotales de cada fila y el total general.
   * Se llama cuando cambia cantidad o precio, o al eliminar/agregar filas.
   */
  function actualizarTotal() {
    let total = 0;
    tabla.querySelectorAll("tr").forEach(row => {
      const cantidad = parseFloat(row.querySelector(".cantidad").value) || 0;
      const precio = parseFloat(row.querySelector(".precio").value) || 0;
      const subtotal = cantidad * precio;
      row.querySelector(".subtotal").textContent = subtotal.toFixed(2);
      total += subtotal;
    });
    totalGeneral.textContent = total.toFixed(2);
  }

  /**
   * Crea una nueva fila en la tabla de productos con listeners:
   * – recalcula total al cambiar cantidad o precio.
   * – elimina la fila y actualiza total al presionar "X".
   */
  function agregarFila() {
    const fila = document.createElement("tr");
    fila.innerHTML = `
      <td><input type="text" name="producto[]" required></td>
      <td><input type="number" name="cantidad[]" class="cantidad" value="1" min="1" required></td>
      <td><input type="number" name="precio[]" class="precio" step="0.01" value="0.00" required></td>
      <td>S/ <span class="subtotal">0.00</span></td>
      <td><button type="button" class="eliminar">X</button></td>
    `;
    tabla.appendChild(fila);

    // Listeners para recalcular el total dinámicamente
    fila.querySelector(".cantidad").addEventListener("input", actualizarTotal);
    fila.querySelector(".precio").addEventListener("input", actualizarTotal);
    fila.querySelector(".eliminar").addEventListener("click", () => {
      fila.remove();
      actualizarTotal();
    });

    actualizarTotal(); // Actualiza total tras agregar fila
  }

  // Listener para el botón de agregar nueva fila
  btnAgregar.addEventListener("click", agregarFila);

  // Agrega una fila vacía al cargar la página
  agregarFila();
});
