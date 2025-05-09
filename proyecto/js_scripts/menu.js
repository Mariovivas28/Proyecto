document.addEventListener("DOMContentLoaded", () => {
    const botonesMenu = document.querySelectorAll(".menu button");

    botonesMenu.forEach(boton => {
        boton.addEventListener("click", () => {
            console.log(`Navegando a: ${boton.innerText}`);
        });
    });
});
