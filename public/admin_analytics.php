
<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: /bidbolt/app/controllers/login.php');
    exit();
}

$behavioral_data = [
    'most_viewed_pages' => ['Vendor List', 'Service Page', 'User Profile'],
    'frequent_searches' => ['Construction Vendors', 'Electrical Services', 'Top Vendors'],
];

$predictive_data = [
    'churn_prediction' => '5% users may churn next month.',
    'vendor_growth' => 'Vendor signups projected to increase by 12%.',
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics Dashboard</title>
    <link rel="stylesheet" href="/bidbolt/public/css/assets/style.css">
</head>
<body>
    <?php include '../app/views/includes/header.php'; ?>
    <h1>Analytics Dashboard</h1>
    
    <h2>Behavioral Data</h2>
    <ul>
        <?php foreach ($behavioral_data['most_viewed_pages'] as $page): ?>
            <li><?php echo $page; ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Frequent Searches</h2>
    <ul>
        <?php foreach ($behavioral_data['frequent_searches'] as $search): ?>
            <li><?php echo $search; ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Predictive Analytics</h2>
    <p>Churn Prediction: <?php echo $predictive_data['churn_prediction']; ?></p>
    <p>Vendor Growth: <?php echo $predictive_data['vendor_growth']; ?></p>
</body>
</html>
