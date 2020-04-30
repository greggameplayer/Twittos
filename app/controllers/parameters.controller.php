<?php
namespace Controllers;

function getParametersController(){
    try {
        echo \Helpers\getRenderer()->render('parameterspage.twig', ['Session' => $_SESSION, 'SearchBar' => false]);
    } catch (\Twig\Error\LoaderError $e) {
    } catch (\Twig\Error\RuntimeError $e) {
    } catch (\Twig\Error\SyntaxError $e) {
    }
}