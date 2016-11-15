

	<main>

		<section id="tabelaArea">
			<div class="container">

				<h3 class="text-center">Questão</h3>
                    
                <hr>

                <div class="col-xs-2">
                    <a href="" class="btn btn-quiz" data-toggle="modal" data-target="#myModal"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Adicionar Item</a>
                </div>
                <div class="col-xs-10">
                
                    <?php if(isset($msg) && isset($alert)) echo "<strong class='text-$alert'>$msg</strong>"; ?>
                
                </div>

				<table class="table table-striped">
					<thead>
						<tr>
							<th class="text-left">
                                <a href="?order=<?php echo $toggleOrder; ?>&limit=<?php echo $limit; ?>">
                                    Questão <i class="fa fa-sort" aria-hidden="true"></i></i>
                                </a>
                            </th>
                            <th>
                                Assunto
                            </th>
                            <th>
                                Ativo
                            </th>
                            <th>
                                Dificuldade
                            </th>
                            <th>
                                Professor
                            </th>
                            <th>
                                Imagem
                            </th>
							<th class="text-right">Controle</th>
						</tr>
					</thead>
					<tbody>

                        <?php 
                        
                            foreach($questoes as $key => $value) {
                                echo "<tr>";
                                foreach($value as $key2 => $value2) {
                                    if($key2 == 0) {
                                        $descricao = $value2;
                                        echo "<td class='text-left'>$descricao</td>";
                                    } 
                                    if($key2 == 1) {
                                        $assunto = $value2;
                                        echo "<td class='text-left'>$assunto</td>";
                                    }
                                    if($key2 == 2) {
                                        $ativo = $value2;
                                        echo "<td class='text-left'>$ativo</td>";
                                    }
                                    if($key2 == 3) {
                                        $dificuldade = $value2;
                                        switch($dificuldade) {
                                            case "F":
                                                $nivel = "primary";
                                                break;
                                            case "M":
                                                $nivel = "warning";
                                                break;
                                            case "D":
                                                $nivel = "danger";
                                        }
                                        echo "<td class='text-left text-$nivel'><strong>$dificuldade</strong></td>";
                                    }
                                    if($key2 == 4) {
                                        $professor = $value2;
                                        echo "<td class='text-left'>$professor</td>";
                                    }
                                    if($key2 == 5) {
                                        $imagem = $value2;
                                        echo "<td class='text-left'>$imagem</td>";
                                    }
                                    if($key2 == 6) {
                                        $viewImagem = $value2;
                                    }
                                    if($key2 == 7) {
                                        $codArea = $value2;
                                        echo    "<td class='text-right'>
                                                    <a href='imagem.php?ver=$viewImagem' target='_blank'><i class='fa fa-file-image-o' aria-hidden='true'></i></a>
                                                    <a class='data-edit-questao' data-edit-questao='$descricao|$key' href='' data-toggle='modal' data-target='#editModal'><i class='fa fa-pencil' aria-hidden='true'></i></a>
                                                    <a href='?del=$key'><i class='fa fa-times' aria-hidden='true'></i></a>
                                                </td>";
                                    }
                                }
                                echo "</tr>";
                            }

                        ?>

					</tbody>
				</table>

                <a href="?order=<?php echo $order; ?>&limit=<?php echo $limit + 10; ?>" class="btn btn-quiz">Mais</a>

			</div>
		</section>
        
	</main>