<?php
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

    // Verificar si el correo electrónico ya está registrado
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // El correo electrónico ya está registrado, redirigir a login.php
        header("Location: login.php");
        exit(); // Terminar el script para evitar que siga ejecutándose
    } else {
        // Insertar el nuevo usuario en la base de datos
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash del password
        $insert_sql = "INSERT INTO usuarios (email, password) VALUES ('$email', '$hashed_password')";
        if ($conn->query($insert_sql) === TRUE) {
            echo "Usuario creado exitosamente";
        } else {
            echo "Error al crear el usuario: " . $conn->error;
        }
    }

    $conn->close();
}
?>





<!DOCTYPE html>
<html>

<head>
    <title>crear-usuario</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
    <link href="index.css" rel="stylesheet" />
</head>

<body>
    <div class="d-flex flex-column justify-content-center align-items-center">
        <div style="width: 800px; height:auto; " class="m-5 d-flex flex-column">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6 gap-5">
                        <div class="card  line">

                            <div class="card-body">
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                                    <div class="d-flex align-items-center">

                                        <div class="d-flex  align-items-start"> <img src="/asset/logo.png" alt=""
                                                style="width: 20px; height: 15px; "></div>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <p>devchallenges</p>
                                        </div>

                                    </div>
                                    <div class="texto1">
                                        <p>join thousands of learners from</p>
                                        <p>around the world.</p>
                                    </div>
                                    <div class="texto2">
                                        <p>Master web development by making real-life </p>
                                        <p> projects. There are multiple paths for you to </p>
                                        <p>choose</p>
                                    </div>

                                    <div class="form-group m-3 inputDiv ">
                                        <img src="../../asset/email.png" alt="" style="width: 20px; height: 20px; ">
                                        <input type="email"  name="email" id="email" class="form-control texto4"
                                            placeholder="Email" required>
                                    </div>
                                    <div class="form-group m-3 inputDiv">
                                        <img src="../../asset/candado.png" alt="" style="width: 20px; height: 20px; ">
                                        <input type="password" name="password" id="password"  placeholder="Password"
                                            class="form-control texto4" required>
                                    </div>
                                    <div class="text-center m-3">
                                        <button type="submit" class="btn btn-primary btn-block texto4">star coding
                                            now</button>
                                    </div>
                                    <div class=" d-flex justify-content-center align-items-center texto4">
                                        <p>or continue with these social profile</p>
                                    </div>

                                    <div class="col-auto">
                                        <img src="/asset/redes.png" alt="" style="width: 100%; height: 15%; ">
                                    </div>

                                    <div class=" d-flex justify-content-center align-items-center texto4">
                                        <p>Already a member? <a href="login.php">Login</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="width: 900px; height:auto; " class="contenido">
        <div class="d-flex justify-content-between align-items-center margin ">
            <p>created by username</p>
            <p>devchallenges.io</p>
        </div>
    </div>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js">
    </script>

</body>

</html>