<?php
namespace Controllers;

function getInscriptionController(){
    try {
        echo \Helpers\getRenderer()->render('inscriptionpage.twig', ['Session' => $_SESSION, 'SearchBar' => false]);
    } catch (\Twig\Error\LoaderError $e) {
    } catch (\Twig\Error\RuntimeError $e) {
    } catch (\Twig\Error\SyntaxError $e) {
    }
}