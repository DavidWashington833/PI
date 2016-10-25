 
        <section id="editProfessor">
            <div class="container">
                <form class="form-group" action="professor.php" method="post">
                    <input class="" type="text" name="idProfessor" value="<?php echo $_GET['edit'] ?>" hidden>
                    <input class="form-control" placeholder="Nome" type="text" name="newName" value="<?php echo $_GET['oldName'] ?>">
                    <input class="form-control" placeholder="Email" type="text" name="newEmail" value="<?php echo $_GET['oldEmail'] ?>">
                    <input class="form-control" placeholder="IdSenac" type="text" name="newIdSenac" value="<?php echo $_GET['oldIdsenac'] ?>">
                    <select name="newTipo" class="form-control">
                        <option value="P">P</option>
                        <option value="A">A</option>
                    </select>
                    <button class="btn btn-primary" type="submit">Editar</button>
                </form>
            </div>
        </section>