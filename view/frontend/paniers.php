<?php $title = 'Paniers'; ?>

<?php ob_start(); ?>
<style>
    /* tableau product */
    table{
    border-collapse: collapse;
    }
    th,td{
    border: 1px solid black;
    padding: 10px;
    }
</style>
    <h1>Votre panier est  ici </h1>
    <table>
        <tr>
            <th>Picture</th>
            <th>Name</th>
            <th>Price</th>
        </tr>
    <?php 
    foreach ($Products as $shop){
        ?>
        <tr>
            <td><img src="public/image/<?= $shop->getImg(); ?>" width="60px;"></td>
            <td><?= $shop->getName(); ?></td>
            <td><?= number_format($shop->getPrice(),2,',',' ')?> €</td>
            <td><a class="add" href="index.php?action=Panier&id=<?= $shop->getId();?>"><img src="public/image/icons/del.png" width="30px"></a></td>
        </tr>
        <?php
    }?>
    </table> 

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>