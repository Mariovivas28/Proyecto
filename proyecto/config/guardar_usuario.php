<?php
include 'conexion.php'; // Archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellido'];
    $email = $_POST['email'];
    $password = $_POST['password'] ; // Encriptar contraseña
   
    // Insertar datos en la base de datos
    $sql = "INSERT INTO usuarios (nombre, apellidos, email, password) 
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nombre, $apellidos, $email, $password);

    if ($stmt->execute()) {
        echo "<script>alert('Registro exitoso'); window.location.href='../pantallas/index.html';</script>";
    } else {
        echo "<script>alert('Error en el registro: " . $stmt->error . "');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
