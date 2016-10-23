
    <main>
        <section id="tabelaProfessor">
            <div class="container">
				<h3 class="text-center">Professores</h3>
				<h4 class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda molestias, reprehenderit dicta expedita officia sequi velit in omnis alias, repellat consequuntur possimus impedit unde deserunt corrupti libero quam doloribus consectetur.</h4>
				<hr>	
                <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <strong class='text-<?php echo $erro; ?>'><?php if(isset($msg)) echo $msg; ?></strong>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <h5>Cadastro</h5>

                        <form class="form-group" method="post">
                            <input class="form-control" placeholder="Nome" type="text" name="nome">
                            <input class="form-control" placeholder="Email" type="text" name="email">
                            <input class="form-control" placeholder="Senha" type="password" name="senha">
                            <input class="form-control" placeholder="idSenac" type="number" name="idsenac">
                            <select name="tipo" class="form-control">
                                <option value="P">P</option>
                                <option value="A">A</option>
                            </select>
                            <button class="btn btn-primary" type="submit">Cadastrar</button>
                        </form>
                    </div>
                </div>              
                <hr>
                
                <table class="table table-striped">
                    <thead>
                        <!--<th class="text-center">#</th>-->
                        <th class="text-center">Nome</th>
                        <th class="text-center">E-mail</th>
                        <th class="text-center">codSenac</th>
                        <th class="text-center">Permição</th>
                        <th class="text-center">Controle</th>
                    </thead>
                    <tbody>

                        <?php foreach($professores as $key => $value) { ?>
                            <tr>
                            
                                <?php foreach($value as $key2 => $value2){ ?>

                                    <?php
                                        if($key2 != 0) { ?>
                                        
                                            <td class="text-center"><?php echo $value2 ?></td>
                                        
                                        <?php }

                                        if($key2 == 0) {
                                            $teste = $value2;
                                        }
                                        if($key2 == 1) {
                                            $old = $value2;
                                        }
                                    ?>

                                <?php }; ?>                                

                                <td class='text-center'> 
                                    <a href="professor-edit.php?edit=<?php echo $teste ?>&old=<?php echo $old ?>"><i class='fa fa-pencil' aria-hidden='true'></i></a> 
                                    <a href="?del=<?php echo $key ?>"><i class='fa fa-times' aria-hidden='true'></i></a> 
                                </td>

                                <?php }; ?>

                            </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>