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
<<<<<<< HEAD
    </table>

    array(1) { 
        ["smartphone"]=> string(78) "a:4:{
            i:0;s:1:"1";
            i:1;s:8:"Iphone X";
            i:2;s:6:"499.99";
            i:3;s:12:"iphone X.jpg";}" } 
=======
    </table>
>>>>>>> 1db52612573ca79899a70e9e777559ac036d72ee
