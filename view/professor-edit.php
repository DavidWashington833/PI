 
        <section id="editProfessor">
            <div class="container">
                <form class="form-group" action="professor.php" method="post">
                    <input class="" type="text" name="idProfessor" value="<?php echo $_GET['edit'] ?>" hidden>
                    <input class="form-control" placeholder="Nome" type="text" name="newName" value="<?php echo $_GET['old'] ?>">
                    <input class="form-control" placeholder="Email" type="text" name="newEmail" value="">
                    <input class="form-control" placeholder="Senha" type="password" name="newSenha" value="">
                    <input class="form-control" placeholder="IdSenac" type="text" name="newIdSenac" value="">
                    <select name="newTipo" class="form-control">
                        <option value="P">P</option>
                        <option value="A">A</option>
                    </select>
                    <button class="btn btn-primary" type="submit">Editar</button>
                </form>
            </div>
        </section>