
        <section id="editArea">
            <div class="container">
                <h5>Editar Cadastro</h5>
                <form class="form-group" action="area.php" method="post">
                    <input type="text" name="idArea" value="<?php echo $_GET['edit'] ?>" hidden>
                    <input class="form-control" type="text" name="newArea" value="<?php echo $_GET['old'] ?>">
                    <button class="btn btn-quiz" type="submit">Editar</button>
                </form>
            </div>
        </section>