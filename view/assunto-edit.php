 
        <section id="editAssunto">
            <div class="container">
                <form class="form-group" action="assunto.php" method="post">
                    <input class="from-control" type="text" name="idAssunto" value="<?php echo $_GET['edit'] ?>" hidden>
                    <input class="form-control" type="text" name="newAssunto" value="<?php echo $_GET['old'] ?>">
                    <select class="form-control" name="newArea">
                        <?php foreach($areas as $key => $value) { ?>
                            <option value="<?php echo $key ?>"><?php echo $value ?></option>
                        <?php } ?>
                    </select>
                    <button class="btn btn-primary" type="submit">Editar</button>
                </form>
            </div>
        </section>