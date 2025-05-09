<?php
session_start();
require 'conexion.php'; // Archivo de conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($email) && !empty($password)) {
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            // Verificar la contraseña
		if ($password === $row['password']) { 	// Si la contraseña está encriptada
                $_SESSION['user_email'] = $row['email'];
                header("Location: menu_principal.php"); // Página a la que se redirige si el inicio de sesión es exitoso
                exit();
            } else {
                echo "<script>alert('Contraseña incorrecta'); window.location.href='../pantallas/index.html';</script>";
            }
        } else {
            echo "<script>alert('Usuario no encontrado'); window.location.href='../pantallas/index.html';</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Por favor, completa todos los campos'); window.location.href='../pantallas/index.html';</script>";
    }
    $conn->close();
} else {
    header("Location: ../pantallas/index.html");
    exit();
}
?>

