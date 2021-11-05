<?php
$port = 1433;
$serverName = "tcp:YOUR_SQL_AZURE_URL," . $port;
$database = "mySQLDataBase";
$userName = "student-azure";
$password = "myServerSQL#";

try {
    $conn = new PDO("sqlsrv:server = $serverName,$port; Database = $database", $userName, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT id, firstname, lastname, email, reg_date FROM MyGuests ORDER BY lastname';

    foreach ($conn->query($sql) as $row) {
        echo $row['id'] . " | ";
        echo $row['firstname'] . " | ";
        echo $row['lastname'] . " | ";
        echo $row['email'] . " | ";
        echo $row['reg_date'] . "<br>";
    }

    // use exec() because no results are returned
    $conn->exec($sql);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$conn = null;
