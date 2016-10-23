
    <main>
        <section id="tabelaQuestao">
            <div class="container">
				<h3 class="text-center">Questões</h3>
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

                <table class="table">
                    <thead>
                        <th class="text-left">#</th>
                        <th class="text-center">Questão</th>
                        <th class="text-center">Assunto</th>
                        <th class="text-center">Imagem</th>
                        <th class="text-center">Tipo de Questão</th>
                        <th class="text-center">Professor</th>
                        <th class="text-center">Ativo</th>
                        <th class="text-center">Difuculdade</th>
                        <th class="text-right">Controle</th>
                    </thead>
                    <tbody>
                    
                        <?php foreach($questoes as $key => $value) { ?>

                            <tr>
                                
                                <?php foreach($value as $key2 => $value2){
                                    if($key2 == 7) { 
                                        switch($value2) {
                                            case "F": ?>
                                            
                                                <td class="text-center text-primary"><strong><?php echo $value2; ?></strong></td>

                                            <?php break; ?>
                                            <?php case "M": ?>

                                                <td class="text-center text-warning"><strong><?php echo $value2; ?></strong></td>

                                            <?php break; ?>
                                            <?php case "D": ?>

                                                <td class="text-center text-danger"><strong><?php echo $value2; ?></strong></td>
                                                                                        
                                        <?php } ?>
                                    <?php } if($key2 == 2) { ?>

                                                <td class="text-center"><?php echo $assuntos[$value2][1]; ?></td>

                                    <?php } if($key2 == 5) { ?>

                                                <td class="text-center"><?php echo $professores[$value2][1]; ?></td>

                                    <?php }  if($key2 != 2 && $key2 !== 7 && $key2 !== 5) { ?>
                                        <td class="text-center"><?php echo $value2; ?></td>
                                    <?php }
                                } ?>                                

                                <td class='text-right'> 
                                    <a href="questoes-edit.php?edit=<?php echo $key ?>&old=<?php echo $old ?>"><i class='fa fa-pencil' aria-hidden='true'></i></a> 
                                    <a href="?del=<?php echo $key ?>"><i class='fa fa-times' aria-hidden='true'></i></a> 
                                </td>

                                <?php }; ?>
                            </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>