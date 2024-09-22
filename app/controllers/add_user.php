<?php
// controllers/add_user.php
require '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute(['username' => $username, 'email' => $email, 'password' => $password])) {
        echo "User added successfully!";
    } else {
        echo "Error adding user!";
    }
}
?>

<?php include '../views/includes/header.php'; ?>

<h2>Add User</h2>
<form method="POST" action="">
    <label>Username:</label>
    <input type="text" name="username" required><br>
    <label>Email:</label>
    <input type="email" name="email" required><br>
    <label>Password:</label>
    <input type="password" name="password" required><br>
    <button type="submit">Add User</button>
</form>

<?php include '../views/includes/footer.php'; ?>
