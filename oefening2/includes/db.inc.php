<?php
// connection information
$db_host = '127.0.0.1';
$db_user = 'root';
$db_password = 'rootpass';
$db_db = 'php';
$db_port = 3306;

try {
    // create a new pdo connection
    $conn = new PDO("mysql:host=$db_host;port=$db_port;dbname=$db_db", $db_user, $db_password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
