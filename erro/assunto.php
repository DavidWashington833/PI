<?php

if(odbc_error() == 23000) {
    $msg = "ERRO: Este assunto n&atilde;o pode ser deletado, pois est&aacute; sendo utilizado.";
    $alert = "danger";
}