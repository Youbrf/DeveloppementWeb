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
                <th>Quantity</th>
                <th>Price</th>
                <th>total</th>
                <th>Action</th>
            </tr>
            <form method="post">
            <?php  if (isset($Products)) {
                $total=0; 
                foreach ($Products as $key => $value) {  ?>
                <tr>
                    <td><img src="public/image/<?= $value["item_img"]; ?>" width="60px;"></td>
                    <td><?= $value["item_name"]; ?></td>
                    <td><?= $value["item_quantity"]; ?></td>
                    <td><?= number_format($value["item_price"],2,',',' ')?> €</td>
                    <td><?= number_format($value["item_quantity"]*$value["item_price"],2,',',' ')?> €</td>
                    <td><a class="add" href="index.php?action=Panier&id=<?= $value["item_id"];?>"><img src="public/image/icons/del.png" width="30px"></a></td>
                    <?php $array[$value["item_id"]]=$value["item_quantity"];?>
                    
                </tr>
                <?php  $total = $total +($value["item_quantity"]*$value["item_price"]);  
                }  ?>
                <tr>
                    <td colspan="4">Total</td>
                    <td><?php echo number_format($total,2,',',' ');?> €</td>
                    <td><a href="index.php?action=Panier&clear">remove all</a></td>
                </tr>
                <?php 
                if (isset($_SESSION['id'])) { ?>
                    <tr>
                        <?php $data[]=$array; $data2 =json_encode($data);?>
                        <input type="hidden" name="hidden_array" value='<?php echo $data2 ?>'>
                        <td colspan="6"><input type="submit" name="buy" value="BUY"></td>
                    </tr>
                <?php
                }else {?>
                    <div style='margin-bottom:20px;' id="form">
                        <p>
                            <a href="index.php?action=Login">SIGN IN</a> OR <a href="index.php?action=Registration">REGISTER</a>
                        </p> 
                    </div>
                <?php } ?>
                
                </form>
        </table> 
            <?php   }  ?>

    

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>