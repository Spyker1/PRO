<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href=".../css/login.css">
</head>
<body>
    <div class="container">
        <h2>Bienvenido, <?php echo $_SESSION['user']; ?>!</h2>
        <p>Has iniciado sesión exitosamente.</p>
        <a href="logout.php">Cerrar sesión</a>
    </div>
</body>
</html>
