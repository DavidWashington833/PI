<?php

// ==================== SELECT ====================
function getAssunto($db, $order, $limit) {
    $query =    odbc_exec($db, 
                    "SELECT     assunto.descricao as assunto, 
                                area.descricao as area, 
                                assunto.codAssunto, 
                                area.codArea
                    FROM assunto INNER JOIN area
                    ON assunto.codArea = area.codArea
                    ORDER BY assunto.descricao $order
                    OFFSET 0 ROWS FETCH NEXT $limit ROWS ONLY"
                );    
    while($result = odbc_fetch_array($query)) {
        $get[$result['codAssunto']] =  array(
                                        $result['assunto'],
                                        $result['area'],
                                        $result['codArea'],
                                        $result['codAssunto']
                                    ); 
    }
    return $get;
}

// ==================== SELECT(AREA) ====================
function getArea($db, $order) {
    $query =    odbc_exec($db, 
                    "SELECT descricao, codArea
                    FROM area"
                );    
    while($result = odbc_fetch_array($query)) {
        $get[$result['codArea']] =  array(
                                        $result['descricao'],
                                        $result['codArea']
                                    ); 
    }
    return $get;
}


// ==================== DELETE ====================
function delArea($db, $del) {
    if(odbc_exec($db, 
        "DELETE FROM assunto
        WHERE codAssunto = $del"
    )) {
        return true;
    } else {
        return false;
    }
}

// ==================== INSERT ====================
function insertAssunto($db, $assunto, $area) {
    if(odbc_exec($db, 
        "INSERT INTO assunto
        (descricao, codArea)
        VALUES
        ('$assunto', '$area')"
    )) {
        return true;
    } else {
        return false;
    }
}

// ==================== UPDATE ====================
function updateAssunto($db, $idAssunto, $newAssunto, $newArea) {
    if(odbc_exec($db, 
        "UPDATE assunto
        SET
        descricao = '$newAssunto',
        codArea = '$newArea'
        WHERE codAssunto = $idAssunto"
    )) {
        return true;
    } else {
        return false;
    }
}