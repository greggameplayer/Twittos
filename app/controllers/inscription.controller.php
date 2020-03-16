<?php
namespace Controllers;

function getInscriptionController(){
    try {
        echo \Helpers\getRenderer()->render('inscriptionpage.twig', ['Session' => $_SESSION]);
    } catch (\Twig\Error\LoaderError $e) {
    } catch (\Twig\Error\RuntimeError $e) {
    } catch (\Twig\Error\SyntaxError $e) {
    }
}