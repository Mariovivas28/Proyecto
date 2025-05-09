// validaciones.js
document.addEventListener("DOMContentLoaded", () => {
    const formularios = document.querySelectorAll("form");

    formularios.forEach(formulario => {
        formulario.addEventListener("submit", (event) => {
            const inputs = formulario.querySelectorAll("input[required], select[required]");
            let esValido = true;

            inputs.forEach(input => {
                if (input.value.trim() === "") {
                    alert(`El campo "${input.placeholder || input.name}" es obligatorio.`);
                    esValido = false;
                }

                // Validación adicional para correos electrónicos
                if (input.type === "email" && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(input.value)) {
                    alert("Por favor, introduce un correo electrónico válido.");
                    esValido = false;
                }

                // Validación de contraseñas
                if (input.type === "password") {
                    const password = input.value;
                    const tieneMinimo6Caracteres = password.length >= 6;
                    const tieneMayuscula = /[A-Z]/.test(password);
                    const tieneSimbolo = /[-¡?*_>~]/.test(password);

                    if (!tieneMinimo6Caracteres || (!tieneMayuscula && !tieneSimbolo)) {
                        alert(
                            "La contraseña debe tener al menos 6 caracteres y contener al menos una letra mayúscula o un símbolo (-, ¡, ?, *, _, >, ~)."
                        );
                        esValido = false;
                    }
                }
            });

            // Validar que se haya seleccionado un rol en el menú desplegable
            const select = formulario.querySelector("select[required]");
            if (select && select.value.trim() === "") {
                alert("Por favor, selecciona un rol (Alumno, Docente o Administrativo).");
                esValido = false;
            }

            if (!esValido) {
                event.preventDefault(); // Detener el envío si hay errores
            }
        });
    });
});
