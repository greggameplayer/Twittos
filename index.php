<!DOCTYPE html>
<?php
include "database.php";
global $db;
require_once __DIR__ . '/vendor/autoload.php';

if(isset($_POST["page"])) {
    \Controllers\getMainController($_POST);
}else{
    \Controllers\getMainController("");
}