<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>
<div>
    <h1>Bienvenu sur mon site</h1>
</div>
<div>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Non mollitia officiis nulla unde architecto voluptatem possimus alias modi doloremque, aut magni a quam eius fugiat nesciunt molestiae repellendus et dolorem!
    </p>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis ipsum, debitis rem aut exercitationem animi eligendi, accusantium, dicta quis reprehenderit neque odit corporis modi omnis quaerat iusto labore rerum qui.
    </p>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci dicta natus iusto odio vel dolor architecto vitae! Nemo fugit ipsum perferendis? Quam amet dolorum earum delectus commodi exercitationem magnam fugit.
    </p>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>