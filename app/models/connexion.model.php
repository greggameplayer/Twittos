<?php
namespace Models;

function getUser($Email, $Password){
        $qemail = \Helpers\getDatabaseConnection()->prepare("SELECT * FROM users WHERE Email = :email");
        $qemail->execute([
            "email" => $Email,
        ]);
        if($qemail->rowCount() < 1){
            \Controllers\getHomepageController("error");
        } else {
            while ($donnees = $qemail->fetch()) {
                if (password_verify($Password, $donnees["Password"])) {
                    $_SESSION["email"] = $donnees["Email"];
                    \Controllers\getHomepageController("connected");
                } else {
                    \Controllers\getHomepageController("error");
                }
            }
        }
        $qemail->closeCursor();
}
