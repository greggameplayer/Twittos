<?php

namespace Models;

function setTweet($content){
    $qgetId = \Helpers\getDatabaseConnection()->prepare("SELECT Id FROM users WHERE Email = :email");
    $qgetId->execute([
        "email" => $_SESSION["email"],
    ]);
    while($donnees = $qgetId->fetch()){
        $q = \Helpers\getDatabaseConnection()->prepare("INSERT INTO tweets(IdUsers, Content) VALUES(:idusers, :content)");
        $q->execute([
            "idusers" => $donnees["Id"],
            "content" => $content
        ]);
    }
    if($qgetId->rowCount() >= 1){
        echo "tweet correctement envoyé";
    }
    $qgetId->closeCursor();
    $q->closeCursor();
}
