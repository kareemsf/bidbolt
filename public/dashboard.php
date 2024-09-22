<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../controllers/login.php");
    exit();
}
?>

<?php include '../views/includes/header.php'; ?>

<h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
<p>This is your dashboard.</p>
<a href="../controllers/logout.php" class="primary-button">Logout</a>

<?php include '../views/includes/footer.php'; ?>
