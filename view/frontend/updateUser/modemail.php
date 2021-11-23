<?php $title = 'Modification email'; ?>

<?php ob_start(); ?>
<h1>Modification de votre e-mail</h1>
<p>Voici votre email actuel : <?php echo $data['e-mail']?></p>
<div id="form">
    <form method="post" action="index.php?action=Memail">
        <label for="adresse_mail">Introduire votre nouvel e-mail </label>
        <input type="email" name="adresse_mail" placeholder="Adresse mail"><br>
        <?php if(isset($erreur)){echo $erreur;}?>
        <input type="submit" name="Modify" value="Modifier">
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>