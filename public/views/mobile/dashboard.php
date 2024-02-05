<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Web Page</title>
    <link rel="stylesheet" href="/public/css/dashboard-mobile.css"> <!-- You can link to an external CSS file here -->
    <link rel="stylesheet" href="/public/css/footer-mobile.css">
    <link rel="stylesheet" href="/public/css/mobile-profile_basic_view.css">
    <link rel="stylesheet" href="/public/css/user_product_list.css">
    <style>
        /* You can also include inline styles here */
    </style>
</head>
<body>
    <?php include(__DIR__.'/../common/header-mobile.php'); ?>
    <main>
        <div class="title">
            <div class="title-line-left"></div>
            <h3>Historia wyszukiwania</h3>
            <div class="title-line-right"></div>
        </div>
        <div class="elements">
            <div class="element-block">
                <a href="#">
                    <img src="/public/images/sloik.png" alt="sloik">
                </a>
            </div>
            <div class="element-block">
                <a href="#">
                    <img src="/public/images/sloik.png" alt="sloik">
                </a>
            </div>
            <div class="element-block">
                <a href="#">
                    <img src="/public/images/sloik.png" alt="sloik">
                </a>
            </div>
            <div class="element-block">
                <a href="#">
                    <img src="/public/images/sloik.png" alt="sloik">
                </a>
            </div>
            <div class="element-block">
                <a href="#">
                    <img src="/public/images/sloik.png" alt="sloik">
                </a>
            </div>
            <div class="element-block">
                <a href="#">
                    <img src="/public/images/sloik.png" alt="sloik">
                </a>
            </div>
        </div>
        <div class="title">
            <div class="title-line-left"></div>
            <h3>Polecane Sklepy</h3>
            <div class="title-line-right"></div>
        </div>
        <div class="elements">
            <div class="element-block">
                <a href="#">
                    <img src="/public/images/sloik.png" alt="sloik">
                </a>
            </div>
            <div class="element-block">
                <a href="#">
                    <img src="/public/images/sloik.png" alt="sloik">
                </a>
            </div>
            <div class="element-block">
                <a href="#">
                    <img src="/public/images/sloik.png" alt="sloik">
                </a>
            </div>
            <div class="element-block">
                <a href="#">
                    <img src="/public/images/sloik.png" alt="sloik">
                </a>
            </div>
            <div class="element-block">
                <a href="#">
                    <img src="/public/images/sloik.png" alt="sloik">
                </a>
            </div>
            <div class="element-block">
                <a href="#">
                    <img src="/public/images/sloik.png" alt="sloik">
                </a>
            </div>
        </div>
        <?php include(__DIR__.'/../common/user-product-list.php'); ?>
    </main>
    <?php include(__DIR__.'/../common/footer-mobile.php'); ?>
    
</body>
</html>
