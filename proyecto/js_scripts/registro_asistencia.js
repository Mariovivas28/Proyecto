document.addEventListener("DOMContentLoaded", () => {
    const tabla = document.getElementById("registroTabla");
    const btnBuscar = document.getElementById("btnBuscar");

    // Función para buscar registros (simulación)
    const buscarRegistros = () => {
        const fecha = document.getElementById("fecha").value;
        const nombre = document.getElementById("nombre").value.trim();

        // Simular registros encontrados (ejemplo)
        const registros = [
            { fecha: "2024-12-01", nombre: "Juan Pérez", rol: "Alumno", estado: "Presente" },
            { fecha: "2024-12-02", nombre: "María López", rol: "Docente", estado: "Tarde" }
        ];

        // Filtrar registros
        const filtrados = registros.filter(registro => {
            return (
                (!fecha || registro.fecha === fecha) &&
                (!nombre || registro.nombre.toLowerCase().includes(nombre.toLowerCase()))
            );
        });

        // Renderizar registros en la tabla
        tabla.innerHTML = "";
        filtrados.forEach(registro => {
            const fila = document.createElement("tr");
            fila.innerHTML = `
                <td>${registro.fecha}</td>
                <td>${registro.nombre}</td>
                <td>${registro.rol}</td>
                <td>${registro.estado}</td>
                <td><button class="btn">Editar</button></td>
            `;
            tabla.appendChild(fila);
        });

        if (filtrados.length === 0) {
            tabla.innerHTML = "<tr><td colspan='5'>No se encontraron registros</td></tr>";
        }
    };

    // Evento del botón de búsqueda
    btnBuscar.addEventListener("click", buscarRegistros);
});
