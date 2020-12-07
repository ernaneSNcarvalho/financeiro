<?php
require_once '../dao/EmpresaDAO.php';
if (isset($_POST['btn-cadastrar'])) {
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $dao = new EmpresaDAO();
    $ret = $dao->CadastrarEmpresa($nome, $telefone, $endereco);
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
                        <h2>Cadastro da Empresa</h2>
                        <h5>Cadastre aqui a empresa onde consumiu </h5>
                        <hr />
                        <form action="empresa_nova.php" method="POST">
                            <div class="form-group">
                                <label>Insira o nome da empresa(*)</label>
                                <input name="nome" id="empresa" required="required" class="form-control" placeholder="Ex: Carrefour..." />
                            </div>
                            <div class="form-group">
                                <label>Insira o telefone da empresa</label>
                                <input name="telefone" id="telefone" class="form-control" placeholder="(DDD)XXXXX-XXXX" />
                            </div>
                            <div class="form-group">
                                <label>Insira o endereço da empresa</label>
                                <input name="endereco" id="endereco" class="form-control" placeholder="Ex: Av Lisboa..." />
                            </div>
                    </div>
                </div>
                <!-- /. ROW  -->

                <button type="submit" class="btn btn-success" onclick="return ValidarCamposEmpresa()" name="btn-cadastrar">Salvar</button>
                </form>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

</body>

</html>