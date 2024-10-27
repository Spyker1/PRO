<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "root"; // Cambia si es necesario
$password = ""; // Cambia si es necesario
$dbname = "prueba"; // Tu base de datos

// Crear la conexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
}

// Consultar los registros de la tabla usuarios
$sql = "SELECT nombres, apellido_paterno, apellido_materno, direccion, telefono, email FROM usuarios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".../css/consulta.css">
    <title>Lista de Usuarios</title>
</head>

<body>
<h1>Lista de Usuarios Registrados</h1>

<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Direccion</th>
            <th>Teléfono</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Mostrar los resultados
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["nombres"] . "</td>";
                echo "<td>" . $row["apellido_paterno"] . "</td>";
                echo "<td>" . $row["apellido_materno"] . "</td>";
                echo "<td>" . $row["direccion"] . "</td>";
                echo "<td>" . $row["telefono"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No hay usuarios registrados</td></tr>";
        }
        ?>
    </tbody>
</table>
</body>
</html>

<?php
$conn->close();
?>
