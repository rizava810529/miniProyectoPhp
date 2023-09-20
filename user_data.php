<?php
session_start();

if (!isset($_SESSION["email"])) {
    // Si el usuario no está autenticado, redirígelo a la página de inicio de sesión
    header("Location: index.php");
    exit();
}

// Realiza una consulta para obtener los datos del usuario
include('db_config.php'); // Incluye la configuración de la base de datos

$email = $_SESSION["email"];
$sql = "SELECT * FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $nombre = $row["nombre"];
    $bio = $row["bio"];
    $phone = $row["phone"];
    $password = $row["password"];
} else {
    // No se encontró el usuario en la base de datos
    echo "No se encontraron datos del usuario.";
    exit();
}

$conn->close();
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/views/profile/profile.css">
</head>

<body>
    <div>
        <div class="h-100 d-flex flex-column justify-content-center align-items-center ">
            <h1 class="title">Personal Info</h1>
            <p class="title1">Basic info, like your name and photo</p>
        </div>
        <div class="card  d-flex justify-content-center align-items-center">
            <div class="card-body " style="width: 50%; height: 40%; ">
                <div>
                    <div class="d-flex  justify-content-between align-items-start line p-2">
                        <div>
                            <h3>
                                <P>Profile</P>
                            </h3>
                            <p>Some info may be visible to other people</p>
                        </div>
                        <div class="d-flex  align-items-center m-3">
                            <a href="modificar_usuario.php" class="btn btn-outline-secondary"
                                data-mdb-ripple-color="dark">Edit</a>
                        </div>
                    </div>
                    <div></div>
                </div>
                <div class="d-flex justify-content-between align-items-center line p-2">
                    <div>PHOTO</div>
                    <div> <img src="mostrar_imagen.php?usuario_id=<?php echo $id_usuario; ?>" alt="Foto del usuario">
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center line p-2">
                    <div>NAME</div>
                    <div><?php echo $nombre; ?></div>

                </div>
                <div class="d-flex justify-content-between align-items-center line p-2">
                    <div>BIO</div>
                    <div><?php echo $bio; ?></div>

                </div>
                <div class="d-flex justify-content-between align-items-center line p-2">
                    <div>PHONE</div>
                    <div><?php echo $phone; ?></div>

                </div>
                <div class="d-flex justify-content-between align-items-center line p-2">
                    <div>EMAIL</div>
                    <div><?php echo $email; ?></div>
                </div>
                <div class="d-flex justify-content-between align-items-center line p-2 ">
                    <div>PASSWORD</div>
                    <div><?php echo $password; ?></div>

                </div>



            </div>
        </div>








    </div>

    <div class="d-flex justify-content-between align-items-center  margin  p-2" style="width: 50%; height: 40%; ">
        <p>created by username</p>
        <p>devchallenges.io</p>
    </div>