<?php
// Conectar a la base de datos
$host = "localhost"; // Cambia si es necesario
$user = "root"; // Usuario de la base de datos
$password = "12345678"; // Contraseña de la base de datos
$database = "sistema_prueba"; // Nombre de la base de datos

$conn = new mysqli($host, $user, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo_gestusu.css">
    <title>Gestión de Usuarios</title>
</head>
<body>
    <button class="theme-toggle" onclick="toggleTheme()">Cambiar Tema</button>
    <div class="gestion-container">
        <h1>Gestión de Usuarios</h1>

        <!-- Tabla de Usuarios -->
        <table>
            <thead>
                <tr>
                    <th>ID Usuario</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Consulta para obtener los usuarios
                $sql = "SELECT id_usuario, nombre, apellidos, email FROM usuarios";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Mostrar los datos en la tabla
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id_usuario']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['apellidos']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No hay usuarios registrados</td></tr>";
                }

                // Cerrar conexión
                $conn->close();
                ?>
            </tbody>
        </table>

        <!-- Botón para regresar al menú principal -->
        <button class="btn btn-volver" onclick="location.href='menu_principal.html'">Menú</button>
    </div>
    
    <script>
        function toggleTheme() {
            document.body.classList.toggle('dark-theme');
        }
    </script>
</body>
</html>
