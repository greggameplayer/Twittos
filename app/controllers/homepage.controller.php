<?php
namespace Controllers;

function getHomepageController(){
    try {
        echo \Helpers\getRenderer()->render('homepage.twig', ['Tweets' => \Models\getAllTweets()]);
    } catch (\Twig\Error\LoaderError $e) {
    } catch (\Twig\Error\RuntimeError $e) {
    } catch (\Twig\Error\SyntaxError $e) {
    }
}