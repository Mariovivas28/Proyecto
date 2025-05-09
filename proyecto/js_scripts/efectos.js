// efectos.js
document.addEventListener("DOMContentLoaded", () => {
    const botones = document.querySelectorAll("button");

    botones.forEach(boton => {
        // Escala el botón al pasar el ratón
        boton.addEventListener("mouseover", () => {
            boton.style.transform = "scale(1.1)";
            boton.style.transition = "transform 0.3s ease";
        });

        boton.addEventListener("mouseout", () => {
            boton.style.transform = "scale(1)";
        });

        // Cambia de color al hacer clic
        boton.addEventListener("click", () => {
            boton.style.backgroundColor = "#00cc00";
            setTimeout(() => {
                boton.style.backgroundColor = "#00ff00";
            }, 200);
        });
    });
});
