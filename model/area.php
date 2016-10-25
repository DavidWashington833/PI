<?php

/* ================== Deletar dados da tabela Area ================== */
if(isset($_GET['del']) && is_numeric($_GET['del'])) {
	if (!odbc_exec($db, 'DELETE FROM Area WHERE codArea = ' . $_GET['del'])) {
		$msg = "ERRO: Problema ao apagar o registro.";
		$erro = "danger";
		if(odbc_error() == 23000) {
			$msg = "ERRO: Este item está sendo usado na tabela assuntos.";
			$erro = "danger";
		}
	} else {
		$msg = "Registro apagado com sucesso.";
		$erro = "success";
	}
}

/* ================== Passa tabela para a $areas ================== */
$query = odbc_exec($db,'SELECT codArea, descricao FROM Area');

while($result = odbc_fetch_array($query)) {
	$areas[$result['codArea']] = 	array(
										$result['codArea'], 
										$result['descricao']
									);
}

/* ================== Passa dados para tabela Area ================== */
if(isset($_POST['area'])) {
	$area = $_POST['area'];
	if($area == "") {
		$msg = "ERRO: Espaço em branco";
		$erro = "danger";
	} else {
		if(odbc_exec($db, "INSERT INTO Area (descricao) VALUES ('$area')")) {
			$msg = "Área $area, inserida com sucesso.";
			$erro = "success";
		} else {
			$msg = "ERRO: Problema ao inserir o registro.";
			$erro = "danger";
		}
	}
}

/* ================== Editando dados da tabela Area ================== */
if(isset($_POST['newArea'])){
	$newArea = $_POST['newArea'];

	if($newArea == "") {
		$msg = "ERRO: Espaço em branco";
		$erro = "danger";
	} else {
		if(odbc_exec($db,"	UPDATE Area SET descricao = '$newArea' WHERE codArea = {$_POST['idArea']}")){
			$msg = "Atualizado com sucesso";
			$erro = "success";
		} else{
			$msg = "ERRO: Item não atualizado";
			$erro = "danger";
		}
	}
}


/* ================== Passa tabela para a $areas ================== */
$query = odbc_exec($db,'SELECT codArea, descricao FROM Area');

while($result = odbc_fetch_array($query)) {
	$areas[$result['codArea']] = 	array(
										$result['codArea'], 
										$result['descricao']
									);
}