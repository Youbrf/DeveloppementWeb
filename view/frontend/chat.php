<?php $title = 'Mini Chat'; ?>
<style>
    .chat{
        display: flex;
        flex-direction: column;
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
        margin-top: 20px;
        margin-left: 25%;
        margin-right: 25%;
    }
    .chat1{
        display: flex;
        justify-content: space-between;
        background-color: white;
        width: 100%;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    p{
        margin-left:5%;
        margin-right:5%;
    }
    a{
        text-decoration:none;
        background-color: #4CAF50;
        color: white;
        padding: 14px;
        border-radius: 4px;
    }
</style>
<?php ob_start(); ?>

    <div class="chat">
        <?php
            while ($donnees = $reponse->fetch()) { ?>
                <div class="chat1">
                   <p><?php echo $donnees['Pseudo'] ?></p>
                    <p><?php echo $donnees['chat'] ?></p> 
                </div>
        <?php
            }
        ?> 
    </div>

    <?php 
        if (isset($_SESSION['id'])) { ?>
            <div id="form">
                <form method="post" action="index.php?action=Chat">
                    <label for="message">Message</label><input type="text" name='message' placeholder='écrire votre message ..'>
                    <input type="submit" name="insertchat" value='Connection'>
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