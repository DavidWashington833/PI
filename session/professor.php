<?php

session_start();

if(isset($_GET['hideMenu'])) {
    if($_GET['hideMenu']) {        
        $_SESSION["showMenu"] = true;              
    } else {
        $_SESSION["showMenu"] = false;              
    }
}
$_SESSION["codProfessor"] = 1; 
$_SESSION["nomeProfessor"] = "admin";     
$_SESSION["tipoProfessor"] = "A";       

lidaBasicAuthentication("../../portal/naoautorizado.php");

if(!isset($_SESSION["codProfessor"]) || !is_numeric($_SESSION["codProfessor"])) {
    $SITE_URL = "index.html";
    header('Location: '. $SITE_URL);
    exit();
}