<?php $title = 'Ajouter Avatar'; ?>

<?php ob_start(); ?>
<h1>Avatar actuel : <br> <?php
if (!empty($_SESSION['avatar'])) {?>
    <img src="public/avatar/<?php echo $_SESSION['avatar'] ?>" width="100"><?php
} ?></h1>
<div id="form" style="margin-left: 30%;margin-right: 50%;">
    <form method="post" action="index.php?action=Mavatar" enctype="multipart/form-data">
        <label for="avatar">Introduire votre nouvelle avatar : </label><br>
        <input type="file" name="avatar"><br>
        <?php if(isset($erreur)){echo $erreur;}?>
        <input type="submit" name="Modify" value="Modifier">
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>