<?php

require('model/frontend.php');

function C_Accueil(){
    require('view/frontend/accueil.php');
}

function C_Registration(){
    require('view/frontend/registration.php');
}

function C_Add_User($nom,$prenom,$adresse,$code_postal,$date_de_naissance,$adresse_mail,$pseudo,$mot_de_passe){
    add_user($nom,$prenom,$adresse,$code_postal,$date_de_naissance,$adresse_mail,$pseudo,$mot_de_passe);
    require('view/frontend/profil.php');
}