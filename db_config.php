<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "login_db";

try {
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if ($conn->connect_error) {
        throw new Exception("Error de conexión: " . $conn->connect_error);
    }
} catch (Exception $e) {
    // Manejo de la excepción
    echo "Error: " . $e->getMessage();
    // Aquí puedes realizar otras acciones, como registrar el error en un archivo de registro.
}
?>
