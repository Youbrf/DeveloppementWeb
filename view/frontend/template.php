
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <link href="http://localhost/web-icc/public/css/style.css" rel="stylesheet" />
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="index.php?action=Registration">Registration</a></li>
                <li><a href="index.php?action=Login">Login</a></li>
                <li><a href="index.php?action=Logout">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div>
        <?= $content ?>
    </div>
    
    <footer></footer>
</body>

</html>