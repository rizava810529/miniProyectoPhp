<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: loginView.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_db";

try {
    $mysqli = new mysqli($servername, $username, $password, $dbname);

    if ($mysqli->mysqliect_error) {
        throw new Exception("Error de conexión a la base de datos: " . $mysqli->mysqliect_error);
    }

    $email = $_SESSION['usuario'];
    $sql = "SELECT nombre, bio, phone, password FROM usuarios WHERE email = '$email'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombre = $row['nombre'];
        $bio = $row['bio'];
        $phone = $row['phone'];
        $password = $row['password'];
    } else {
        $nombre = "Nombre no encontrado";
        $bio = "Bio no encontrada";
        $phone = "Teléfono no encontrado";
    }

    $mysqli->close();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
        <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css"
    rel="stylesheet"
    />
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
                            <h3><P>Profile</P></h3>
                            <p>Some info may be visible to other people</p>
                        </div>
                        <div class="d-flex  align-items-center m-3">
                            <a href="changeView.php" class="btn btn-outline-secondary" data-mdb-ripple-color="dark">Edit</a>
                        </div>
                    </div>
                    <div></div>
                </div>
                <div class="d-flex justify-content-between align-items-center line p-2">
                    <div>PHOTO</div>
                    <div> <img src=" " alt="" style="width: 40px; height: 40px; "></div>
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
                <div class="d-flex justify-content-between align-items-center  p-2 ">
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










    <!-- MDB -->
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"
    ></script>
</body>
</html>
