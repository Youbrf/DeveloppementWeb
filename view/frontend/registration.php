<?php $title = 'Registration'; ?>

<?php ob_start(); ?>
<form method="post" action="index.php?action=AddUser">
    <label for="nom">Nom </label>
    <input type="text" name="nom" placeholder="Nom"><br>
    <label for="prenom">Prénom </label>
    <input type="text" name="prenom" placeholder="Prénom"><br>
    <label for="adresse">Adresse </label>
    <input type="text" name="adresse" placeholder="Adresse"><br>
    <label for="code_postal">Code postal </label>
    <input type="int" name="code_postal" placeholder="Code Postal"><br>
    <label for="date_de_naissance">Date de naissance </label>
    <input type="text" name="date_de_naissance" placeholder="Date de naissance"><br>
    <label for="adresse_mail">E-mail </label>
    <input type="text" name="adresse_mail" placeholder="Adresse mail"><br>
    <label for="pseudo">Login </label>
    <input type="text" name="pseudo" placeholder="Login"><br>
    <label for="mot_de_passe">Mot de passe </label>
    <input type="password" name="mot_de_passe" placeholder="Mot de passe"><br>
    <label for="confirmation_mot_de_passe">Confirmation du mot de passe </label>
    <input type="password" name="confirmation_mot_de_passe" placeholder="Confirmation du mot de passe"><br>
    <input type="submit" value="s'inscrire">
</form>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>