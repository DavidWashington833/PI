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
	if (!odbc_exec($db, 'DELETE FROM Questao WHERE codQuestao = ' . $_GET['del'])) {
		$msg = "ERRO: Problema ao apagar o registro.";
		$erro = "danger";
	} else {
		$msg = "Registro apagado com sucesso.";
		$erro = "success";
	}
}*/

/* ================== Editando dados da tabela Area ================== 
if(	isset($_POST['newQuestao']) &&  
	isset($_POST['newAssunto']) &&  
	isset($_POST['newImagem']) &&  
	isset($_POST['newTipoQuestao']) &&  
	isset($_POST['newProfessor']) &&  
	isset($_POST['newAtivo']) &&  
	isset($_POST['newDificuldade'])){
	
	$idQuestao = $_POST['idQuestao'];
	$newQuestao = $_POST['newQuestao'];
	$newAssunto = $_POST['newAssunto'];
	$newImagem = $_POST['newImagem'];
	$newTipoQuestao = $_POST['newTipoQuestao'];
	$newProfessor = $_POST['newProfessor'];
	$newAtivo = $_POST['newAtivo'];
	$newDificuldade = $_POST['newDificuldade'];

	if(odbc_exec($db,"	UPDATE Questao 	SET 	textoQuestao = '$newQuestao',
												codAssunto = '$newAssunto',
												codImagem = '$newImagem',
												codTipoQuestao = '$newTipoQuestao',
												codProfessor = '$newProfessor',
												ativo = '$newAtivo',
												dificuldade = '$newDificuldade'
										WHERE codQuestao = {$_POST['idQuestao']}")){
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
	$professores[$result['codProfessor']] = array($result['codProfessor'], 
                                            $result['nome'], 
                                            $result['email'], 
                                            $result['idSenac'], 
                                            $result['tipo']);
}


/* ================== Passa tabela para a $assutons ================== */
$query = odbc_exec($db,'SELECT codAssunto, descricao, codArea FROM Assunto');

while($result = odbc_fetch_array($query)) {
	$assuntos[$result['codAssunto']] = array($result['codAssunto'], $result['descricao'], $result['codArea']);
}


/* ================== Passa tabela para a $questoes ================== */
$query = odbc_exec($db,'SELECT  codQuestao,
                                textoQuestao,
                                codAssunto,
                                codImagem,
                                codTipoQuestao,
                                codProfessor,
                                ativo,
                                dificuldade
                        FROM Questao');

while($result = odbc_fetch_array($query)) {
	$questoes[$result['codQuestao']] = array(   $result['codQuestao'], 
                                                $result['textoQuestao'],
                                                $result['codAssunto'],
                                                $result['codImagem'],
                                                $result['codTipoQuestao'],
                                                $result['codProfessor'],
                                                $result['ativo'],
                                                $result['dificuldade']);
}