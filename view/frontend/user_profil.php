<?php $title = 'User Profil'; ?>

<?php ob_start(); ?>
<div>
    <h1>Bienvenu sur mon site</h1>
</div>
<div>
    <p>je vais t'afficher ton profil tkt</p>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>