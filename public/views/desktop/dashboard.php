<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Web Page</title>
    <link rel="stylesheet" href="/public/css/dashboard-desktop.css"> <!-- You can link to an external CSS file here -->
    <link rel="stylesheet" href="/public/css/search-list.css">
    <link rel="stylesheet" href="/public/css/header-desktop.css">
    <script defer src="/public/js/dashboard-desktop.js"></script>
    <style>
        /* You can also include inline styles here */
    </style>
</head>
<body>
    <?php include(__DIR__.'/../common/header-desktop.php'); ?>
    <main>
        <?php include(__DIR__.'/../common/productSearch.php'); ?>
        <div class="vertical-line"></div>
        <?php include(__DIR__.'/../common/shopSearch.php'); ?>
    </main>
</body>
</html>
