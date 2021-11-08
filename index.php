<?php

require('controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'accueil') {
            accueil();
        }
 
        elseif ($_GET['action'] == 'Registration') {
            Registration();
        }     
    }
    else {
        accueil();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
