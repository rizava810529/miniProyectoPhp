<?php
session_start(); // Iniciar la sesión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "login_db";

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $email = $_POST["email"];
    $password = $_POST["password"];

    // Verificar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // Las credenciales son válidas, iniciar sesión
            $_SESSION["usuario"] = $row["email"];
            header("Location: dashboard.php"); // Redirigir al panel de control o página principal después de iniciar sesión
            exit();
        } else {
            $error_message = "Contraseña incorrecta";
        }
    } else {
        $error_message = "Usuario no encontrado";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
    <link href="loginView.css" rel="stylesheet" />
    <link href="login.css" rel="stylesheet" />
</head>
<body>
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <div style="width: 900px; height:auto; " class="m-5">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6 gap-5">
                        <div class="card ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-start"> <img src="/assets/logo.png" alt="" style="width: 20px; height: 15px; "></div>
                                    <div class="d-flex justify-content-center align-items-center"><p>devchallenges</p></div>
                                </div>
                                <div class="texto1">
                                    <p>Login</p>
                                </div>
                                <?php if (isset($error_message)) { ?>
                                <p><?php echo $error_message; ?></p>
                                <?php } ?>
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" required><br><br>
                                    <label for="password">Contraseña:</label>
                                    <input type="password" name="password" required><br><br>
                                    <input type="submit" value="Login">
                                </form>
                                <div class="d-flex justify-content-center align-items-center texto4">
                                    <p>or continue with these social profiles</p>
                                </div>
                                <div class="col-auto">
                                    <img src="/assets/redes.png" alt="" style="width: 100%; height: 15%; ">
                                </div>
                                <div class="d-flex justify-content-center align-items-center texto4">
                                    <p>Already a member? <a href="index.php">Register</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center texto4 gap">
            <p>created by <u>username</u> </p>
            <P>devChallenges.io</P>
        </div>
    </div>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
</body>
</html>
