<?php

namespace Models;

function getAllTweets(){
    $q = \Helpers\getDatabaseConnection()->prepare("SELECT * FROM users INNER JOIN tweets ON users.Id = tweets.IdUsers");
    $q->execute([]);
    return $q->fetchAll();
}

function getTweets($searchvalue){
    $q = \Helpers\getDatabaseConnection()->prepare("SELECT * FROM users INNER JOIN tweets ON users.Id = tweets.IdUsers where tweets.Content LIKE :searchvalue");
    $q->execute([
        "searchvalue" => "%" . $searchvalue . "%",
    ]);
    return $q->fetchAll();
}