<?php
session_start(); // Iniciar la sesión
$bio = "";
$phone = "";
// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php"); // Redirigir al usuario a la página de inicio de sesión si no ha iniciado sesión
    exit();
}

// Obtener los datos del usuario de la base de datos
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "login_db";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$usuario_email = $_SESSION["usuario"];

$sql = "SELECT * FROM usuarios WHERE email = '$usuario_email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row["Name"];
    $bio = $row["bio"];
    $phone = $row["phone"];
    $email = $row["email"];
    $password = $row["password"];
    $photo = $row["photo"];
} else {
    die("Error: Usuario no encontrado");
}

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
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

        <div>
            <h2>Dashboard</h2>
        </div>
        <div class="h-100  d-flex justify-content-between align-items-center">
            <p>Bienvenido</p>

        </div>
        <div>
            <p>Foto: 
            </p>
            <img src="mostrar_imagen.php?usuario_id=<?php echo $row["id_usuario"]; ?>" alt="Foto del usuario" class="img-fluid w-25">


        </div>
        <div class="gap-5">
            <p>Nombre: <?php echo $name; ?></p>
        </div>
        <div>
            <p>Bio: <?php echo $bio; ?></p>
        </div>
        <div>
            <p>Teléfono: <?php echo $phone; ?></p>
        </div>
        <div>
            <p>Email: <?php echo $email; ?></p>
        </div>


        <div class="h-100 d-flex justify-content-end align-items-center">
            <a href="editar_usuario.php" class="btn btn-primary">Editar</a>
        </div>









    </div>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>

</body>

</html>