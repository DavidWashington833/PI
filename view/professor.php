
    <main>
        <section id="tabelaProfessor">
            <div class="container">
				<h3 class="text-center">Professores</h3>
				<hr>	
                
                <div class="col-xs-2">
                    <a href="" class="btn btn-quiz" data-toggle="modal" data-target="#myModal"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Adicionar Item</a>
                </div>       
                
                <table class="table table-striped">
                    <thead>
                        <!--<th class="text-center">#</th>-->
                        <th class="text-center">Nome</th>
                        <th class="text-center">E-mail</th>
                        <th class="text-center">codSenac</th>
                        <th class="text-center">Permição</th>
                        
                        <?php if($_SESSION['tipoProfessor'] == "A") { ?>

                        <th class="text-center">Controle</th>

                        <?php } ?>

                    </thead>
                    <tbody>

                        <?php foreach($professores as $key => $value) { ?>
                            <tr>
                            
                                <?php foreach($value as $key2 => $value2){ ?>

                                    <?php if($key2 != 0) { ?>
                                        
                                        <td class="text-center"><?php echo $value2 ?></td>
                                        
                                    <?php }
                                    
                                    switch($key2) {
                                        case 0:
                                            $edit = $value2;
                                            break;
                                        case 1:
                                            $oldName = $value2;
                                            break;
                                        case 2:
                                            $oldEmail = $value2;
                                            break;
                                        case 3:
                                            $oldIdsenac = $value2;
                                            break;
                                    }

                                } 
                                if($_SESSION['tipoProfessor'] == "A") { ?>                           

                                <td class='text-center'> 
                                    <a href="professor-edit.php?edit=<?php echo $edit ?>&oldName=<?php echo $oldName ?>&oldEmail=<?php echo $oldEmail ?>&oldIdsenac=<?php echo $oldIdsenac ?>"><i class='fa fa-pencil' aria-hidden='true'></i></a> 
                                    <a href="?del=<?php echo $key ?>"><i class='fa fa-times' aria-hidden='true'></i></a> 
                                </td>

                                <?php }}; ?>

                            </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>