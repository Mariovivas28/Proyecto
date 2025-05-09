<?php
require 'conexion.php'; // Conexión a la base de datos
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo_consulfalta.css">
    <title>Consulta de Faltas</title>
</head>
<body>
    <div class="consulta-container">
        <h1>Consulta de Faltas</h1>
        
        <!-- Formulario de búsqueda -->
        <form method="POST" class="form-busqueda">
            <label for="matricula">Matrícula:</label>
            <input type="text" id="matricula" name="matricula">
            
            <label for="grupo">Grupo:</label>
            <input type="text" id="grupo" name="grupo">
            
            <label for="especialidad">Especialidad:</label>
            <input type="text" id="especialidad" name="especialidad">
            
            <button type="submit">Buscar</button>
        </form>

        <!-- Tabla de Faltas -->
        <table>
            <thead>
                <tr>
                    <th>Matrícula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Grupo</th>
                    <th>Especialidad</th>
                    <th>Fecha</th>
                    <th>Justificada</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $matricula = isset($_POST['matricula']) ? trim($_POST['matricula']) : '';
                $grupo = isset($_POST['grupo']) ? trim($_POST['grupo']) : '';
                $especialidad = isset($_POST['especialidad']) ? trim($_POST['especialidad']) : '';

                // Construir la consulta SQL
                $sql = "SELECT 
                            alumno.matricula, 
                            alumno.nombre, 
                            alumno.apellido, 
                            grupo.codigo_grupo AS grupo, 
                            grupo.especialidad, 
                            faltas.fecha, 
                            IF(faltas.justificada = 1, 'Sí', 'No') AS justificada
                        FROM faltas
                        INNER JOIN alumno ON faltas.matricula = alumno.matricula
                        INNER JOIN grupo ON alumno.codigo_grupo = grupo.codigo_grupo
                        WHERE 1=1";

                if (!empty($matricula)) {
                    $sql .= " AND alumno.matricula = ?";
                }
                if (!empty($grupo)) {
                    $sql .= " AND grupo.codigo_grupo LIKE ?";
                }
                if (!empty($especialidad)) {
                    $sql .= " AND grupo.especialidad LIKE ?";
                }

                $stmt = $conn->prepare($sql);

                // Vincular parámetros dinámicamente
                $param_types = '';
                $params = [];
                if (!empty($matricula)) {
                    $param_types .= 'i';
                    $params[] = $matricula;
                }
                if (!empty($grupo)) {
                    $param_types .= 's';
                    $params[] = "%$grupo%";
                }
                if (!empty($especialidad)) {
                    $param_types .= 's';
                    $params[] = "%$especialidad%";
                }

                // Vincular parámetros si existen
                if (!empty($params)) {
                    $stmt->bind_param($param_types, ...$params);
                }

                $stmt->execute();
                $result = $stmt->get_result();

                // Mostrar resultados en la tabla
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['matricula']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['apellido']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['grupo']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['especialidad']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['fecha']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['justificada']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No se encontraron resultados</td></tr>";
                }

                $stmt->close();
                $conn->close();
                ?>
            </tbody>
        </table>

        <!-- Botón para volver al menú principal -->
        <button class="btn btn-volver" onclick="location.href='menu_principal.php'">Menú</button>
    </div>
</body>
</html>
