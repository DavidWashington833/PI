<?php

// ==================== SELECT ====================
function getArea($db, $order, $limit) {
    $query =    odbc_exec($db, 
                    "SELECT descricao, codArea
                    FROM area
                    ORDER BY descricao $order
                    OFFSET 0 ROWS FETCH NEXT $limit ROWS ONLY"
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
   $query = odbc_exec($db, 
             "SELECT codAssunto, codArea
              FROM assunto
              WHERE codArea = $del"
    );
    if(odbc_num_rows($query) > 0){
        return false;
    } else {
        odbc_exec($db, 
             "DELETE FROM area
             WHERE codArea = $del
             ");
        return true;
    }
}

// ==================== INSERT ====================
function insertArea($db, $area) {
    if(odbc_exec($db, 
        "INSERT INTO area
        (descricao)
        VALUES
        ('$area')"
    )) {
        return true;
    } else {
        return false;
    }
}

// ==================== UPDATE ====================
function updateArea($db, $newArea, $idArea) {
    if(odbc_exec($db, 
        "UPDATE area
        SET
        descricao = '$newArea'
        WHERE codArea = $idArea"
    )) {
        return true;
    } else {
        return false;
    }
}