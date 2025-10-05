document.addEventListener("DOMContentLoaded", () => {
    const infoDiv = document.getElementById("informacion-proveedor");
    
    document.querySelectorAll(".proveedor-info").forEach(p => {
        p.addEventListener("click", (e) => {
            const nombre = p.getAttribute("data-nombre");
            const direccion = p.getAttribute("data-direccion");

            infoDiv.innerHTML = `<strong>${nombre}</strong><br>${direccion}`;

            // Posicionar el div cerca del clic
            infoDiv.style.top  = e.pageY + 5 + "px";
            infoDiv.style.left = e.pageX + 5 + "px";
            infoDiv.style.display = "block";
        });
    });

    // Ocultar si se hace clic en cualquier otro lugar
    document.addEventListener("click", (e) => {
        if (!e.target.classList.contains("proveedor-info")) {
            infoDiv.style.display = "none";
        }
    });
});