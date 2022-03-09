<table>
        <tr>
            <th>Picture</th>
            <th>Name</th>
            <th>Price</th>
            <th>Add</th>
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