document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("loginForm");
    const btnAlumno = document.getElementById("btnAlumno");
    const btnDocente = document.getElementById("btnDocente");
    const adminPassword = document.getElementById("adminPassword");

    btnAlumno.addEventListener("click", () => {
        form.action = "pantallas/alumno.html";
        alert("Ingresarás como Alumno");
        form.submit();
    });

    btnDocente.addEventListener("click", () => {
        form.action = "pantallas/docente.html";
        alert("Ingresarás como Docente");
        form.submit();
    });

    form.addEventListener("submit", (event) => {
        const email = document.getElementById("email").value.trim();
        const password = document.getElementById("password").value.trim();
        const adminPass = adminPassword.value.trim();

        // Validar correo
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert("Por favor, introduce un correo electrónico válido.");
            event.preventDefault();
            return;
        }

        // Validar contraseña
        if (password.length < 6) {
            alert("La contraseña debe tener al menos 6 caracteres.");
            event.preventDefault();
            return;
        }

        // Validar contraseña de administrador
        if (adminPass === "admin123") {
            alert("Ingresarás como Administrador");
            form.action = "pantallas/administrador.html";
        } else if (adminPass) {
            alert("Contraseña de administrador incorrecta.");
            event.preventDefault();
        }
    });
});