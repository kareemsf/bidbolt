
<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: /bidbolt/app/controllers/login.php');
    exit();
}

$vendor_badges = [
    'Top Rated Vendor' => 'Rating above 4.5',
    'Most Active Vendor' => 'Completed most contracts',
];

$user_badges = [
    'Top Reviewer' => 'Written 10+ reviews',
    'Most Engaged' => 'Highest interaction score',
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor & User Badges</title>
    <link rel="stylesheet" href="/bidbolt/public/css/assets/style.css">
</head>
<body>
    <?php include '../app/views/includes/header.php'; ?>
    <h1>Vendor & User Badges</h1>
    <h2>Vendor Badges</h2>
    <ul>
        <?php foreach ($vendor_badges as $badge => $description): ?>
            <li><?php echo $badge . ": " . $description; ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>User Badges</h2>
    <ul>
        <?php foreach ($user_badges as $badge => $description): ?>
            <li><?php echo $badge . ": " . $description; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
