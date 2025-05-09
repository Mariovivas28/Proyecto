    document.addEventListener("DOMContentLoaded", () => {
        const rolSelect = document.getElementById("rol");
        const camposEspecificos = document.getElementById("campos-especificos");

        rolSelect.addEventListener("change", () => {
            const rol = rolSelect.value;

            // Limpiar campos específicos
            camposEspecificos.innerHTML = "";

            if (rol === "alumno") {
                camposEspecificos.innerHTML = `
                    <input type="text" name="matricula" placeholder="Matrícula" required>
                    <input type="text" name="grado" placeholder="Grado/Curso" required>
                    <input type="text" name="grupo" placeholder="Grupo/Sección">
                    <input type="text" name="tutor" placeholder="Nombre del Tutor">
                    <input type="tel" name="telefono_tutor" placeholder="Teléfono del Tutor">
                `;
            } else if (rol === "docente") {
                camposEspecificos.innerHTML = `
                    <input type="text" name="clave_docente" placeholder="Clave Docente" required>
                    <input type="text" name="materias" placeholder="Materias que Imparte" required>
                    <input type="text" name="horario" placeholder="Horario/Turno">
                `;
            } else if (rol === "administrativo") {
                camposEspecificos.innerHTML = `
                    <input type="text" name="numero_empleado" placeholder="Número de Empleado" required>
                    <input type="text" name="cargo" placeholder="Cargo/Función" required>
                    <input type="text" name="permisos" placeholder="Permisos Especiales">
                `;
            }
        });
    });