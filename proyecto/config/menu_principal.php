<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo_menu.css">
    <title>Menú Principal</title>
</head>
<body>
        <div class="container">
        <div class="banner">
            <h1>Bienvenido</h1>
            <a href="../pantallas/consulta_asistencias.html" class="btn"><i class="fas fa-calendar-check"></i> Consulta de Asistencias</a>
            <a href="../pantallas/consulta_faltas.html" class="btn"><i class="fas fa-search"></i> Consulta de Faltas</a>
            <a href="../pantallas/gestion_usuarios.html" class="btn"><i class="fas fa-users-cog"></i> Gestión de Usuarios</a>
            <a href="../config/logout.php" class="btn"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
        </div>
    </div>
    <script src="../js_scripts/efectos.js"></script>
    <script src="../js_scripts/validaciones.js"></script>
    <script src="../js_scripts/funciones_generales.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

</body>
</html>
