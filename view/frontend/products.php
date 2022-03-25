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
    a{
        text-decoration:none;
        background-color: #4CAF50;
        color: white;
        padding: 14px;
        border-radius: 4px;
    }
</style>
    <h1>Smartphone</h1>
    <div id='Articles'>
       <?php  for ($i=0; $i< count($Products);$i++) : ?>
    <table id='ArticleName'>
        <tr>
            <form method="post">
            <td><img src="public/image/<?= $Products[$i]->getImg(); ?>" width="200px;"></td>
            <td><?= $Products[$i]->getName(); ?></td>
            <td><?= number_format($Products[$i]->getPrice(),2,',',' ')?> €</td>
            <td><input type="text" name="quantity" value="1"></td>
            <input type="hidden" name="hidden_name" value="<?= $Products[$i]->getName(); ?>">
            <input type="hidden" name="hidden_price" value="<?= $Products[$i]->getPrice(); ?>">
            <input type="hidden" name="hidden_img" value="<?= $Products[$i]->getImg(); ?>">
            <input type="hidden" name="hidden_id" value="<?= $Products[$i]->getId(); ?>">
            <?php  if (isset($_SESSION['id'])) { ?>
                <td><input type="submit" name="add_to_item" value="Add panier"></td></form>
            <?php }else { ?>
                <td>
                    <div style="padding: 20px;">
                        <a href="index.php?action=Login">SIGN IN</a>
                        <a href="index.php?action=Registration">REGISTER</a>
                    </div>
                </td>
            <?php  }  ?>
        </tr>
    </table>
    <?php  endfor;  ?> 
    </div>    
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>