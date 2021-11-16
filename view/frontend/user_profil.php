<?php $title = 'User Profil'; ?>

<?php ob_start(); ?>
<div>
    <h1>Bienvenu sur mon site</h1>
</div>
<div>
    <table>
        <tr>
            <td>nom</td>
            <td><?php print_r($data['nom'])?></td>
        </tr>
        <tr>
            <td>prenom</td>
            <td><?php print_r($data['prenom'])?></td>
        </tr>
        <tr>
            <td>email</td>
            <td><?php print_r($data['e-mail'])?></td>
        </tr>
        <tr>
            <td>adresse</td>
            <td><?php print_r($data['adresse'])?></td>
        </tr>
        <tr>
            <td>code postal</td>
            <td><?php print_r($data['code_postal'])?></td>
        </tr>
    </table>

</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>