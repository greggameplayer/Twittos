<?php

namespace Controllers;

function getMainController($page){
    if($page != "home"){
        switch($page["page"]){
            case "inscription":
                getInscriptionController();
                break;
            case "inscription.model":
                \Models\setUser($page["Pseudo"], $page["Email"], $page["Password"], $page["Nom"], $page["Prenom"]);
                break;
            case "connexion.model":
                \Models\getUser($page["Email"], $page["Password"]);
                break;
            case "deconnexion" :
                session_destroy();
                getHomepageController("deconnected");
                break;
            case "tweetsearch":
                getHomepageController("tweetsearch", $page["searchvalue"]);
                break;
            case "tweetcreation.model":
                \Models\setTweet($page["content"]);
                break;
            case "parameters":
                getParametersController();
                break;
            case "parameters.model":
                \Models\changePassword($page["oldPassword"], $page["newPassword"]);
                break;
        }
    }else {
        getHomepageController();
    }
}