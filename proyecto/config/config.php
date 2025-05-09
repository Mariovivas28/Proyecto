<?php
$host = 'localhost'; // Nombre del host
$db = 'sistema_prueba'; // Nombre de la base de datos
$user = 'root'; // Nombre de usuario de la base de datos
$pass = '12345678'; // Contraseña de la base de datos

// Crear una conexión
$conn = new mysqli($host, $user, $pass, $db);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>