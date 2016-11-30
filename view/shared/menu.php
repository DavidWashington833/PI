<?php

if(isset($_SESSION['showMenu'])) {
    if($_SESSION['showMenu'] == FALSE) {
        $hidden = "hidden";
    } else {
        $hidden = "";
    }
}


?>


    <nav id="menu" class="navbar" <?php echo $hidden; ?>>
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <i class="fa fa-th-list" aria-hidden="true"></i>
                </button>
                <a class="navbar-brand" href="area.php">SenaQuiz</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="area.php">&Aacute;rea</a></li>
                    <li><a href="assunto.php">Assunto</a></li>
                    <!--<li><a href="tipoquestao.php">Tipo da Questão</a></li>-->
                    <li><a href="questao.php">Quest&otilde;es</a></li>
                    <li><a href="professores.php">Professor</a></li>
                </ul>
            </div>
        </div>
    </nav>