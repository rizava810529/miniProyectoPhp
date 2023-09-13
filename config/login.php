<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="contenedor">
        <h1 class="titulo">Iniciar Sesión</h1>  
        <hr class="border">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="formulario" name="login">
            <div class="form-group">
                <i class="icono izquierda fa fa-user"></i><input type="text" name="usuario" class="usuario" placeholder="Usuario:">
            </div>
            <div class="form-group">
                <i class="icono izquierda fa fa-lock"></i><input type="password" name="password" class="password_btn" placeholder="Contraseña:">
                <i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
            </div>

            <?php if(!empty($errores)): ?>
                <div class="error">
                    <ul>
                        <?php echo $errores; ?>
                    </ul>
                </div>
            <?php endif; ?>

        </form>

        <p class="texto-registrate">
            ¿ Aún no tienes cuenta ?
            <a href="registro.php">Registrate</a>
        </p>

    </div>
</body>
</html>


<!-- 

            <?php
            // Verificar si se han enviado datos de inicio de sesión
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Obtener los valores del formulario
                $usuario = $_POST["usuario"];
                $contrasena = $_POST["contrasena"];
                
                // Aquí deberías realizar la lógica de autenticación, por ejemplo, comprobar en una base de datos si las credenciales son correctas.
                // Si las credenciales son correctas, puedes redirigir al usuario a una página de inicio.

                // Ejemplo de verificación muy básica (NO RECOMENDADA para un entorno de producción)
                if ($usuario === "usuario" && $contrasena === "contrasena") {
                    // Las credenciales son correctas, redirigir al usuario a la página de inicio
                    header("Location: pagina_de_inicio.php");
                    exit;
                } else {
                    // Las credenciales son incorrectas, mostrar un mensaje de error
                    echo "Credenciales incorrectas. Inténtalo de nuevo.";
                }
            }
?> -->









 