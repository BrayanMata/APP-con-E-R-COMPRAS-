document.addEventListener("DOMContentLoaded", () => {

    const infoVentasDiv = document.getElementById("info-ventas");
    const contenidoVentas = document.getElementById("contenido-ventas");
    const cerrarVentasBtn = document.getElementById("cerrar-ventas");

    document.querySelectorAll(".fila_producto button").forEach(btn => {
        btn.addEventListener("click", () => {
            const fila = btn.closest(".fila_producto");
            const codigo = fila.querySelector("p:first-child").textContent;

            // Llamada AJAX para obtener clientes
            fetch(`php/mostrarClientesProducto.php?codigo=${codigo}`)
                .then(response => response.text())
                .then(data => {
                    contenidoVentas.innerHTML = data;
                    infoVentasDiv.style.display = "block";
                })
                .catch(err => {
                    contenidoVentas.innerHTML = "<p>Error al cargar los clientes.</p>";
                    infoVentasDiv.style.display = "block";
                });
        });
    });

    cerrarVentasBtn.addEventListener("click", () => {
        infoVentasDiv.style.display = "none";
        contenidoVentas.innerHTML = "";
    });
});