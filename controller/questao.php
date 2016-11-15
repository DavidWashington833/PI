<?php
include "../session/professor.php";
include "../config/config.php";
include "../config/db.php";
include "../helpers/valida-texto.php";
include "../model/questao.php";

// UPDATE
if( isset($_GET['idQuestao']) &&
    isset($_GET['newQuestao']) &&
    isset($_GET['newAssunto']) &&
    isset($_GET['newImagem']) &&
    isset($_GET['newAtivo']) &&
    isset($_GET['newDificuldade']) &&
    isset($_GET['newAlternativa1']) &&
    isset($_GET['newAlternativa2']) &&
    isset($_GET['newAlternativa3']) &&
    isset($_GET['newAlternativa4']) &&
    isset($_GET['newCorreto']) &&
    isset($_SESSION['codProfessor'])) {
    if($_GET['newQuestao'] != '') {
        $idQuestao = $_GET['idQuestao'];
        $newQuestao = $_GET['newQuestao'];
        $newAssunto = $_GET['newAssunto'];
        $newImagem = $_GET['newImagem'];
        $newAtivo = $_GET['newAtivo'];
        $newDificuldade = $_GET['newDificuldade'];
        $newAlternativa1 = $_GET['newAlternativa1'];
        $newAlternativa2 = $_GET['newAlternativa2'];
        $newAlternativa3 = $_GET['newAlternativa3'];
        $newAlternativa4 = $_GET['newAlternativa4'];
        $newCorreto = $_GET['newCorreto'];
        $inProfessor = $_SESSION['codProfessor'];
        if(updateQuestao(   $db, 
                            $idQuestao,
                            $newQuestao,
                            $newAssunto,
                            $newImagem,
                            $newAtivo,
                            $newDificuldade,
                            $newAlternativa1,
                            $newAlternativa2,
                            $newAlternativa3,
                            $newAlternativa4,
                            $newCorreto,
                            $inProfessor)) {
            $msg = "Item $newQuestao atualizado";
            $alert = "success";
        }
    }
}

// INSERT
if( isset($_GET['questao']) &&
    isset($_GET['inAssunto']) &&
    isset($_GET['inImagem']) &&
    isset($_GET['inAtivo']) &&
    isset($_GET['inDificuldade']) &&
    isset($_GET['alternativa1']) &&
    isset($_GET['alternativa2']) &&
    isset($_GET['alternativa3']) &&
    isset($_GET['alternativa4']) &&
    isset($_GET['correto']) &&
    isset($_SESSION['codProfessor'])) {
    if($_GET['questao'] != '') {
        $questao = $_GET['questao'];
        $inAssunto = $_GET['inAssunto'];
        $inImagem = $_GET['inImagem'];
        $inAtivo = $_GET['inAtivo'];
        $inDificuldade = $_GET['inDificuldade'];
        $alternativa1 = $_GET['alternativa1'];
        $alternativa2 = $_GET['alternativa2'];
        $alternativa3 = $_GET['alternativa3'];
        $alternativa4 = $_GET['alternativa4'];
        $correto = $_GET['correto'];
        $inProfessor = $_SESSION['codProfessor'];
        if(insertQuestao(   $db,
                            $questao, 
                            $inAssunto, 
                            $inImagem, 
                            $inAtivo, 
                            $inDificuldade, 
                            $alternativa1, 
                            $alternativa2, 
                            $alternativa3, 
                            $alternativa4, 
                            $correto, 
                            $inProfessor)) {
            $msg = "$questao inserida com sucesso";
            $alert = "success";
        }
    }
}

// DELETE
if(isset($_GET['del'])) {
    $del = $_GET['del'];
    if(delQuestao($db, $del)) {
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
$questoes = getQuestao($db, $order, $limit);

include "../view/shared/header.php";
include "../view/shared/menu.php";
include "../view/questao.php";
include "../view/shared/footer.php";

$assuntos = getAssunto($db, $order);
$imagens = getImagem($db, $order);
include "../view/questao_modal.php";