


        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <a href='' class="close" data-dismiss="modal"><i class='fa fa-times' aria-hidden='true'></i></a>
                        <h4 class="modal-title">Adicionar Questão</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="get">
                            <label>Questão</label>
                            <textarea class="form-control" name="questao"></textarea>
                            <label>Assunto</label>
                            <select class='form-control' name="inAssunto" id="">
                            
                                <?php
                                    foreach($assuntos as $key => $value) {
                                        foreach($value as $key2 => $value2) {
                                            if($key2 == 0) {
                                                $puxAssunto = $value2;
                                            }
                                            if($key2 == 1) {
                                                $puxCodAssunto = $value2;
                                            }
                                        }
                                        echo "<option value='$puxCodAssunto'>$puxAssunto</option>";
                                    }
                                ?>

                            </select>
                            <label>Imagem</label>
                            <select class='form-control' name="inImagem" id="">       
                            
                                <?php
                                    foreach($imagens as $key => $value) {
                                        foreach($value as $key2 => $value2) {
                                            if($key2 == 0) {
                                                $puxImagem = $value2;
                                            }
                                            if($key2 == 1) {
                                                $puxCodImagem = $value2;
                                            }
                                        }
                                        echo "<option value='$puxCodImagem'>$puxImagem</option>";
                                    }
                                ?>

                            </select>
                            <label>Ativo</label>
                            <select class='form-control' name="inAtivo" id="">         
                                <option value="1">Ativo</option>                                
                                <option value="0">Desativo</option>                                
                            </select>
                            <label>Dificuldade</label>
                            <select class='form-control' name="inDificuldade" id="">  
                                <option value="F">Fácil</option>                                
                                <option value="M">Médio</option>       
                                <option value="D">Dificil</option>       
                            </select>
                            <hr>
                            <label>Alternativas 1</label>
                            <textarea class="form-control" name="alternativa1"></textarea>
                            <label>Alternativas 2</label>
                            <textarea class="form-control" name="alternativa2"></textarea>
                            <label>Alternativas 3</label>
                            <textarea class="form-control" name="alternativa3"></textarea>
                            <label>Alternativas 4</label>
                            <textarea class="form-control" name="alternativa4"></textarea>
                            <label>Alternativa Correta</label><br>
                            <input type="radio" name="correto" value="alter1"> 1
                            <input type="radio" name="correto" value="alter2"> 2
                            <input type="radio" name="correto" value="alter3"> 3
                            <input type="radio" name="correto" value="alter4"> 4 <br><br><br>
                            <button type="submit" class="btn btn-quiz">Adicionar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-quiz" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>


        <!-- Modal -->
        <div id="editModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <a href='' class="close" data-dismiss="modal"><i class='fa fa-times' aria-hidden='true'></i></a>
                        <h4 class="modal-title">Adicionar Questão</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="get">
                            <input type="text" name="idQuestao" id="idQuestao" value="" hidden>
                            <label>Questão</label>
                            <textarea class="form-control" name="newQuestao" id="newQuestao"></textarea>
                            <label>Assunto</label>
                            <select class='form-control' name="newAssunto" id="">
                            
                                <?php
                                    foreach($assuntos as $key => $value) {
                                        foreach($value as $key2 => $value2) {
                                            if($key2 == 0) {
                                                $puxAssunto = $value2;
                                            }
                                            if($key2 == 1) {
                                                $puxCodAssunto = $value2;
                                            }
                                        }
                                        echo "<option value='$puxCodAssunto'>$puxAssunto</option>";
                                    }
                                ?>

                            </select>
                            <label>Imagem</label>
                            <select class='form-control' name="newImagem" id="">       
                            
                                <?php
                                    foreach($imagens as $key => $value) {
                                        foreach($value as $key2 => $value2) {
                                            if($key2 == 0) {
                                                $puxImagem = $value2;
                                            }
                                            if($key2 == 1) {
                                                $puxCodImagem = $value2;
                                            }
                                        }
                                        echo "<option value='$puxCodImagem'>$puxImagem</option>";
                                    }
                                ?>

                            </select>
                            <label>Ativo</label>
                            <select class='form-control' name="newAtivo" id="">         
                                <option value="1">Ativo</option>                                
                                <option value="0">Desativo</option>                                
                            </select>
                            <label>Dificuldade</label>
                            <select class='form-control' name="newDificuldade" id="">  
                                <option value="F">Fácil</option>                                
                                <option value="M">Médio</option>       
                                <option value="D">Dificil</option>       
                            </select>
                            <hr>
                            <label>Alternativas 1</label>
                            <textarea class="form-control" name="newAlternativa1"></textarea>
                            <label>Alternativas 2</label>
                            <textarea class="form-control" name="newAlternativa2"></textarea>
                            <label>Alternativas 3</label>
                            <textarea class="form-control" name="newAlternativa3"></textarea>
                            <label>Alternativas 4</label>
                            <textarea class="form-control" name="newAlternativa4"></textarea>
                            <label>Alternativa Correta</label><br>
                            <input type="radio" name="newCorreto" value="alter1"> 1
                            <input type="radio" name="newCorreto" value="alter2"> 2
                            <input type="radio" name="newCorreto" value="alter3"> 3
                            <input type="radio" name="newCorreto" value="alter4"> 4 <br><br><br>
                            <button type="submit" class="btn btn-quiz">Adicionar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-quiz" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>


        <!-- Modal -->
        <div id="modalIMG" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <a href='' class="close" data-dismiss="modal"><i class='fa fa-times' aria-hidden='true'></i></a>
                        <h4 class="modal-title">Adicionar Questão</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input class="form-control" type="text" name="tituloImagem" placeholder="Titulo da imagem">
                            <input class="form-control" type="file" name="imagem">

                            <button type="submit" class="btn btn-quiz">Adicionar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-quiz" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>