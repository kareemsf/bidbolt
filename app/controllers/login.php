<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "Login script is running..."; // Ensure the script is running

// Include the database configuration
require '../../config/database.php';

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Form has been submitted."; // Ensure the form was submitted

    // Capture form input
    $email = $_POST['email'];
    $password = $_POST['password'];

    echo "Email: " . $email . " | Password: " . $password; // Show the entered data

    // Prepare SQL query
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);

    // Execute query with bound parameters
    $stmt->execute(['email' => $email]);

    // Fetch the user
    $user = $stmt->fetch();
    
    if ($user) {
        echo "User found."; // Confirm user was found
        if (password_verify($password, $user['password'])) {
            echo "Password verified!"; // Confirm password match

            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Redirect to dashboard after successful login
            header("Location: ../../public/dashboard.php");
            exit();
        } else {
            echo "Incorrect password!"; // Incorrect password
        }
    } else {
        echo "No user found with that email!"; // No user found
    }
} else {
    echo "Form not submitted yet."; // Form was not submitted
}
