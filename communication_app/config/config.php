<?php
// Database host
$host = 'localhost';

// Database name
$db = 'communication_app';

// Database user
$user = 'root';

// Database password
$pass = '';

// Database port
$port = '3306';

// Data Source Name (DSN) specifies the host computer for the MySQL database 
$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";

// Set PDO options
$options = [
    // Throw exceptions on error
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

    // Set default fetch mode to associative array
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

    // Disable emulation of prepared statements
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    // Create a new PDO instance
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    // If an error occurs, throw an exception with the error message and error code
    throw new PDOException($e->getMessage(), (int) $e->getCode());
}
?>