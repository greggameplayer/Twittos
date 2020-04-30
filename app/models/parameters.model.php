<?php
namespace Models;

function changePassword($oldPassword, $newPassword)
{
    $qpass = \Helpers\getDatabaseConnection()->prepare("SELECT * FROM users WHERE Email = :email");
    $qpass->execute([
        "email" => $_SESSION["email"],
    ]);
    while ($donnees = $qpass->fetch()) {
        if (password_verify($oldPassword, $donnees["Password"])) {
            $options = [
                "cost" => 12,
            ];
            $hashpassword = password_hash($newPassword, PASSWORD_BCRYPT, $options);
            $qpasschange = \Helpers\getDatabaseConnection()->prepare("UPDATE users SET Password = :password WHERE Email = :email");
            $qpasschange->execute([
               "password" => $hashpassword,
               "email" => $_SESSION["email"]
            ]);
            echo "mot de passe changé";
            session_destroy();
        } else {
            echo "mot de passe incorrect !";
        }
    }

    $qpass->closeCursor();
}