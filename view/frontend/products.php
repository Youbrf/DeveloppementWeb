<?php $title = 'Product'; ?>

<?php ob_start(); ?>
<style>
    /* tableau product */
    table{
        border-collapse: collapse;
        margin:auto;
    }
    th,td{
        text-align: center; 
        border: 1px solid black;
        border-radius: 10px;
        padding: 10px;
    }
    div#Articles{
        display:flex;
    }
    tr{
        display:flex;
        flex-direction:column;
    }
</style>
    <h1>Smartphone</h1>
    <div id='Articles'>
       <?php
    for ($i=0; $i< count($Products);$i++) :
    ?>
    <table id='ArticleName'>
        <tr>
            <td><img src="public/image/<?= $Products[$i]->getImg(); ?>" width="200px;"></td>
            <td><?= $Products[$i]->getName(); ?></td>
            <td><?= number_format($Products[$i]->getPrice(),2,',',' ')?> €</td>
            <td><a class="add" href="index.php?action=Products&id=<?= $Products[$i]->getId();?>"><img src="public/image/icons/add.png" width="30px"></a></td>
        </tr>
    </table>
    <?php
        endfor;
    ?> 
    </div>    
    
     

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>