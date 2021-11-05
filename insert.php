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

    $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Ivetthe', 'Lugo', 'ilugo@mystoreonline.com')";
    $sql .= "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Guadalupe', 'Lozada', 'glozada@mystoreonline.com')";
    $sql .= "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('David', 'Olguin', 'dolguin@mystoreonline.com')";
    $sql .= "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Verónica', 'García', 'vgarcia@mystoreonline.com')";
    $sql .= "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Manuel', 'Fernández', 'mfernandez@mystoreonline.com')";
    $sql .= "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Belem', 'Bazan', 'bbazan@mystoreonline.com')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$conn = null;
