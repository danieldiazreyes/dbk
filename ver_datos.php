<!DOCTYPE html>
<html>
<head>
    <title>Datos Guardados</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Registros de Contactos</h1>
    
    <?php
    // Conexión a la base de datos (usa las mismas credenciales que en guardar.php)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "formulario_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Consulta SQL para obtener los datos
    $sql = "SELECT id, nombre, email, mensaje, fecha FROM contactos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Mensaje</th>
                    <th>Fecha</th>
                </tr>";

        // Mostrar cada fila de la tabla
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["nombre"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["mensaje"] . "</td>
                    <td>" . $row["fecha"] . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No hay registros aún.";
    }

    $conn->close();
    ?>
    
    <br>
    <a href="index.html">Volver al formulario</a>
</body>
</html>