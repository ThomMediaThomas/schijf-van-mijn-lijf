<!doctype html>
<html lang="NL">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Schijf van m'n lijf</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link rel="stylesheet" href="css/main.css">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <meta name="mobile-web-app-capable" content="yes">
        <!-- Chrome, Firefox OS and Opera -->
        <meta name="theme-color" content="#0c82f0">
        <!-- Windows Phone -->
        <meta name="msapplication-navbutton-color" content="#0c82f0">
        <!-- iOS Safari -->
        <meta name="apple-mobile-web-app-status-bar-style" content="#0c82f0">
    </head>
    <body>
        <div id="main">
            <?php //replace /schijf/ to /frontend/ ?>
            <?php include(dirname(__DIR__).'/frontend/templates/elements/header.php'); ?>
            <div id="page" data-bind="template: { name: $root.pageTemplate }"></div>
            <?php include(dirname(__DIR__).'/frontend/templates/elements/footer.php'); ?>
        </div>
        <?php include(dirname(__DIR__).'/frontend/templates/pages/overlays/splash.php'); ?>
        <?php include(dirname(__DIR__).'/frontend/templates/pages/overlays/loading.php'); ?>
        <?php include(dirname(__DIR__).'/frontend/templates/pages/overlays/notification.php'); ?>
        <?php include(dirname(__DIR__).'/frontend/templates/elements/navigation.php'); ?>
        <?php include(dirname(__DIR__).'/frontend/templates/pages/overlays/entry.php'); ?>
        <?php include(dirname(__DIR__).'/frontend/templates/pages/overlays/add-entry.php'); ?>
        <?php include(dirname(__DIR__).'/frontend/templates/pages/overlays/add-meal.php'); ?>

        <?php include(dirname(__DIR__).'/frontend/templates/pages/login.php'); ?>
        <?php include(dirname(__DIR__).'/frontend/templates/pages/register.php'); ?>
        <?php include(dirname(__DIR__).'/frontend/templates/pages/entries.php'); ?>
        <?php include(dirname(__DIR__).'/frontend/templates/pages/profile.php'); ?>
        <?php include(dirname(__DIR__).'/frontend/templates/pages/progress.php'); ?>
        <?php include(dirname(__DIR__).'/frontend/templates/pages/calculator.php'); ?>
        <?php include(dirname(__DIR__).'/frontend/templates/pages/disclaimer.php'); ?>
        <?php include(dirname(__DIR__).'/frontend/templates/pages/help.php'); ?>
        <?php include(dirname(__DIR__).'/frontend/templates/pages/add-product.php'); ?>
        <?php include(dirname(__DIR__).'/frontend/templates/elements/entries/product.php'); ?>
        <?php include(dirname(__DIR__).'/frontend/templates/elements/entries/meal.php'); ?>
        <?php include(dirname(__DIR__).'/frontend/templates/elements/entries/quick.php'); ?>
        <script src="js/vendor/jquery-3.2.1.min.js"></script>
        <script src="js/vendor/jquery-ui.min.js"></script>
        <script src="js/vendor/underscore-1.8.3.min.js"></script>
        <script src="js/vendor/knockout-3.4.2.js"></script>
        <script src="js/vendor/moment.js"></script>

        <script src="js/app/helpers/authentication.js"></script>
        <script src="js/app/helpers/ajax.js"></script>
        <script src="js/app/helpers/general.js"></script>
        <script src="js/app/helpers/form-validator.js"></script>
        <script src="js/app/config.js"></script>
        <script src="js/app/loaded-config.js"></script>
        <script src="js/app/application.js"></script>

        <script src="js/app/models/brand.js"></script>
        <script src="js/app/models/category.js"></script>
        <script src="js/app/models/daypart.js"></script>
        <script src="js/app/models/entry.js"></script>
        <script src="js/app/models/portion.js"></script>
        <script src="js/app/models/product.js"></script>
        <script src="js/app/models/subcategory.js"></script>
        <script src="js/app/models/user.js"></script>
        <script src="js/app/models/meal.js"></script>
        <script src="js/app/models/page.js"></script>
        <script src="js/app/models/program.js"></script>

        <script src="js/app/elements/navigation.js"></script>
        <script src="js/app/elements/footer.js"></script>

        <script src="js/app/pages/login.js"></script>
        <script src="js/app/pages/register.js"></script>
        <script src="js/app/pages/overlays/loading.js"></script>
        <script src="js/app/pages/overlays/notification.js"></script>
        <script src="js/app/pages/overlays/splash.js"></script>
        <script src="js/app/pages/overlays/entry.js"></script>
        <script src="js/app/pages/overlays/add-entry/from-product.js"></script>
        <script src="js/app/pages/overlays/add-entry/from-quick.js"></script>
        <script src="js/app/pages/overlays/add-entry/from-meal.js"></script>
        <script src="js/app/pages/overlays/add-entry.js"></script>
        <script src="js/app/pages/overlays/add-meal.js"></script>
        <script src="js/app/pages/entries.js"></script>
        <script src="js/app/pages/calculator.js"></script>
        <script src="js/app/pages/progress.js"></script>
        <script src="js/app/pages/profile.js"></script>
        <script src="js/app/pages/add-product.js"></script>

        <script src="js/main.js"></script>
    </body>
</html>
