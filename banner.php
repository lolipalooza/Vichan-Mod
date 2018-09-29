<?php include 'inc/functions.php' ?>
<?php include 'inc/instance-config.php' ?>
<?php header('Location: ' . $config['root'] . $config['banners_folder'] . $config['banners'][ rand(0, sizeof($config['banners'])-1) ] ) ?>