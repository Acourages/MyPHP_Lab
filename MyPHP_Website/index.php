<?php
define('INDEX', true);

// Strict error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Safe page routing
$allowed_pages = ['home', 'projects', 'contact', 'about'];
$page = isset($_GET['page']) && in_array($_GET['page'], $allowed_pages) ? $_GET['page'] : 'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arshan's Portfolio</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="site-wrapper">
        <?php include 'includes/header.php'; ?>

        <main class="main-content">
            <?php
            $page_file = "pages/{$page}.php";
            if(file_exists($page_file)) {
                include $page_file;
                echo "";
            } else {
                include 'pages/404.php';
            }
            ?>
        </main>

        <?php include 'includes/footer.php'; ?>
    </div>
    <script src="assets/js/scripts.js"></script>
</body>
</html>
