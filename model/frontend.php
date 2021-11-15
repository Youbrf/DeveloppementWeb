<?php

function dbConnect(){
    $db = new PDO('mysql:host=localhost;dbname=website;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $db;
}

function M_add_user($nom,$prenom,$adresse,$code_postal,$date_de_naissance,$adresse_mail,$pseudo,$mot_de_passe){
    $db=dbConnect();
    $hash_pwd = password_hash($mot_de_passe,PASSWORD_DEFAULT);
        $req = $db->prepare('INSERT INTO `membres`(`id`, `nom`, `prenom`, `adresse`, `code_postal`, `date_de_naissance`, `e-mail`, `pseudo`, `psswd`) 
                                VALUES (\'\',:nom,:prenom,:adresse,:code_postal,:date_naiss,:email,:logi,:psswrd)');
        $req->execute(array(
            'nom'=>$nom,
            'prenom'=>$prenom,
            'adresse'=>$adresse,
            'code_postal'=>$code_postal,
            'date_naiss'=>$date_de_naissance,
            'email'=>$adresse_mail,
            'logi'=>$pseudo,
            'psswrd'=>$hash_pwd
        ));
}


function M_login_user($pseudo,$password){
    $db=dbConnect();
    //  Récupération de l'utilisateur et de son pass hashé
    $req = $db->prepare('SELECT * FROM membres WHERE pseudo = :pseudo');
    $req->execute(array(
        'pseudo' => $pseudo));
    $resultat = $req->fetch();

    // Comparaison du pass envoyé via le formulaire avec la base
    $isPasswordCorrect = password_verify($password, $resultat['psswd']);

    if (!$resultat)
    {
        echo ' 1 Mauvais identifiant ou mot de passe !';
    }
    else
    {
        if ($isPasswordCorrect) {
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['password']=$password;
        }
        else {
            echo '  Mauvais mot de passe ou identifiant!';
        }
    }
}