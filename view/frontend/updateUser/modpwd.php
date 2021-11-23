<?php $title = 'Modification mot de passe'; ?>

<?php ob_start(); ?>
<h1>Modification de votre mot de passe</h1>
<div id="form">
    <form method="post" action="index.php?action=Mpwd">
        <label for="mot_de_passe">Introduire votre nouveau mot de passe</label>
        <input type="password" name="mot_de_passe" placeholder="Mot de passe" required><br>
        <label for="confirmation_mot_de_passe">Confirmation du nouveau mot de passe </label>
        <input type="password" name="confirmation_mot_de_passe" placeholder="Confirmation du mot de passe" required><br>


        <?php if(isset($erreur)){echo $erreur;}?>
        <input type="submit" name="Modify" value="Modifier">
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>