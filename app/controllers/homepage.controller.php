<?php
namespace Controllers;

function getHomepageController($connexion = false, $searchvalue = false){
    if($connexion != "tweetsearch") {
        try {
            echo \Helpers\getRenderer()->render('homepage.twig', ['Tweets' => \Models\getAllTweets(), 'Connexion' => $connexion, 'Session' => $_SESSION]);
        } catch (\Twig\Error\LoaderError $e) {
        } catch (\Twig\Error\RuntimeError $e) {
        } catch (\Twig\Error\SyntaxError $e) {
        }
    }else{
        try {
            echo \Helpers\getRenderer()->render('homepage.twig', ['Tweets' => \Models\getTweets($searchvalue), 'Connexion' => $connexion, 'Session' => $_SESSION]);
        } catch (\Twig\Error\LoaderError $e) {
        } catch (\Twig\Error\RuntimeError $e) {
        } catch (\Twig\Error\SyntaxError $e) {
        }
    }
}