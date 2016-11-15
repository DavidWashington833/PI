<?php

// ==================== SELECT ====================
function getImagem($db, $idImagem) {
    $query =    odbc_exec($db, 
                    "SELECT *
                    FROM imagem
                    WHERE codImagem = $idImagem"
                );    
    while($result = odbc_fetch_array($query)) {
        $get[$result['codImagem']] =  array(
                                        $result['codImagem'],
                                        $result['tituloImagem'],
                                        $result['bitmapImagem']
                                    ); 
    }
    return $get;
}