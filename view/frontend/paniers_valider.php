<?php $title = 'Paniers'; ?>

<?php ob_start(); ?>

<h1 style="color:green;">MERCI POUR VOTRE ACHAT - À BIENTÔT ..</h1>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>