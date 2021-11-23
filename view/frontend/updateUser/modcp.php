<?php $title = 'Modification code postal'; ?>

<?php ob_start(); ?>
<h1>Modification de votre code postal</h1>
<p>Voici votre code postal actuel : <?php echo $data['code_postal']?></p>
<div id="form">
    <form method="post" action="index.php?action=Mcp">
        <label for="cp">Introduire votre nouvelle adresse </label>
        <input type="text" name="cp" placeholder="Code postal"><br>
        <?php if(isset($erreur)){echo $erreur;}?>
        <input type="submit" name="Modify" value="Modifier">
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>