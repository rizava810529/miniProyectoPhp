<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login_db";

    try {
        $mysqli = new mysqli($servername, $username, $password, $dbname);

        if ($mysqli->connect_error) {
            throw new Exception("Error de conexión a la base de datos: " . $mysqli->connect_error);
        }

        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];

        $sql = "SELECT * FROM usuarios WHERE email = '$usuario' AND password = '$contrasena'";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            $_SESSION['usuario'] = $usuario;
        
            header("Location: views/profile/profile.php");
            
            exit();
        } else {
            // Usuario no encontrado, redirigir a login
            header("Location: loginView.php");
            exit();
        }
    } catch (Exception $e) {
        // Manejar la excepción
        echo "Error: " . $e->getMessage();
    } finally {
        // Cerrar la conexión a la base de datos
        if (isset($mysqli)) {
            $mysqli->close();
        }
    }
}

?>
