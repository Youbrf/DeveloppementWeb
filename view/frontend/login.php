<?php $title = 'Login'; ?>

<?php ob_start(); ?>
    <div align=center>
        <form method="post" action="index.php?action=Login">
            <table>
                <tr>
                    <td><label for="pseudo">Login</label></td>
                    <td><input type="text" name="pseudo" placeholder="GoldenHour"></td>
                    <td>
                        
                        <?php 
                        if (!empty($data)) {
                            if(is_null($data)) {
                            print_r($data);
                            }
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td><input type="password" name="password" placeholder="PassWord21!"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Connection"></td>
                </tr>
            </table>
        </form>
        <pre><?php  var_dump($_SESSION)  ?></pre>
    </div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>