<?php

include "../integracao/loginFunc.php";
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
            $msg = "Quest&atilde;o $newQuestao atualizado";
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

// INSERT IMAGEM
if(isset($_FILES['imagem']) && isset($_POST['tituloImagem'])){
    if( substr($_FILES['imagem']['type'], 0, 5) == 'image' &&
        $_FILES['imagem']['error'] == 0 &&
        ($_FILES['imagem']['size'] > 0 && $_FILES['imagem']['size'] < 9000000)){
        //print_r($_FILES);
        $msg_sucesso = 'Arquivo recebido com sucesso';
        
        $file = fopen($_FILES['imagem']['tmp_name'],'rb');
        $fileParaDB = fread($file, filesize($_FILES['imagem']['tmp_name']));
        fclose($file);
        
        $stmt = odbc_prepare($db, 'INSERT INTO Imagem 
                                        (tituloImagem, bitmapImagem) 
                                        VALUES 
                                        (?,?)');             
        if(odbc_execute($stmt, array( $_POST['tituloImagem'],
                        $fileParaDB))){
                                    
            $msg_sucesso .= '<br>Imagem armazenada';                   
        }else{
            $msg_erro .= 'Erro ao salvar a Imagem.';
        }       
    }else{
        if($_FILES['imagem']['size'] > 9000000){
            $base = log($_FILES['imagem']['size']) / log(1024);
            $sufixo = array("", "K", "M", "G", "T");
            $tam_em_mb = round(pow(1024, $base - floor($base)),2).$sufixo[floor($base)];
            $msg_erro = 'Tamanho m&aacute;ximo de imagem 9 Mb. Tamanho da imagem enviada: '.$tam_em_mb;
        }else{
            $msg_erro = 'S&oacute; s&atilde;o aceitos arquivos de imagem. Tamanho da imagem: '.$_FILES['imagem']['size'];
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

include "../erro/questao.php";
include "../view/shared/header.php";
include "../view/shared/menu.php";
include "../view/questao.php";
include "../view/shared/footer.php";

$assuntos = getAssunto($db, $order);
$imagens = getImagem($db, $order);
include "../view/questao_modal.php";
