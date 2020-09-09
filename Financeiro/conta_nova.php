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
                        <h2>Nova Conta</h2>
                        <h5>Aqui você poderá cadastrar suas contas personalizadas </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nome do Banco</label>
                        <input class="form-control" placeholder="Exemplo: Itau ..." />
                    </div>

                    <div class="form-group">
                        <label>Agência </label>
                        <input class="form-control" placeholder="Digite aqui ..." />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Número da Conta </label>
                        <input class="form-control" placeholder="Digite aqui ..." />
                    </div>

                    <div class="form-group">
                        <label>Saldo da Conta </label>
                        <input class="form-control" placeholder="Digite aqui ..." />
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

</body>

</html>