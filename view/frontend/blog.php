<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>NEWS BILLETS</h1>

<div id="form">
    <form method="post" >
        <label for="rbillet">Recherche de billets</label>
        <input type="text" name="rbillet" placeholder="Titre du billet"><br>
        <?php if(isset($erreur)){echo $erreur;}?>
        <input type="submit" name="search" value="Search">
    </form>
</div>

<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
            <br />
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>