<?php
// Define uma função que poderá ser usada para validar e-mails usando regexp
function validaEmail($email) {
	$conta = "^[a-zA-Z0-9\._-]+@";
	$domino = "[a-zA-Z0-9\._-]+.";
	$extensao = "([a-zA-Z]{2,100})$";
	$pattern = $conta.$domino.$extensao;
	if (ereg($pattern, $email))
		return true;
	else
		return false;
}
