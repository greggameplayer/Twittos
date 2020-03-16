<?php
namespace Models;

function setUser($Pseudo, $Email, $Password, $Nom, $Prenom){
    $uniquemail = 1;
    $qcheckmail = \Helpers\getDatabaseConnection()->prepare("SELECT COUNT(users.Id) FROM users where users.Email = :email");
    $qcheckmail->execute([
        "email" => $Email
    ]);
    while($donnees = $qcheckmail->fetch()){
        if($donnees[0] > 0){
            $uniquemail = 0;
        }
    }
    $qcheckmail->closeCursor();
    if($uniquemail == 1) {
        $options = [
            "cost" => 12,
        ];
        $hashpassword = password_hash($Password, PASSWORD_BCRYPT, $options);
        $qinscription = \Helpers\getDatabaseConnection()->prepare("INSERT INTO users(Email,Password,LastName, FirstName, Pseudo) VALUES(:email,:password,:nom,:prenom, :pseudo)");
        $qinscription->execute([
            "email" => $Email,
            "password" => $hashpassword,
            "nom" => $Nom,
            "prenom" => $Prenom,
            "pseudo" => $Pseudo
        ]);
        $qinscription->closeCursor();
        ?>
        le nouvel utilisateur a été créé
        <?php
    }else{
        ?>
        l'utilisateur existe déjà
        <?php
    }
    unset($uniquemail);
}