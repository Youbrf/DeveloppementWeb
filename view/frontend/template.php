<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <link href="public/css/style.css" rel="stylesheet" />
</head>

<body>
    <header>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="index.php?action=Registration">Registration</a>
            <a href="index.php?action=Login">Login</a>
        </nav>
    </header>
    <?= $content ?>
</body>

</html>