

	<main>

		<section id="tabelaArea">
			<div class="container">

				<h3 class="text-center">&Aacute;rea</h3>
                    
                <hr>

                <div class="col-xs-2">
                    <a href="" class="btn btn-quiz" data-toggle="modal" data-target="#myModal"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Adicionar &Aacute;rea</a>
                </div>
                <div class="col-xs-10">
                
                    <?php if(isset($msg) && isset($alert)) echo "<strong class='text-$alert'>$msg</strong>"; ?>
                
                </div>

				<table class="table table-striped">
					<thead>
						<tr>
							<th class="text-left">
                                <a href="?order=<?php echo $toggleOrder; ?>&limit=<?php echo $limit; ?>">
                                    &Aacute;rea <i class="fa fa-sort" aria-hidden="true"></i></i>
                                </a>
                            </th>
							<th class="text-right">Controle</th>
						</tr>
					</thead>
					<tbody>

                        <?php 
                        
                            foreach($areas as $key => $value) {
                                echo "<tr>";
                                foreach($value as $key2 => $value2) {
                                    if($key2 == 0) {
                                        echo "<td class='text-left'>$value2</td>";
                                        $descricao = $value2;
                                    } else {
                                        $codArea = $value2;
                                        echo    "<td class='text-right'>
                                                    <a class='data-edit-area' data-edit-area='$descricao|$codArea' href='' data-toggle='modal' data-target='#editModal'><i class='fa fa-pencil' aria-hidden='true'></i></a>
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
        
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <a href='' class="close" data-dismiss="modal"><i class='fa fa-times' aria-hidden='true'></i></a>
                        <h4 class="modal-title">Adicionar &Aacute;rea</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="get">
                            <input type="text" class="form-control" placeholder="&Aacute;rea" name="area">
                            <button type="submit" class="btn btn-quiz">Adicionar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-quiz" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
        
        <!-- Modal -->
        <div id="editModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <a href='' class="close" data-dismiss="modal"><i class='fa fa-times' aria-hidden='true'></i></a>
                        <h4 class="modal-title">Editar &Aacute;rea</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="get">
                            <input type="text" class="" placeholder="Àrea" name="idArea" id="idArea" hidden>
                            <input type="text" class="form-control" placeholder="&Aacute;rea" name="newArea" id="newArea">
                            <button type="submit" class="btn btn-quiz">Editar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-quiz" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

	</main>