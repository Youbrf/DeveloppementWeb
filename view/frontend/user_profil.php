<?php $title = 'User Profil'; ?>

<?php ob_start(); ?>
<style>
    /* tableau product */
    table {
        border-collapse: collapse;
        border-radius: 1em;
        overflow: hidden;
        margin:auto;
    }

    td {
        padding: 1em;
        background: #ddd;
        border-bottom: 2px solid white; 
        border-left: 2px solid white;
    }
    td.tableCenter{
        text-align:center;
    }
</style>
<div>
    <h1>Bienvenu sur mon site</h1>
</div>
<div>
    <table>
    <?php
        if (!empty($_SESSION['avatar'])){?>
            <tr>
                <td class='tableCenter' colspan=3><img src="public/avatar/<?php echo $data['avatar']?>" width="150"></td>
        </tr><?php } ?>
        
        <tr>
            <td><strong>PSEUDO</strong></td>
            <td colspan=2 ><?php echo $data['pseudo']?></td>
        </tr>
        <tr>
            <td><strong>NOM</strong></td>
            <td colspan=2 ><?php echo $data['nom']?></td>
        </tr>
        <tr>
            <td><strong>PRÉNOM</strong></td>
            <td colspan=2 ><?php echo $data['prenom']?></td>
        </tr>
        <tr>
            <td><strong>ADRESSE</strong></td>
            <td><?php echo $data['adresse']?></td>
            <td><a href="index.php?action=Madresse"><strong>MODIFY</strong></a></td>
        </tr>
        <tr>
            <td><strong>CODE POSTAL</strong></td>
            <td><?php echo $data['code_postal']?></td>
            <td><a href="index.php?action=Mcp"><strong>MODIFY</strong></a></td>
        </tr>
        <tr>
            <td><strong>DATE DE NAISSANCE</strong></td>
            <td colspan=2 ><?php echo $data['date_de_naissance']?></td>
        </tr>
        <tr>
            <td><strong>EMAIL</strong></td>
            <td><?php echo $data['e-mail']?></td>
            <td><a href="index.php?action=Memail"><strong>MODIFY</strong></a></td>
        </tr>
        <tr>
            <td class='tableCenter' colspan=3><a href="index.php?action=Mpwd"><strong>MODIFIER PASSWORD</strong></a></td>
        </tr>
        <tr>
            <td class='tableCenter' colspan=3><a href="index.php?action=Mavatar"><?php if (!empty($_SESSION['avatar'])) { ?>
                <strong>MODIFIER AVATAR</strong><?php
            }else {?>
                <strong>AJOUTER AVATAR</strong><?php
            } ?></a></td>
        </tr>
    </table>

</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>