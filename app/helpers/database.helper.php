<?php

namespace Helpers;
use PDO;
use PDOException;

function getDatabaseConnection(){

    try{
        $db = new PDO("mysql:host=" . "127.0.0.1:3308" . ";dbname=" . "twittos", "root", "");
        $db->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
        return $db;
    }catch(PDOException $e){
        return $e;
    }
}
