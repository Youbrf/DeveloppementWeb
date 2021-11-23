<?php $title = 'Modification adresse'; ?>

<?php ob_start(); ?>
<h1>Modification de votre adresse</h1>
<p>Voici votre adresse actuel : <?php echo $data['adresse']?></p>
<div id="form">
    <form method="post" action="index.php?action=Madresse">
        <label for="adresse">Introduire votre nouvelle adresse </label>
        <input type="text" name="adresse" placeholder="Adresse"><br>
        <?php if(isset($erreur)){echo $erreur;}?>
        <input type="submit" name="Modify" value="Modifier">
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>