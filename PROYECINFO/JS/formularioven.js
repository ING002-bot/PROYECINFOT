document.addEventListener("DOMContentLoaded", () => {
  const tabla = document.querySelector("#tablaProductos tbody");
  const totalGeneral = document.getElementById("totalGeneral");
  const btnAgregar = document.getElementById("agregarProducto");

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

    fila.querySelector(".cantidad").addEventListener("input", actualizarTotal);
    fila.querySelector(".precio").addEventListener("input", actualizarTotal);
    fila.querySelector(".eliminar").addEventListener("click", () => {
      fila.remove();
      actualizarTotal();
    });

    actualizarTotal();
  }

  btnAgregar.addEventListener("click", agregarFila);
  agregarFila(); // agrega una fila al inicio
});
