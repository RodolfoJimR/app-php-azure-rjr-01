<?php
$port = 1433;
$serverName = "tcp:examserver01.database.windows.net," . $port;
$database = "RA-DB-MOVIES";
$userName = "Student";
$password = "Ra.exam3n";

try {
    $conn = new PDO("sqlsrv:server = $serverName,$port; Database = $database", $userName, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT id, nombre, lanzamiento, lenguaje FROM pelicula';

    foreach ($conn->query($sql) as $row) {
        echo $row['id'] . " | ";
        echo $row['nombre'] . " | ";
        echo $row['lanzamiento'] . " | ";
        echo $row['lenguaje'] . "<br>";
    }

    // use exec() because no results are returned
    $conn->exec($sql);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$conn = null;
