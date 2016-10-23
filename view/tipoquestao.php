
    <main>
        <section id="tabelaTipoQuestao">
            <div class="container">
				<h3 class="text-center">Tipo Questão</h3>
				<h4 class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda molestias, reprehenderit dicta expedita officia sequi velit in omnis alias, repellat consequuntur possimus impedit unde deserunt corrupti libero quam doloribus consectetur.</h4>
				<hr>	
				
				<?php if(isset($msg)) echo "<strong class='text-$erro'>$msg</strong>"; ?>

				<!--<form class="form-group" method="post">
					<input class="form-control" placeholder="Assunto" type="text" name="assunto">
                    <select class="form-control" name="area">

                        <?php foreach($areas as $key => $value) { ?>

                            <option value="<?php echo $key ?>"><?php echo $value ?></option>
                            
                        <?php } ?>

                    </select>
					<button class="btn btn-primary" type="submit">Cadastrar</button>
				</form>-->

                <table class="table table-striped">
                    <thead>
                        <th class="text-center">#</th>
                        <th class="text-center">Tipo da Questão</th>
                        <!--<th class="text-center">Controle</th>-->
                    </thead>
                    <tbody>

                        <?php foreach($tipoQuestao as $key => $value) { ?>
                            <tr>
                                <?php foreach($value as $key2 => $value2){ ?>
                                    <td class="text-center"><?php echo $value2; ?></td>
                                <?php } ?>                                

                                <!--<td class='text-center'> 
                                    <a href="assunto-edit.php?edit=<?php echo $key ?>&old=<?php echo $old ?>"><i class='fa fa-pencil' aria-hidden='true'></i></a> 
                                    <a href="?del=<?php echo $key ?>"><i class='fa fa-times' aria-hidden='true'></i></a> 
                                </td>-->

                                <?php }; ?>
                            </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>