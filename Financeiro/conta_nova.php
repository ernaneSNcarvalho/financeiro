<?php
require_once '../dao/ContaDAO.php';

if (isset($_POST['btn-cadastrar'])) {
    $nome = $_POST['nome'];
    $numero = $_POST['numero'];
    $agencia = $_POST['agencia'];
    $saldo = $_POST['saldo'];
    $dao = new ContaDAO();
    $ret = $dao->CadastrarConta($nome, $agencia, $numero,  $saldo);
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
                        <h2>Nova Conta</h2>
                        <h5>Aqui você poderá cadastrar suas contas personalizadas </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="col-md-6">
                    <div class="form-group">
                        <form action="conta_nova.php" method="POST">
                            <label>Nome do Banco</label>
                            <input id="banco" name="nome" class="form-control" placeholder="Exemplo: Itau ..." />
                    </div>

                    <div class="form-group">
                        <label>Agência </label>
                        <input id="agencia" name="agencia" class="form-control" placeholder="Digite aqui ..." />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Número da Conta </label>
                        <input id="conta" name="numero" class="form-control" placeholder="Digite aqui ..." />
                    </div>

                    <div class="form-group">
                        <label>Saldo da Conta </label>
                        <input id="saldo" name="saldo" class="form-control" placeholder="Digite aqui ..." />
                    </div>

                </div>
                <div class="col-md-12">
                    <button onclick="return ValidarCamposConta()" name="btn-cadastrar" type="submit" class="btn btn-success">Cadastrar</button>
                </div>
                </form>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

</body>

</html>