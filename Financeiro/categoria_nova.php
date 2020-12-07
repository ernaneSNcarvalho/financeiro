<?php

require_once '../dao/CategoriaDAO.php';

if (isset($_POST['btnGravar'])) {
    $nome = $_POST['nome'];
    $dao = new CategoriaDAO();

    //Chama a função para cadastrar
    $ret = $dao->CadastrarCategoria($nome);
}

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include_once '_head.php';

?>

<body>
    <div id="wrapper">
        <?php
        include_once '_topo.php';
        include_once '_menu.php';
        ?>

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        include_once '_msg.php';
                        ?>
                        <h2>Nova Categoria</h2>
                        <h5>Aqui você poderá cadastrar suas categorias personalizadas </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="categoria_nova.php" method="post">
                    <div class="form-group">
                        <label>Nome da Categoria</label>
                        <input class="form-control" name="nome" id="nome" placeholder="Exemplo: Alimentação, Transporte, etc ..." />
                    </div>
                    <button type="submit" name="btnGravar" onclick="return ValidarCamposCategoria()" class="btn btn-success">Cadastrar</button>
                </form>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

</body>

</html>