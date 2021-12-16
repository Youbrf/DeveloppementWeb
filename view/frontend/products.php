<?php $title = 'Product'; ?>

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
    <h1>les produits sont ici </h1>
    <table>
        <tr>
            <th>Picture</th>
            <th>Name</th>
            <th>Price</th>
        </tr>
    <?php
    for ($i=0; $i< count($Products);$i++) :
    ?>
        <tr>
            <td><img src="public/image/<?= $Products[$i]->getImg(); ?>" width="60px;"></td>
            <td><?= $Products[$i]->getName(); ?></td>
            <td><?= number_format($Products[$i]->getPrice(),2,',',' ')?> €</td>
            <td><a class="add" href="index.php?action=Products&id=<?= $Products[$i]->getId();?>"><img src="public/image/icons/add.png" width="30px"></a></td>
        </tr>
       
    <?php
        endfor;
    ?>
    </table> 

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>