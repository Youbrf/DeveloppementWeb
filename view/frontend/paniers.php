<?php $title = 'Paniers'; ?>

<?php ob_start(); ?>
<style>
    /* tableau product */
    table{
    border-collapse: collapse;
    margin:auto;
    }
    th,td{
    border: 1px solid black;
    padding: 10px;
    }
</style>
    <h1>Votre panier</h1>
    <table>
        <tr>
            <th>Picture</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Delete</th>
        </tr>
    <?php 
    foreach ($Products as $shop){
        ?>
        <tr>
            <td><img src="public/image/<?= $shop->getImg(); ?>" width="60px;"></td>
            <td><?= $shop->getName(); ?></td>
            <td><?= number_format($shop->getPrice(),2,',',' ')?> €</td>
            <td><select name="quantity">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select></td>
            <td><a class="add" href="index.php?action=Panier&id=<?= $shop->getId();?>"><img src="public/image/icons/del.png" width="30px"></a></td>
        </tr>
        <?php
    }?>
    </table> 

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>