<?php

require_once 'c:/xampp2/htdocs/ControleFinanceiroEADquarta/dao/MovimentoDAO.php';
require_once 'c:/xampp2/htdocs/ControleFinanceiroEADquarta/dao/CategoriaDAO.php';
require_once 'c:/xampp2/htdocs/ControleFinanceiroEADquarta/dao/ContaDAO.php';
require_once 'c:/xampp2/htdocs/ControleFinanceiroEADquarta/dao/EmpresaDAO.php';

$dao_emp = new EmpresaDAO();
$dao_cat = new CategoriaDAO();
$dao_con = new ContaDAO();
$dao = new MovimentoDAO();

$empresas = $dao_emp->ConsultarEmpresa();
$categorias = $dao_cat->ConsultarCategoria();
$contas = $dao_con->ConsultarConta();


if (isset($_POST['btn-cadastrar'])) {
    $tipo = $_POST['tipo'];
    $data = $_POST['data'];
    $valor = $_POST['valor'];
    $emp = $_POST['emp'];
    $cat = $_POST['cat'];
    $cont = $_POST['cont'];
    $obs = $_POST['obs'];
    $ret = $dao->RealizarMovimento($tipo, $data, $valor, $cat, $emp, $cont, $obs);
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
                        <h2>Lançar Movimento</h2>
                        <h5>Aqui você poderá cadastrar suas entradas e saídas </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="movimento_lancar.php" method="POST">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Selecione o tipo de movimento</label>
                            <select id="tipo" name="tipo" class="form-control">
                                <option value="">Selecione</option>
                                <option value="1">Entrada</option>
                                <option value="2">Saída</option>
                            </select>

                        </div>

                        <div class="form-group">
                            <label>Data do Movimento</label>
                            <input id="data" name="data" type="date" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Valor do Lançamento</label>
                            <input id="valor" name="valor" class="form-control" placeholder="Digite aqui..." />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Selecione a empresa</label>
                            <select id="emp" name="emp" class="form-control">
                                <option value="" selected>Selecione</option>
                                <?php for ($i = 0; $i < count($empresas); $i++) { ?>
                                    <option value="<?= $empresas[$i]['id_empresa'] ?>"><?= $empresas[$i]['nome_empresa'] ?></option>
                                <?php } ?>

                            </select>

                        </div>
                        <div class="form-group">
                            <label>Selecione a conta</label>
                            <select id="cont" name="cont" class="form-control">
                                <option value="" selected>Selecione</option>
                                <?php for ($i = 0; $i < count($contas); $i++) { ?>
                                    <option value="<?= $contas[$i]["id_conta"] ?>"><?= $contas[$i]['banco'] ?> / <?= $contas[$i]['agencia'] ?> / <?= $contas[$i]['numero_conta'] ?> / Saldo Atual: R$ <?= $contas[$i]['saldo'] ?></option>
                                <?php } ?>
                            </select>

                        </div>
                        <div class="form-group">
                            <label>Selecione a categoria</label>
                            <select id="cat" name="cat" class="form-control">
                                <option value="" selected>Selecione</option>
                                <?php for ($i = 0; $i < count($categorias); $i++) { ?>
                                    <option value="<?= $categorias[$i]["id_categoria"] ?>"><?= $categorias[$i]["nome_categoria"] ?></option>
                                <?php } ?>

                            </select>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Observação</label>
                            <textarea name="obs" id="" class="form-control" placeholder="Digite aqui...(opcional)"></textarea>
                        </div>
                        <button onclick="return ValidarCamposMovimento()" name="btn-cadastrar" type="submit" class="btn btn-success">Finalizar Lançamento</button>
                    </div>
                </form>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

</body>

</html>