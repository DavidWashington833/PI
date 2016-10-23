<?php

/* ================== Passa dados para tabela Area ================== 
if(isset($_POST['area'])) {
	$area = $_POST['area'];
	if(odbc_exec($db, "INSERT INTO Area (descricao) VALUES ('" . $area . "')")) {
		$msg = "Area $area, inserida com sucesso.";
		$erro = "success";
	} else {
		$msg = "ERRO";
		$erro = "danger";
	}
}*/

/* ================== Deletar dados da tabela Area ================== 

if(isset($_GET['del']) && is_numeric($_GET['del'])) {
	if (!odbc_exec($db, 'DELETE FROM Area WHERE codArea = ' . $_GET['del'])) {
		$msg = "ERRO: Problema ao apagar o registro.";
		$erro = "danger";
	} else {
		$msg = "Registro apagado com sucesso.";
		$erro = "success";
	}
}*/

/* ================== Editando dados da tabela Area ================== 
if(isset($_POST['newArea'])){
	$newArea = $_POST['newArea'];
	if(odbc_exec($db,"	UPDATE Area SET descricao = '$newArea' WHERE codArea = {$_POST['idArea']}")){
		$msg = "Atualizado com sucesso";
		$erro = "success";
	} else{
		$msg = "ERRO";
		$erro = "danger";
	}
}*/

/* ================== Passa tabela para a $tipoQuestao ================== */
$query = odbc_exec($db,'SELECT codTipoQuestao, descricao FROM TipoQuestao');

while($result = odbc_fetch_array($query)) {
	$tipoQuestao[$result['codTipoQuestao']] = array($result['codTipoQuestao'], $result['descricao']);
}
