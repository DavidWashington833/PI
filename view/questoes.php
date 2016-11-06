
    <main>
        <section id="tabelaQuestao">
            <div class="container">
				<h3 class="text-center">Questões</h3>
				<h4 class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda molestias, reprehenderit dicta expedita officia sequi velit in omnis alias, repellat consequuntur possimus impedit unde deserunt corrupti libero quam doloribus consectetur.</h4>
				<hr>	
                <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <strong class='text-<?php echo $erro; ?>'><?php if(isset($msg)) echo $msg; ?></strong>
                    </div>
                    <div class="col-sm-6 col-xs-12">

                        <form class="form-group" method="post">
                            <label>Questão</label>
                            <input class="form-control" placeholder="Questão" type="text" name="textoQuestao">
                            <label>Assunto</label>
                            <select name="codAssunto" class="form-control">
                            
                                <?php foreach($assuntos as $key => $value) { ?>
                                    <?php foreach($value as $key2 => $value2) { ?>
                                        <?php if($key2 == 1) { ?>
                                            
                                            <option value="<?php echo $key ?>"><?php echo $value2 ?></option>
                                        
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>

                            </select>
                            <label>Professor</label>
                            <select name="codProfessor" class="form-control">

                                <?php foreach($professores as $key => $value) { ?>
                                    <?php foreach($value as $key2 => $value2) { ?>
                                        <?php if($key2 == 1) { ?>

                                            <option value="<?php echo $key; ?>"><?php echo $value2; ?></option>

                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>

                            </select>
                            <label>Ativo</label>
                            <select name="ativo" class="form-control">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                            <label>Difuculdade</label>
                            <select name="dificuldade" class="form-control">
                                <option value="F">F</option>
                                <option value="M">M</option>
                                <option value="D">D</option>
                            </select>
                            <button class="btn btn-primary" type="submit">Cadastrar</button>
                        </form>
                    </div>
                </div>              
                <hr>

                <table class="table">
                    <thead>
                        <th class="text-center">Questão</th>
                        <th class="text-center">Assunto</th>
                        <th class="text-center">Imagem</th>
                        <!---<th class="text-center">Tipo de Questão</th>-->
                        <th class="text-center">Professor</th>
                        <th class="text-center">Ativo</th>
                        <th class="text-center">Difuculdade</th>
                        <th class="text-center">Controle</th>
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

                                    <?php } if($key2 == 1) { ?>

                                                <?php $oldQuestao = $value2; ?>

                                    <?php } if($key2 == 2) { ?>

                                                <td class="text-center"><?php echo $assuntos[$value2][1]; ?></td>

                                    <?php } if($key2 == 5) { ?>

                                                <td class="text-center"><?php echo $professores[$value2][1]; ?></td>

                                    <?php }  if($key2 != 2 && $key2 !== 7 && $key2 !== 5 && $key2 !== 0 && $key2 !== 4) { ?>

                                        <td class="text-center"><?php echo $value2; ?></td>
                                        
                                    <?php }
                                } ?>                                

                                <td class='text-center'> 
                                    <a href="questoes-edit.php?edit=<?php echo $key ?>&oldQuestao=<?php echo $oldQuestao ?>"><i class='fa fa-pencil' aria-hidden='true'></i></a> 
                                    <a href="?del=<?php echo $key ?>"><i class='fa fa-times' aria-hidden='true'></i></a> 
                                </td>

                                <?php }; ?>
                            </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>