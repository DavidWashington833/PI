<?php

/* ================== Deletar dados da tabela Assunto ================== */

if(isset($_GET['del']) && is_numeric($_GET['del'])) {
	if (!odbc_exec($db, 'DELETE FROM Assunto WHERE codAssunto = ' . $_GET['del'])) {
		$msg = "ERRO: Problema ao apagar o registro.";
		$erro = "danger";
	} else {
		$msg = "Registro apagado com sucesso.";
		$erro = "success";
	}
}

/* ================== Passa tabela para a $assutons ================== */
$query = odbc_exec($db,'SELECT codAssunto, descricao, codArea FROM Assunto');

while($result = odbc_fetch_array($query)) {
	$assuntos[$result['codAssunto']] = array($result['codAssunto'], $result['descricao'], $result['codArea']);
}

/* ================== Passa dados para tabela Assunto ================== */
if(isset($_POST['assunto']) && isset($_POST['area'])) {
	$assunto = $_POST['assunto'];
	$assunto = preg_replace('/[^0-9a-zA-ZáàãâäéèêëíìîïóòõôöúùûüçÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÖÔÚÙÛÜÇ ]/','',$assunto);
	$area = $_POST['area'];

	foreach($assuntos as $key => $value){// Verifica se tem algum item igual 
		foreach($value as $key2 => $value2) {
			if($key2 == 1) { 
				if($assunto == $value2) {
					$validaDuplicidade = 0;
					break;
				}
			} 
		}
	}

	if($assunto == "") {
		$msg = "ERRO: Espaço em branco";
		$erro = "danger";
	} else {
		if(isset($validaDuplicidade)) {     
			$msg = "ERRO: $assunto já exite";
			$erro = "danger";
		} else {
			if(odbc_exec($db, "INSERT INTO Assunto (descricao, codArea) VALUES ('$assunto', '$area')")) {
				$msg = "Assunto $assunto, inserida com sucesso.";
				$erro = "success";
			} else {
				$msg = "ERRO: Problema ao inserir o registro.";
				$erro = "danger";
			}
		}	
	}
}

/* ================== Editando dados da tabela Assunto ================== */
if(isset($_POST['newAssunto']) && isset($_POST['newArea'])){
	$newAssunto = $_POST['newAssunto'];
	$newArea = $_POST['newArea'];

	foreach($assuntos as $key => $value){// Verifica se tem algum item igual 
		foreach($value as $key2 => $value2) {
			if($key2 == 1) { 
				if($newAssunto == $value2) {
					$validaDuplicidade = 0;
					break;
				}
			} 
		}
	}
	
	if($newAssunto == "") {
		$msg = "ERRO: Espaço em branco";
		$erro = "danger";		
	} else {
		if(isset($validaDuplicidade)) {
			$msg = "ERRO: $newAssunto já existe";
			$erro = "danger";
		} else {
			if(odbc_exec($db,"	UPDATE Assunto SET descricao = '$newAssunto', codArea = '$newArea' WHERE codAssunto = {$_POST['idAssunto']}")){
				$msg = "Atualizado com sucesso";
				$erro = "success";
			} else{
				$msg = "ERRO: Item não atualizado";
				$erro = "danger";
			}
		}
	}
}

/* ================== Passa tabela para a $areas ================== */
$query = odbc_exec($db,'SELECT codArea, descricao FROM Area');

while($result = odbc_fetch_array($query)) {
	$areas[$result['codArea']] = $result['descricao'];
}

/* ================== Passa tabela para a $assutons ================== */
$query = odbc_exec($db,'SELECT codAssunto, descricao, codArea FROM Assunto');

while($result = odbc_fetch_array($query)) {
	$assuntos[$result['codAssunto']] = array($result['codAssunto'], $result['descricao'], $result['codArea']);
}
