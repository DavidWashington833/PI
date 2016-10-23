<?php

/* ================== Deletar dados da tabela Area ================== */
if(isset($_GET['del']) && is_numeric($_GET['del'])) {
	if (!odbc_exec($db, 'DELETE FROM Professor WHERE codProfessor = ' . $_GET['del'])) {
		$msg = "ERRO: Problema ao apagar o registro.";
		$erro = "danger";
	} else {
		$msg = "Registro apagado com sucesso.";
		$erro = "success";
	}
}

/* ================== Passa dados para tabela Area ================== */
if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['idsenac']) && isset($_POST['tipo'])) {
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$idsenac = $_POST['idsenac'];
	$tipo = $_POST['tipo'];
	$validaIdsenac = strlen($idsenac);
	if(validaEmail($email)) {
		if(!is_numeric($idsenac) || $validaIdsenac != 6) {
			$msg = "ERRO: idSenac inválido";
			$erro = "danger";
		} else {
			if(odbc_exec($db, "INSERT INTO Professor (nome, email, senha, idSenac, tipo) VALUES ('$nome', '$email', HASHBYTES('SHA1', '$senha'), '$idsenac', '$tipo')")) {
				$msg = "Professor $nome, cadastrado com sucesso.";
				$erro = "success";
			} else {
				$msg = "ERRO";
				$erro = "danger";
			}
		}
	} else {
			$msg = "ERRO: E-mail inválido";
			$erro = "danger";
	}
}


/* ================== Editando dados da tabela Area ================== */
if(
	isset($_POST['idProfessor']) && 
	isset($_POST['newName']) && 
	isset($_POST['newEmail']) && 
	isset($_POST['newSenha']) &&
	isset($_POST['newIdSenac']) &&
	isset($_POST['newTipo'])
){

	$idProfessor = $_POST['idProfessor'];
	$newName = $_POST['newName'];
	$newEmail = $_POST['newEmail'];
	$newSenha = $_POST['newSenha'];
	$newIdSenac = $_POST['newIdSenac'];
	$newTipo = $_POST['newTipo'];
	if(odbc_exec($db,"	UPDATE Professor SET 
											nome = '$newName', 
											email = '$newEmail', 
											senha = HASHBYTES('SHA1', '$newSenha'), 
											idSenac = '$newIdSenac', 
											tipo = '$newTipo' 
										WHERE codProfessor = {$idProfessor}")){
		$msg = "Atualizado com sucesso";
		$erro = "success";
	} else{
		$msg = "ERRO";
		$erro = "danger";
	}
}

/* ================== Passa tabela para a $professores ================== */
$query = odbc_exec($db,'SELECT      codProfessor, 
                                    nome,
                                    email, 
                                    idSenac, 
                                    tipo 
                        FROM Professor');

while($result = odbc_fetch_array($query)) {
	$professores[$result['codProfessor']] = array(
											$result['codProfessor'], 
                                            $result['nome'], 
                                            $result['email'], 
                                            $result['idSenac'], 
                                            $result['tipo']);
}