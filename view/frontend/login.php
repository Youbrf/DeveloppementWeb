<?php $title = 'Login'; ?>

<?php ob_start(); ?>
    <div id="form">
        <form method="post" action="">
            <label for="pseudo">Login</label>
            <input type="text" name="pseudo" placeholder="GoldenHour">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="PassWord21!">
            <?php if (isset($data)) {
                echo $data;
            } ?>
            <input type="submit" name="login" value="Connection">
        </form>
    </div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>