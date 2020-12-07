<?php

require_once 'c:/xampp2/htdocs/ControleFinanceiroEADquarta/dao/CategoriaDAO.php';

$dao = new CategoriaDAO();


if (isset($_GET['cod']) && $_GET['cod'] != '' && is_numeric($_GET['cod'])) {

    $idCategoria = $_GET['cod'];
    $dados = $dao->DetalharCategoria($idCategoria);
    if (count($dados) == 0) {
        header('location: categoria_consultar.php');
    }
} else if (isset($_POST['btn-alterar'])) {
    $nome = $_POST['nome_categoria'];
    $cod = $_POST['cod'];
    $ret = $dao->AlterarCategoria($nome, $cod);
    header('location: categoria_consultar.php?ret=' . $ret);
} else if (isset($_POST['btn-excluir'])) {
    $idCategoria = $_POST['cod'];
    $ret = $dao->ExcluirCategoria($idCategoria);
    header('location: categoria_consultar.php?ret=' . $ret);
} else {
    header('location: categoria_consultar.php');
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
                        <h2>Alterar categoria</h2>
                        <h5>Aqui você poderá alterar o nome da sua categoria </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="categoria_alterar.php" method="POST">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_categoria'] ?>">
                    <div class="form-group">
                        <label>Nome da Categoria</label>
                        <input name="nome_categoria" class="form-control" id="nome" placeholder="Exemplo: Alimentação, Transporte, etc ..." value="<?= $dados[0]['nome_categoria'] ?>" />
                    </div>
                    <button type="submit" class="btn btn-success" onclick="return ValidarCamposCategoria()" name="btn-alterar">Alterar</button>
                    <button type="button" data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger" name="btn-excluir">Excluir</button>
                    <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Excluir Categoria</h4>
                                </div>
                                <div class="modal-body">
                                    Tem certeza que deseja excluir a categoria: <b> <?= $dados[0]['nome_categoria'] ?></b> ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <button name="btn-excluir" type="submit" class="btn btn-primary">Excluir</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </form>
        <hr>
        <center>
            <a href="categoria_consultar.php" class="btn btn-info">Voltar</a>
        </center>
    </div>
    <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    </div>

</body>

</html>