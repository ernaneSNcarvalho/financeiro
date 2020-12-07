<?php
require_once '../dao/ContaDAO.php';
$dao = new ContaDAO();

if (isset($_GET['cod']) && $_GET['cod'] != '' && is_numeric($_GET['cod'])) {
    $idConta = $_GET['cod'];
    $dados = $dao->DetalharConta($idConta);
    if (count($dados) == 0) {
        header('location: conta_consultar.php');
    }
} else if (isset($_POST['btn-alterar'])) {
    $idConta = $_POST['cod'];
    $banco = $_POST['banco'];
    $agencia = $_POST['agencia'];
    $numero = $_POST['numero_conta'];
    $saldo = $_POST['saldo'];
    $ret = $dao->AlterarConta($banco, $agencia, $numero, $saldo, $idConta);
    header('location: conta_consultar.php?ret=' . $ret);
} else if (isset($_POST['btn-excluir'])) {
    $idConta = $_POST['cod'];
    $ret = $dao->ExcluirConta($idConta);
    header('location: conta_consultar.php?ret=' . $ret);
} else {

    header('location: conta_consultar.php');
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
                        <h2>Alterar Conta</h2>
                        <h5>Aqui você poderá alterar suas contas </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="col-md-6">
                    <div class="form-group">
                        <form action="conta_alterar.php" method="POST">
                            <input type="hidden" name="cod" value="<?= $dados[0]['id_conta'] ?>">
                            <label>Nome do Banco</label>
                            <input value="<?= $dados[0]['banco'] ?>" id="banco" name="banco" class="form-control" placeholder="Exemplo: Itau ..." />
                    </div>

                    <div class="form-group">
                        <label>Agência </label>
                        <input value="<?= $dados[0]['agencia'] ?>" id="agencia" name="agencia" class="form-control" placeholder="Digite aqui ..." />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Número da Conta </label>
                        <input value="<?= $dados[0]['numero_conta'] ?>" id="conta" name="numero_conta" class="form-control" placeholder="Digite aqui ..." />
                    </div>

                    <div class="form-group">
                        <label>Saldo da Conta </label>
                        <input value="<?= $dados[0]['saldo'] ?>" id="saldo" name="saldo" class="form-control" placeholder="Digite aqui ..." />
                    </div>
                </div>
                <div class="col-md-12">
                    <button onclick="return ValidarCamposConta()" name="btn-alterar" type="submit" class="btn btn-success">Alterar</button>
                    <button data-toggle="modal" data-target="#modalExcluir" type="submit" class="btn btn-danger">Excluir</button>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Excluir Conta</h4>
                                </div>
                                <div class="modal-body">
                                    Tem certeza que deseja excluir a conta: <b> <?= $dados[0]['numero_conta'] ?></b> ?
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
    <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    </div>

</body>

</html>