<?php

include "integracao/loginFunc.php";
include "../session/professor.php";
include "../config/config.php";
include "../config/db.php";
include "../helpers/valida-texto.php";
include "../model/area.php";

// UPDATE
if(isset($_GET['newArea']) && isset($_GET['idArea'])) {
    if($_GET['newArea'] != '') {
        $newArea = $_GET['newArea'];
        $newArea = validaTexto($newArea);
        $idArea = $_GET['idArea'];
        if(updateArea($db, $newArea, $idArea)) {
            $msg = "Item $newArea atualizado";
            $alert = "success";
        }
    }
}

// INSERT
if(isset($_GET['area'])) {
    if($_GET['area'] != '') {
        $area = $_GET['area'];
        $area = validaTexto($area);
        if(insertArea($db, $area)) {
            $msg = "$area inserida com sucesso";
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
$areas = getArea($db, $order, $limit);

include "../erro/area.php";
include "../view/shared/header.php";
include "../view/shared/menu.php";
include "../view/area.php";
include "../view/shared/footer.php";