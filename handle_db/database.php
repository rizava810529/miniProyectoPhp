
<!-- USE ricardo;
CREATE TABLE Empleados (
    id_empleado INT PRIMARY KEY,
    nombre VARCHAR(255),
    apellido VARCHAR(255),
    edad INT,
    salario DECIMAL(10, 2)
);
 -->
<!-- // para agregar ala  base de datos
INSERT INTO card (number, name, expiration_date, security_code)
VALUES ('2345678901', 'Ricardo Zarate', '2024-09-01', '234567');
 -->

<!--  
   // para hacer consultas con where

SELECT *
FROM card
WHERE number = '2345678901';

//con un codicional

SELECT *
FROM card
WHERE number = '2345678901' AND expiration_date > CURRENT_DATE;


// para eliminar

DELETE FROM card
WHERE number = '2345678901';


// para modificar

UPDATE card
SET name = 'Nuevo Nombre'
WHERE number = '1234567890';



 -->
 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ricardo";

try {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM card";
    $result = $conn->query($sql);

    if ($result === false) {
        throw new Exception("Query error: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "Número de tarjeta: " . $row["number"] . "<br>";
            echo "Nombre: " . $row["name"] . "<br>";
            echo "Fecha de expiración: " . $row["expiration_date"] . "<br>";
            echo "Codigo seguridad: " . $row["security_code"] . "<br>";
            echo "<br>";
        }
    } else {
        echo "0 results";
    }

    $conn->close();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

