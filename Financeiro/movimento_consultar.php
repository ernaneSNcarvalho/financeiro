<?php

require_once '../dao/MovimentoDAO.php';

$tipo = '';
$dtinicial = '';
$dtfinal = '';

if (isset($_POST['btnPesquisar'])) {
    $tipo = $_POST['tipo'];
    $dtinicial = $_POST['dtinicial'];
    $dtfinal = $_POST['dtfinal'];

    $dao = new MovimentoDAO();
    $movs = $dao->FiltrarMovimento($tipo, $dtinicial, $dtfinal);
} else if (isset($_POST['btn-excluir'])) {
    $idMovimento = $_POST['codMovimentoExcluir'];
    $idConta = $_POST['codContaExcluir'];
    $valor = $_POST['valorExcluir'];
    $tipo = $_POST['tipoMovimento'];
    $dao = new MovimentoDAO();
    $ret = $dao->ExcluirMovimento($idMovimento, $idConta, $valor, $tipo);
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
                        <h2>Consultar Movimento</h2>
                        <h5>Aqui você poderá consultar seus movimentos por um períodos específico </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="movimento_consultar.php" method="POST">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Selecione o Tipo</label>
                            <select class="form-control" name="tipo">
                                <option value="0" selected>Todos</option>
                                <option value="1" <?= $tipo == 1 ? 'selected' : '' ?>>Entrada</option>
                                <option value="2" <?= $tipo == 2 ? 'selected' : '' ?>>Saída</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Data Inicial</label>
                            <input name="dtinicial" value="<?= $dtinicial ? $dtinicial : '' ?>" type="date" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Data Final</label>
                            <input name="dtfinal" value="<?= $dtfinal ? $dtfinal : '' ?>" type="date" class="form-control">
                        </div>
                    </div>

                    <div style="padding: 10px;" class="col-md-12">
                        <center>
                            <button name="btnPesquisar" class="btn btn-success">Pesquisar</button>
                        </center>
                    </div>
                </form>
                <hr>

                <?php if (isset($movs)) { ?>

                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Resultado encontrado
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>

                                            <tr>
                                                <th>Tipo</th>
                                                <th>Valor</th>
                                                <th>Data</th>
                                                <th>Observacao</th>
                                                <th>Categoria</th>
                                                <th>Empresa</th>
                                                <th>Conta</th>
                                                <th>Banco</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            for ($i = 0; $i < count($movs); $i++) {

                                            ?>
                                                <tr class="odd gradeX">

                                                    <td><?= $movs[$i]['tipo_movimento'] == 1 ? 'Entrada' : 'Saída' ?></td>
                                                    <td><?= $movs[$i]['valor_lancamento'] ?></td>
                                                    <td><?= $movs[$i]['data_lancamento'] ?></td>
                                                    <td><?= $movs[$i]['observacao'] ?></td>
                                                    <td><?= $movs[$i]['nome_categoria'] ?></td>
                                                    <td><?= $movs[$i]['nome_empresa'] ?></td>
                                                    <td><?= $movs[$i]['numero_conta'] ?></td>
                                                    <td><?= $movs[$i]['banco'] ?></td>
                                                    <td>
                                                        <a name="btnExcluir" data-toggle="modal" data-target="#modalExcluir<?= $i ?>" href="#" class="btn-danger btn-xs">Excluir</a>
                                                        <div class="modal fade" id="modalExcluir<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                        <h4 class="modal-title" id="myModalLabel">Excluir Categoria</h4>
                                                                    </div>
                                                                    <form action="movimento_consultar.php" method="POST">
                                                                        <input type="hidden" name="codMovimentoExcluir" value="<?= $movs[$i]['id_movimento'] ?>">
                                                                        <input type="hidden" name="codContaExcluir" value="<?= $movs[$i]['id_conta'] ?>">
                                                                        <input type="hidden" name="valorExcluir" value="<?= $movs[$i]['valor_lancamento'] ?>">
                                                                        <input type="hidden" name="tipoMovimento" value="<?= $movs[$i]['tipo_movimento'] ?>">
                                                                        <div class="modal-body">
                                                                            Tem certeza que deseja excluir o movimento: <br> <b>Tipo:</b> <?= $movs[$i]['tipo_movimento'] == 1 ? 'Entrada' : 'Saída' ?><br>
                                                                            <b>Data:</b><?= $movs[$i]['data_lancamento'] ?><br>
                                                                            <b>Valor:</b><?= $movs[$i]['valor_lancamento'] ?><br>
                                                                            <b>Categoria:</b><?= $movs[$i]['nome_categoria'] ?><br>
                                                                            <b>Empresa:</b><?= $movs[$i]['nome_empresa'] ?><br>
                                                                            <b>Conta:</b><?= $movs[$i]['banco'] ?>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                            <button name="btn-excluir" type="submit" class="btn btn-primary">Sim</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>

                <?php } ?>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

</body>

</html>