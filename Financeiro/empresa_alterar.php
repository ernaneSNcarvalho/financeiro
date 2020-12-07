<?php
require_once '../dao/EmpresaDAO.php';

$dao = new EmpresaDAO();

if (isset($_GET['cod']) && $_GET['cod'] != '' && is_numeric($_GET['cod'])) {
    $idEmpresa = $_GET['cod'];
    $dados = $dao->DetalharEmpresa($idEmpresa);
    if (count($dados) == 0) {
        header('location: empresa_consultar.php');
    }
} else if (isset($_POST['btn-salvar'])) {
    $idEmpresa = $_POST['cod'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $dao = new EmpresaDAO();
    $ret = $dao->AlterarEmpresa($nome,  $telefone, $endereco, $idEmpresa);
    header('location: empresa_consultar.php?ret=' . $ret);
} else if (isset($_POST['btn-excluir'])) {
    $idEmpresa = $_POST['cod'];
    $ret = $dao->ExcluirEmpresa($idEmpresa);
    header('location: empresa_consultar.php?ret=' . $ret);
} else {
    header('location: empresa_consultar.php');
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

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">

                    <div class="col-md-12">
                        <?php
                        include_once '_msg.php';
                        ?>
                        <h2>Alterar Empresa</h2>
                        <h5>Altere aqui a empresa onde consumiu </h5>
                        <hr />
                        <form action="empresa_alterar.php" method="POST">
                            <input type="hidden" name="cod" value="<?= $dados[0]['id_empresa'] ?>">
                            <div class="form-group">

                                <label>Nome da Empresa*</label>
                                <input id="empresa" value="<?= $dados[0]['nome_empresa'] ?>" name="nome" required="required" class="form-control" placeholder="Ex: Carrefour..." />
                            </div>
                            <div class="form-group">
                                <label>Insira o telefone da empresa</label>
                                <input value="<?= $dados[0]['telefone_empresa'] ?>" id="telefone" name="telefone" class="form-control" placeholder="(DDD)XXXXX-XXXX" />
                            </div>
                            <div class="form-group">
                                <label>Insira o endereço da empresa</label>
                                <input value="<?= $dados[0]['endereco_empresa'] ?>" id="endereco" name="endereco" class="form-control" placeholder="Ex: Av Lisboa..." />
                            </div>
                            <button onclick="return ValidarCamposEmpresa()" name="btn-salvar" type="submit" class="btn btn-success">Alterar</button>
                            <button type="button" data-toggle="modal" data-target="#modalExcluir" type="submit" class="btn btn-danger">Excluir</button>
                            <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Excluir Empresa</h4>
                                        </div>
                                        <div class="modal-body">
                                            Tem certeza que deseja excluir a empresa: <b><?= $dados[0]['nome_empresa'] ?></b> ?
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
            </div>
        </div>
        <!-- /. ROW  -->


    </div>
    <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    </div>

</body>

</html>