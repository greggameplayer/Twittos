<?php

namespace Models;

function getAllTweets(){
    $q = \Helpers\getDatabaseConnection()->prepare("SELECT * FROM users, tweets");
    $q->execute([]);
    return $q->fetchAll();
}