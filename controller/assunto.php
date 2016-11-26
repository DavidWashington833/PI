<?php

include "../integracao/loginFunc.php";
lidaBasicAuthentication('../../portal/naoautorizado.php');
include "../session/professor.php";
include "../config/config.php";
include "../config/db.php";
include "../helpers/valida-texto.php";
include "../model/assunto.php";

// UPDATE
if( isset($_GET['newAssunto']) && 
    isset($_GET['newArea']) && 
    isset($_GET['idAssunto'])) {
    if($_GET['newAssunto'] != '') {
        $idAssunto = $_GET['idAssunto'];
        $newAssunto = $_GET['newAssunto'];
        $newAssunto = validaTexto($newAssunto);
        $newArea = $_GET['newArea'];
        if(updateAssunto($db, $idAssunto, $newAssunto, $newArea)) {
            $msg = "Item $newAssunto atualizado";
            $alert = "success";
        }
    }
}

// INSERT
if(isset($_GET['assunto']) && isset($_GET['area'])) {
    if($_GET['assunto'] != '') {
        $assunto = $_GET['assunto'];
        $assunto = validaTexto($assunto);
        $area = $_GET['area'];
        if(insertAssunto($db, $assunto, $area)) {
            $msg = "$assunto inserio com sucesso";
            $alert = "success";
        }
    }
}

// DELETE
if(isset($_GET['del'])) {
    $del = $_GET['del'];
    if(delArea($db, $del)) {
        $msg = "Item removido com sucesso.";
        $alert = "success";
    }
}

// LIMITI DE ROWS
if(isset($_GET['limit'])) {
    $limit = $_GET['limit'];
} else {
    $limit = 10;
}

// ALTERNAR ENTRE ASC E DESC
if(isset($_GET['order'])) {
    $order = $_GET['order'];
} else {
    $order = "ASC";
}
if($order == "ASC") {
    $toggleOrder = "DESC";
} else {
    $toggleOrder = "ASC";
}

// FUNÇÃO SELECT AREA
$assuntos = getAssunto($db, $order, $limit);

include "../erro/assunto.php";
include "../view/shared/header.php";
include "../view/shared/menu.php";
include "../view/assunto.php";
include "../view/shared/footer.php";

$areas = getArea($db, $order);
include "../view/assunto_modal.php";