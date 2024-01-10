<?php
$servername = "localhost";
$username = "root";
$password = "1wenas.321";
$dbname = "mi_basededatos";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
}

// Agregar nombre a la base de datosjj
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $sql = "INSERT INTO usuarios (nombre) VALUES ('$nombre')";
    $conn->query($sql);
}

// Mostrar contenido de la base de datos
$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row["nombre"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "La base de datos esta vacia.";
}

// Cerrar la conexión
$conn->close();
?>