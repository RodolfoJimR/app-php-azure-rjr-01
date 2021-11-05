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

    // sql to create table
    $sql = "CREATE TABLE MyGuests (
        id INT PRIMARY KEY IDENTITY (1, 1),
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date DATETIME NULL DEFAULT switchoffset (CONVERT(datetimeoffset, GETDATE()), '-05:00')
        );";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table MyGuests created successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$conn = null;
