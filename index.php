<?php
session_start();

require('controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'accueil') {
            C_Accueil();
        }
        elseif ($_GET['action'] == 'Registration') {
            C_Registration();
        }
        elseif ($_GET['action'] == 'Login') {
            if (isset($_SESSION['id'])) {
                header("Location: index.php?action=UserProfil");
            }elseif (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
                C_Login_User($_POST['pseudo'],$_POST['password']);
                header("Location: index.php?action=UserProfil");
            }else {
                C_Login();
            }
        }
        elseif ($_GET['action'] == 'Logout') {
            C_Logout();
        }
        elseif ($_GET['action'] == 'UserProfil') {
            if (isset($_SESSION['id'])) {
                C_Data_User_id($_SESSION['id']);
            }else{
            //     C_Login_User($_POST['pseudo'],$_POST['password']);
            }
        }
        elseif ($_GET['action'] == 'AddUser') {
            if (strcmp($_POST['mot_de_passe'],$_POST['confirmation_mot_de_passe'])==0) {
                if (!empty($_POST['nom']) 
                    && !empty($_POST['prenom']) 
                    && !empty($_POST['adresse_mail']) 
                    && !empty($_POST['pseudo']) 
                    && !empty($_POST['mot_de_passe'])){
                C_Add_User($_POST['nom'],
                            $_POST['prenom'], 
                            $_POST['adresse'], 
                            $_POST['code_postal'], 
                            $_POST['date_de_naissance'], 
                            $_POST['adresse_mail'], 
                            $_POST['pseudo'], 
                            $_POST['mot_de_passe']);
                }
                else {
                    // Autre exception
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }else {
                throw new Exception('Les mots de passes ne sont pas identique !');
            }
            
        }     
    }
    else {
        C_Accueil();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
