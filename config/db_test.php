<?php
require 'database.php';

if ($pdo) {
    echo "Database connected successfully.";
} else {
    echo "Failed to connect to the database.";
}
?>
