<?php
// database.php

$host = '127.0.0.1';
$dbname = 'bidbolt_db';  // Update with your database name
$username = 'root';      // Use your username
$password = '';          // Use your password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
