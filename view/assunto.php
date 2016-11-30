

	<main>

		<section id="tabelaArea">
			<div class="container">

				<h3 class="text-center">Assunto</h3>
                    
                <hr>

                <div class="col-xs-2">
                    <a href="" class="btn btn-quiz" data-toggle="modal" data-target="#myModal"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Adicionar Assunto</a>
                </div>
                <div class="col-xs-10">
                
                    <?php if(isset($msg) && isset($alert)) echo "<strong class='text-$alert'>$msg</strong>"; ?>
                
                </div>

				<table class="table table-striped">
					<thead>
						<tr>
							<th class="text-left">
                                <a href="?order=<?php echo $toggleOrder; ?>&limit=<?php echo $limit; ?>">
                                    Assunto <i class="fa fa-sort" aria-hidden="true"></i></i>
                                </a>
                            <th>
                                &Aacute;rea
                            </th>
                            </th>
							<th class="text-right">Controle</th>
						</tr>
					</thead>
					<tbody>

                        <?php 
                        
                            foreach($assuntos as $key => $value) {
                                echo "<tr>";
                                foreach($value as $key2 => $value2) {
                                    if($key2 == 0) {
                                        echo "<td class='text-left'>$value2</td>";
                                        $descricao = $value2;
                                    } 
                                    if ($key2 == 1) {
                                        echo "<td class='text-left'>$value2</td>";
                                        $area = $value2;
                                    } 
                                    if($key2 == 2) {
                                        $codArea = $value2;
                                    }
                                    if($key2 == 3) {
                                        $codAssunto = $value2;
                                        echo    "<td class='text-right'>
                                                    <a class='data-edit-assunto' data-edit-assunto='$descricao|$codArea|$codAssunto' href='' data-toggle='modal' data-target='#editModal'><i class='fa fa-pencil' aria-hidden='true'></i></a>
                                                    <a href='?del=$value2'><i class='fa fa-times' aria-hidden='true'></i></a>
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