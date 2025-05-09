<?php
// Conexión a la base de datos
include '../config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricula = $_POST['matricula'];
    $fecha = $_POST['fecha'];
    $estado = $_POST['estado'];

    // Consulta SQL para insertar una nueva asistencia
    $sql = "INSERT INTO asistencias (matricula, fecha, estado) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $matricula, $fecha, $estado);

    if ($stmt->execute()) {
        echo "<script>alert('Asistencia registrada exitosamente'); window.location.href='../pantallas/consulta_asistencias.html';</script>";
    } else {
        echo "<script>alert('Error al registrar la asistencia');</script>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo_registroasis.css">
    <title>Consulta de Asistencias</title>
</head>
<body>
    <button class="theme-toggle" onclick="toggleTheme()">Cambiar Tema</button>
    <div class="registro-container">
        <h1>Consulta de Asistencias</h1>

        <!-- Formulario de Registro de Asistencia -->
        <form action="registro_asistencias.php" method="POST">
            <div class="form-group">
                <label for="matricula">Matrícula</label>
                <input type="number" id="matricula" name="matricula" required>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" id="fecha" name="fecha" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <select id="estado" name="estado" required>
                    <option value="Asistió">Asistió</option>
                    <option value="Faltó">Faltó</option>
                    <option value="Justificada">Justificada</option>
                </select>
            </div>
            <button type="submit" class="btn">Guardar</button>
        </form>

        <!-- Botón para volver al menú principal -->
        <button class="btn btn-volver" onclick="location.href='menu_principal.html'">Menú</button>
    </div>
    <script>
        function toggleTheme() {
            document.body.classList.toggle('dark-theme');
        }
    </script>
</body>
</html>