
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <link href="http://localhost/web-icc/public/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://localhost/icc/DeveloppementWeb/public/css/style.css">
</head>

<body>
    <header>
        <nav>
            <ul id="menu">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="index.php?action=Chat">MiniChat</a></li>
                <li><a href="index.php?action=Blog">Blog/News</a></li>
                <li><a href="index.php?action=Products">Produits</a></li>
                <?php 
                    if (isset($_SESSION['id'])){
                        ?>
                        <li><a href="index.php?action=Logout">Logout</a></li>
                        <li><a href="index.php?action=Login">Profil</a></li>
                        <?php
                    }else {
                        ?>
                        <li><a href="index.php?action=Registration">Registration</a></li>
                        <li><a href="index.php?action=Login">Login</a></li>
                        <?php
                    }
                ?>
                <li><a href="index.php?action=Panier">Panier</a></li>
                <?php 
                    if (!empty($_SESSION['avatar'])){
                        ?>
                        <li><img src="public/avatar/<?php echo $_SESSION['avatar']?>" width="30"></li>
                        <?php
                    }
                ?>

               
            </ul>
        </nav>
    </header>
    <div>
        <?= $content ?>
    </div>
    
    <footer></footer>
</body>

</html>