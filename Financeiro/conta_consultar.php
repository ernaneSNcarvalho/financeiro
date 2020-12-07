<?php

require_once 'c:/xampp2/htdocs/ControleFinanceiroEADquarta/dao/ContaDAO.php';
$objdao = new ContaDAO();
$contas = $objdao->ConsultarConta();

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
                        <h2>Consultar Conta</h2>
                        <h5>Aqui você poderá consultar/alterar suas contas cadastradas </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Contas Cadastradas
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Nome do Banco</th>
                                                <th>Agencia</th>
                                                <th>Numero</th>
                                                <th>Saldo</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total = 0;
                                            for ($i = 0; $i < count($contas); $i++) {
                                                $total = $total + $contas[$i]['saldo'];
                                            ?>
                                                <tr class="odd gradeX">
                                                    <td><?= $contas[$i]['banco'] ?></td>
                                                    <td><?= $contas[$i]['agencia'] ?></td>
                                                    <td><?= $contas[$i]['numero_conta'] ?></td>
                                                    <td>R$ <?= $contas[$i]['saldo'] ?></td>
                                                    <td>
                                                        <a href="conta_alterar.php?cod=<?= $contas[$i]['id_conta'] ?>" class="btn btn-warning btn-xs">Alterar</a>
                                                    </td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <center><b>TOTAL: R$</b> <?= $total ?></center>
                                </div>

                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

</body>

</html>