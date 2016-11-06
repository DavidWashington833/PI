 
        <section id="editAssunto">
            <div class="container">
                <form class="form-group" action="questoes.php" method="post">
                    <input class="" type="text" name="idQuestao" value="<?php echo $_GET['edit'] ?>" hidden>
                    <input class="form-control" type="text" name="newQuestao" value="<?php echo $_GET['oldQuestao'] ?>">
                    <select class="form-control" name="newAssunto">

                        <?php 
                            foreach($assuntos as $key => $value) {
                                foreach($value as $key2 => $value2) {
                                    if($key2 == 1) { ?>
                                        <option value="<?php echo $key; ?>"><?php echo $value2; ?></option>
                                    <?php }
                                    
                                }
                            }
                        ?>

                    </select>
                    <select class="form-control" name="newProfessor">

                        <?php 
                            foreach($professores as $key => $value) {
                                foreach($value as $key2 => $value2) {
                                    if($key2 == 1) { ?>
                                        <option value="<?php echo $key; ?>"><?php echo $value2; ?></option>
                                    <?php }
                                    
                                }
                            }
                        ?>

                    </select>
                    <select class="form-control" name="newAtivo">
                        <option value="1">1</option>
                        <option value="0">0</option>
                    </select>
                    <select class="form-control" name="newDificuldade">
                        <option value="F">F</option>
                        <option value="M">M</option>
                        <option value="D">D</option>
                    </select>
                    <button class="btn btn-primary" type="submit">Editar</button>
                </form>
            </div>
        </section>