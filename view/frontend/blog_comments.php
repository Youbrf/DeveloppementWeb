<?php $title = htmlspecialchars($post['title']); ?>
<style>
    a{
        text-decoration:none;
        background-color: #4CAF50;
        color: white;
        padding: 14px;
        border-radius: 4px;
    }
    
</style>
<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p></p>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
    <a href="index.php?action=Blog">Retour à la liste des billets</a>
</div>

<h2>Commentaires</h2>

<?php
while ($comment = $comments->fetch())
{
?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
<?php
}
?>
<?php 
        if (isset($_SESSION['id'])) { ?>
            <div id="form">
                <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
                    <div>
                        <label for="comment">Comments</label><br />
                        <textarea id="comment" name="comment"></textarea>
                    </div>
                    <div>
                        <input type="submit" value="Send"/>
                    </div>
                </form>
            </div>
        <?php
        }else {?>
            <div id="form">
                <a href="index.php?action=Login">SIGN IN</a>
                <a href="index.php?action=Registration">REGISTER</a>
            </div>
        <?php
        }
    ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>