<?php $title = 'User Profil'; ?>

<?php ob_start(); ?>
<div>
    <h1>Bienvenu sur mon site</h1>
</div>
<div>
    <table>
        <tr>
            <td>Pseudo</td>
            <td><?php echo $data['pseudo']?></td>
        </tr>
        <tr>
            <td>nom</td>
            <td><?php echo $data['nom']?></td>
        </tr>
        <tr>
            <td>prenom</td>
            <td><?php echo $data['prenom']?></td>
        </tr>
        <tr>
            <td>adresse</td>
            <td><?php echo $data['adresse']?></td>
            <td><a href="index.php?action=Madresse">modifier</a></td>
        </tr>
        <tr>
            <td>code postal</td>
            <td><?php echo $data['code_postal']?></td>
            <td><a href="index.php?action=Mcp">modifier</a></td>
        </tr>
        <tr>
            <td>date de naissance</td>
            <td><?php echo $data['date_de_naissance']?></td>
        </tr>
        <tr>
            <td>email</td>
            <td><?php echo $data['e-mail']?></td>
            <td><a href="index.php?action=Memail">modifier</a></td>
        </tr>
        <tr>
            <td><a href="index.php?action=Mpwd">modifier mot de passe</a></td>
        </tr>
        
    </table>

</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>