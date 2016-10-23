

	<main>

		<section id="tabelaArea">
			<div class="container">
				<h3 class="text-center">Área</h3>
				<h4 class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda molestias, reprehenderit dicta expedita officia sequi velit in omnis alias, repellat consequuntur possimus impedit unde deserunt corrupti libero quam doloribus consectetur.</h4>
				<hr>				
				<div class="row">
					<div class="col-sm-6 col-xs-12">
						<strong class='text-<?php echo $erro; ?>'><?php if(isset($msg)) echo $msg; ?></strong>
					</div>
					<div class="col-sm-6 col-xs-12">
						<h5>Cadastro</h5>
						<form class="form-group" method="post">
							<input class="form-control" placeholder="Assunto" type="text" name="area">
							<button class="btn btn-quiz" type="submit">Cadastrar</button>
						</form>
					</div>
				</div>				
				<hr>
				<table class="table table-striped">
					<thead>
						<tr>
							<!--<th class="text-center">#</th>-->
							<th class="text-center">Área</th>
							<th class="text-center">Controle</th>
						</tr>
					</thead>
					<tbody>

                        <?php foreach($areas as $key => $value) { ?>

							<tr>
								<?php foreach($value as $key2 => $value2){ 
									if($key2 == 0) { $id = $value2; ?>

										<!--<td class="text-center"><?php echo $value2; ?></td>-->										
									<?php } else { $old = $value2; ?>
									
										<td class="text-center"><?php echo $value2; ?></td>
									<?php }
								} ?>                         
										<td class='text-center'> 
											<a href="area-edit.php?edit=<?php echo $id ?>&old=<?php echo $old ?>"><i class='fa fa-pencil' aria-hidden='true'></i></a> 
											<a href="?del=<?php echo $key ?>"><i class='fa fa-times' aria-hidden='true'></i></a> 
										</td>

							</tr>

						<?php }; ?>

					</tbody>
				</table>
			</div>
		</section>

	</main>