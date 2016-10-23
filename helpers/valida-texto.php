<?php

function validaTexto($texto) {
    $texto = preg_replace('/[^0-9a-zA-ZáàãâäéèêëíìîïóòõôöúùûüçÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÖÔÚÙÛÜÇ ]/','',$texto);
    return $texto;
}