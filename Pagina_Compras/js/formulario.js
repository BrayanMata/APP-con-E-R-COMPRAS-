const formularios = document.querySelectorAll(".formulario");

formularios.forEach(form => {
    const titulo = form.querySelector("h2");
    const contenido = form.querySelector("form");
    contenido.style.display = "none";

    titulo.addEventListener("click", () => {
        const visible = contenido.style.display === "flex";

        formularios.forEach(f => f.querySelector("form").style.display = "none");

        if (!visible) {
            contenido.style.display = "flex";
        }
    });
});

const limits = {
    dni: 9,
    codigo: 9,
    nif: 9,
    telefono: 10
};

for (const id in limits) {
    const input = document.getElementById(id);
    if (input) {
        input.addEventListener("input", () => {
            if (input.value.length > limits[id]) {
                input.value = input.value.slice(0, limits[id]);
            }
        });
    }
}