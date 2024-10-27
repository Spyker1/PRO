<?php
// Incluir la conexión a la base de datos (comentar si ya está incluida en otro archivo)
//include 'db.php';
$servername = "localhost";
$username = "root"; // Usuario de MySQL
$password = ""; // Contraseña de MySQL
$dbname = "prueba";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$email = $_POST['email'];
$password = md5($_POST['password']); // Usando MD5 (considera usar password_hash en producción)

// Consulta para verificar si el usuario existe
$sql = "SELECT * FROM usuarios WHERE email = '$email' AND contrasena = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Inicio de sesión exitoso
    session_start();
    $_SESSION['user'] = $email; // Guarda el email del usuario en la sesión
    header("Location: welcome.php"); // Redirige a la página de bienvenida
} else {
    // Error de inicio de sesión
    header("Location: login.php?error=Credenciales incorrectas.");
}

// Cerrar la conexión
$conn->close();
?>
