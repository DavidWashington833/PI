<?php

// ==================== SELECT ====================
function getQuestao($db, $order, $limit) {
    $query =    odbc_exec($db, 
                    "SELECT     q.textoQuestao, 
                                a.descricao AS assunto, 
                                q.ativo, 
                                q.dificuldade, 
                                p.nome, 
                                i.tituloImagem, 
                                i.codImagem, 
                                q.codQuestao,
                                a.codAssunto
                    FROM questao as q INNER JOIN assunto as a
                    ON q.codAssunto = a.codAssunto
                    LEFT JOIN imagem as i
                    ON q.codImagem = i.codImagem
                    INNER JOIN professor as p
                    ON p.codProfessor = q.codProfessor
                    ORDER BY q.textoQuestao $order
                    OFFSET 0 ROWS FETCH NEXT $limit ROWS ONLY"
                );    
    while($result = odbc_fetch_array($query)) {
        $get[$result['codQuestao']] =  array(
                                        $result['textoQuestao'],
                                        $result['assunto'],
                                        $result['ativo'],
                                        $result['dificuldade'],
                                        $result['nome'],
                                        $result['tituloImagem'],
                                        $result['codImagem'],
                                        $result['codQuestao'],
                                        $result['codAssunto']
                                    ); 
    }

    return $get;
}

// ==================== SELECT(ASSUNTO) ====================
function getAssunto($db, $order) {
    $query =    odbc_exec($db, 
                    "SELECT descricao, codAssunto
                    FROM assunto"
                );    
    while($result = odbc_fetch_array($query)) {
        $get[$result['codAssunto']] =  array(
                                        $result['descricao'],
                                        $result['codAssunto']
                                    ); 
    }
    return $get;
}

// ==================== SELECT(IMAGEM) ====================
function getImagem($db, $order) {
    $query =    odbc_exec($db, 
                    "SELECT tituloImagem, codImagem
                    FROM imagem"
                );    
    while($result = odbc_fetch_array($query)) {
        $get[$result['codImagem']] =  array(
                                        $result['tituloImagem'],
                                        $result['codImagem']
                                    ); 
    }
    return $get;
}

// ==================== DELETE ====================
function delQuestao($db, $del) {
    if(odbc_exec($db, 
        "DELETE FROM alternativa
        WHERE codQuestao = $del"
    ) && odbc_exec($db, 
        "DELETE FROM questao
        WHERE codQuestao = $del")) {
        return true;
    } else {
        return false;
    }
}

// ==================== INSERT ====================
function insertQuestao(     $db,
                            $questao, 
                            $assunto, 
                            $imagem, 
                            $ativo, 
                            $dificuldade, 
                            $alternativa1, 
                            $alternativa2, 
                            $alternativa3, 
                            $alternativa4, 
                            $correto, 
                            $professor) {

    $alter1 = 0;
    $alter2 = 0;
    $alter3 = 0;
    $alter4 = 0;

    switch($correto) {
        case "alter1":
            $alter1 = 1;
            break;
        case "alter2":
            $alter2 = 1;
            break;
        case "alter3":
            $alter3 = 1;
            break;
        case "alter4":
            $alter4 = 1;
    }

    if(odbc_exec($db, 
        "INSERT INTO questao
        (textoQuestao, codAssunto, codImagem, codTipoQuestao, codProfessor, ativo, dificuldade)
        VALUES
        ('$questao', $assunto , $imagem, 'A', $professor, $ativo, '$dificuldade')"
    )) {

        $query = odbc_exec($db, 'SELECT TOP 1 codQuestao FROM questao ORDER BY codQuestao DESC');

        while($result = odbc_fetch_array($query)) {
            $last = $result['codQuestao'];
        }

        odbc_exec($db, "INSERT INTO alternativa
        (codQuestao, codAlternativa, textoAlternativa, correta)
        VALUES
        ($last, 1, '$alternativa1', $alter1)");
        odbc_exec($db, "INSERT INTO alternativa
        (codQuestao, codAlternativa, textoAlternativa, correta)
        VALUES
        ($last, 2, '$alternativa2', $alter2)");
        odbc_exec($db, "INSERT INTO alternativa
        (codQuestao, codAlternativa, textoAlternativa, correta)
        VALUES
        ($last, 3, '$alternativa3', $alter3)");
        odbc_exec($db, "INSERT INTO alternativa
        (codQuestao, codAlternativa, textoAlternativa, correta)
        VALUES
        ($last, 4, '$alternativa4', $alter4)");
        return true;
    } else {
        return false;
    }
}

// ==================== UPDATE ====================
function updateQuestao( $db, 
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
                        $inProfessor) {
    $alter1 = 0;
    $alter2 = 0;
    $alter3 = 0;
    $alter4 = 0;

    switch($newCorreto) {
        case "alter1":
            $alter1 = 1;
            break;
        case "alter2":
            $alter2 = 1;
            break;
        case "alter3":
            $alter3 = 1;
            break;
        case "alter4":
            $alter4 = 1;
    }

    if(odbc_exec($db, 
        "UPDATE questao
        SET
        textoQuestao = '$newQuestao',
        codAssunto = '$newAssunto',
        codImagem = '$newImagem',
        codTipoQuestao = 'A',
        codProfessor = '$inProfessor',
        ativo = '$newAtivo',
        dificuldade = '$newDificuldade'
        WHERE codQuestao = $idQuestao"
    ) &&
    odbc_exec($db, 
        "UPDATE alternativa
        SET 
        textoAlternativa = '$newAlternativa1',
        correta = $alter1
        WHERE codQuestao = $idQuestao AND codAlternativa = 1"
    ) &&
    odbc_exec($db, 
        "UPDATE alternativa
        SET 
        textoAlternativa = '$newAlternativa2',
        correta = $alter2
        WHERE codQuestao = $idQuestao AND codAlternativa = 2"
    ) &&
    odbc_exec($db, 
        "UPDATE alternativa
        SET 
        textoAlternativa = '$newAlternativa3',
        correta = $alter3
        WHERE codQuestao = $idQuestao AND codAlternativa = 3"
    ) &&
    odbc_exec($db, 
        "UPDATE alternativa
        SET 
        textoAlternativa = '$newAlternativa4',
        correta = $alter4
        WHERE codQuestao = $idQuestao AND codAlternativa = 4"
    )) {
        return true;
    } else {
        return false;
    }
}