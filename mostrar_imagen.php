<?php
// Conecta a la base de datos
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "login_db";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtiene el ID del usuario de la URL (por ejemplo, ?usuario_id=1)
if (isset($_GET["usuario_id"])) {
    $usuario_id = $_GET["usuario_id"];
    
    // Consulta la base de datos para obtener la imagen del usuario
    $sql = "SELECT photo FROM usuarios WHERE id_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    $stmt->bind_result($photo);

    if ($stmt->fetch()) {
        // Establece los encabezados adecuados para mostrar la imagen
        header("Content-Type: image/jpeg"); // Ajusta el tipo de contenido según el formato de imagen (puede ser diferente según el formato de tu imagen)

        // Imprime los datos binarios de la imagen
        echo $photo;
    } else {
        // Si no se encuentra la imagen, muestra una imagen de reemplazo o un mensaje de error
        header("Content-Type: image/jpeg"); // Ajusta el tipo de contenido según el formato de imagen
        readfile("imagen_de_reemplazo.jpg"); // Cambia "imagen_de_reemplazo.jpg" por la ruta de tu imagen de reemplazo
    }

    $stmt->close();
    $conn->close();
} else {
    // Si no se proporciona un ID de usuario, muestra un mensaje de error
    echo "Error: No se proporcionó un ID de usuario.";
}
?>
