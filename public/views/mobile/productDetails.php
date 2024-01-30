<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Web Page</title>
    <link rel="stylesheet" href="/public/css/dashboard-mobile.css"> <!-- You can link to an external CSS file here -->
    <link rel="stylesheet" href="/public/css/products-mobile.css">
    <link rel="stylesheet" href="/public/css/footer-mobile.css">
    <link rel="stylesheet" href="/public/css/search-list.css">
    <style>
        /* You can also include inline styles here */
    </style>
</head>
<body>
<?php include(__DIR__.'/../common/header-mobile.php'); ?>
    <main>
        <?php include(__DIR__.'/../common/productDescription.php'); ?>   
        <?php include(__DIR__.'/../common/product_add_button.php'); ?>   
    </main>
    <?php include(__DIR__.'/../common/footer-mobile.php'); ?>
    <script type="text/javascript">
        function showAddForm(){
            window.location.href = 'http://localhost:8080/addProduct';
        }
    </script>
</body>
</html>
