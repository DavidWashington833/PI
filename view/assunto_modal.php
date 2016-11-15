


        
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <a href='' class="close" data-dismiss="modal"><i class='fa fa-times' aria-hidden='true'></i></a>
                        <h4 class="modal-title">Adicionar Assunto</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="get">
                            <input type="text" class="form-control" placeholder="Assunto" name="assunto">
                            <select class="form-control" name="area" id="area">
                            
                            <?php

                                foreach($areas as $key => $value) {
                                    foreach($value as $key2 => $value2) {
                                        if($key2 == 0) {
                                            $area = $value2;
                                        } if($key2 == 1) {
                                            $codArea = $value2;
                                        }
                                    }
                                    echo "<option value='$codArea'>$area</option>";
                                }

                            ?>

                            </select>
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
                        <h4 class="modal-title">Adicionar Area</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="get">
                            <input type="text" class="" placeholder="Area" name="idAssunto" id="idAssunto" hidden>
                            <input type="text" class="form-control" placeholder="Assunto" name="newAssunto" id="newAssunto">
                            <select class="form-control" name="newArea" id="newArea">
                            
                            <?php

                                foreach($areas as $key => $value) {
                                    foreach($value as $key2 => $value2) {
                                        if($key2 == 0) {
                                            $area = $value2;
                                        } if($key2 == 1) {
                                            $codArea = $value2;
                                        }
                                    }
                                    echo "<option value='$codArea'>$area</option>";
                                }

                            ?>

                            </select>
                            <button type="submit" class="btn btn-quiz">Editar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-quiz" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>