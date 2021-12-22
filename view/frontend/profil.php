<?php $title = 'Profil'; ?>

<?php ob_start(); ?>
    <div>
        <h1>Bienvenu</h1>
    </div>
    <div>
        <p>
            Votre compte à bien été enregistré. Vous pouvez à présent vous connecter. <a href="index.php?action=Login">Login</a>
        </p>
    </div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>