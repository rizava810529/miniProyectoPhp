<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php"); // Redirigir al usuario a la página de inicio de sesión si no ha iniciado sesión
    exit();
}

$bio = "";
$phone = "";
$target_dir = "uploads/";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "login_db";

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $name = $_POST["name"];
    $bio = $_POST["bio"];
    $phone = $_POST["phone"];
    $email = $_SESSION["usuario"];

    // Obtener la información del archivo de imagen
    $nombre_imagen = $_FILES["imagen"]["name"];
    $tipo_imagen = $_FILES["imagen"]["type"];
    $datos_imagen = file_get_contents($_FILES["imagen"]["tmp_name"]);

    // Actualizar los datos del usuario y la imagen en la base de datos
    $update_sql = "UPDATE usuarios SET Name = ?, bio = ?, phone = ?, photo = ? WHERE email = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("ssbss", $name, $bio, $phone, $datos_imagen, $email);

    if ($stmt->execute()) {
        // Redirigir al usuario a dashboard.php después de guardar los cambios
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error al actualizar los datos: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "login_db";

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $usuario_email = $_SESSION["usuario"];

    // Obtener los datos del usuario de la base de datos
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario_email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row["Name"];
        $bio = $row["bio"];
        $phone = $row["phone"];
    } else {
        die("Error: Usuario no encontrado");
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Editar Usuario</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Info</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/dashboard.css">
</head>

<body>
    <div class="d-flex flex-column justify-content-center align-items-start m-5 p-3 border">
        <h2>Editar Usuario</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
            <label for="name">Nombre:</label>
            <input type="text" name="name" value="<?php echo $name; ?>" required><br><br>

            <label for="bio">Bio:</label>
            <textarea name="bio"><?php echo $bio; ?></textarea><br><br>

            <label for="phone">Teléfono:</label>
            <input type="text" name="phone" value="<?php echo $phone; ?>"><br><br>

            <label for="photo">Foto de perfil:</label>
            
            <input type="file" name="imagen" accept="image/*" required>
                
            

            <input type="submit" value="Guardar Cambios Subir Imagen">
        </form>
        <p><a href="dashboard.php">Volver al Dashboard</a></p>
    </div>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
</body>

</html>