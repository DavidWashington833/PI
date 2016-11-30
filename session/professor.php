<?php

session_start();

lidaBasicAuthentication("../../portal/naoautorizado.php");
/*
$_SESSION["codProfessor"] = 1; 
$_SESSION["nomeProfessor"] = "admin";     
$_SESSION["tipoProfessor"] = "A";     
$_SESSION['showMenu'] = false;
*/

if(!isset($_SESSION["codProfessor"]) || !is_numeric($_SESSION["codProfessor"])) {
    $SITE_URL = "index.html";
    header('Location: '. $SITE_URL);
    exit();
}