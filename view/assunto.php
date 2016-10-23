
    <main>
        <section id="tabelaAssunto">
            <div class="container">

				<h3 class="text-center">Assunto</h3>
				<h4 class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda molestias, reprehenderit dicta expedita officia sequi velit in omnis alias, repellat consequuntur possimus impedit unde deserunt corrupti libero quam doloribus consectetur.</h4>
				<hr>

                <div class="row">
					<div class="col-sm-6 col-xs-12">
						<strong class='text-<?php echo $erro; ?>'><?php if(isset($msg)) echo $msg; ?></strong>
					</div>
                    <div class="col-sm-6 col-xs-12">
						<h5>Cadastro</h5>
                        <form class="form-group" method="post">
                            <input class="form-control" placeholder="Assunto" type="text" name="assunto">
                            <select class="form-control" name="area">

                                <?php foreach($areas as $key => $value) { ?>

                                    <option value="<?php echo $key ?>"><?php echo $value ?></option>
                                    
                                <?php } ?>

                            </select>
                            <button class="btn btn-quiz" type="submit">Cadastrar</button>
                        </form>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <!--<th class="text-center">#</th>-->
                        <th class="text-center">Assunto</th>
                        <th class="text-center">Área</th>
                        <th class="text-center">Controle</th>
                    </thead>
                    <tbody>

                        <?php foreach($assuntos as $key => $value) { ?>

                            <tr>
                                
                                <?php 
                                foreach($value as $key2 => $value2){ ?>
                                    <?php
                                    switch($key2) {
                                        case 0: ?>
                                            <!--<td class="text-center"><?php echo $value2 ?></td>-->
                                        <?php break;
                                        case 1:
                                        $old = $value2 ?>
                                            <td class="text-center"><?php echo $value2 ?></td>
                                        <?php break;
                                        case 2:?>
                                            <td class="text-center"><?php echo $areas[$value2]; ?></td>                                        
                                    <?php }     
                                } ?>                                

                                <td class='text-center'> 
                                    <a href="assunto-edit.php?edit=<?php echo $key ?>&old=<?php echo $old ?>"><i class='fa fa-pencil' aria-hidden='true'></i></a> 
                                    <a href="?del=<?php echo $key ?>"><i class='fa fa-times' aria-hidden='true'></i></a> 
                                </td>

                                <?php }; ?>
                            </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>