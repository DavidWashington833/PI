 
        <section id="editAssunto">
            <div class="container">
                <form class="form-group" action="assunto.php" method="post">
                    <input class="from-control" type="text" name="idQuestao" value="<?php echo $_GET['edit'] ?>" hidden>
                    <input class="from-control" type="text" name="newQuestao" value="<?php echo $_GET['oldQuestao'] ?>">
                    <input class="from-control" type="text" name="newAtivo" value="<?php echo $_GET['oldAtivo'] ?>">
                    <input class="from-control" type="text" name="newDificuldade" value="<?php echo $_GET['oldDificuldade'] ?>">
                    <select class="form-control" name="newAssunto">
                        <?php foreach($assuntos as $key => $value) { ?>
                            <option value="<?php echo $key ?>"><?php echo $value ?></option>
                        <?php } ?>
                    </select>
                    <button class="btn btn-primary" type="submit">Editar</button>
                </form>
            </div>
        </section>