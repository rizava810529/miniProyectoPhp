
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
$host = "localhost";
$username = "root";
$password = "";
$database = "login_db";

try {
    $mysqli = new mysqli($host, $username, $password, $database);

    if ($mysqli->connect_error) {
        throw new Exception("Error de conexión: " . $mysqli->connect_error);
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

