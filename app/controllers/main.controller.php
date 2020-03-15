<?php

namespace Controllers;

function getMainController($page){
    if($page["page"] != ""){
        switch($page["page"]){
            case "inscription":
                getInscriptionController();
                break;
            case "inscription.model":
                \Models\setUser($page["Pseudo"], $page["Email"], $page["Password"], $page["Nom"], $page["Prenom"]);
                break;
        }
    }else {
        getHomepageController();
    }
}