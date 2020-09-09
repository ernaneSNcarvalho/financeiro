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
                        <h2>Alterar Empresa</h2>
                        <h5>Altere aqui a empresa onde consumiu </h5>
                        <hr />
                        <div class="form-group">
                            <label>Nome da Empresa</label>
                            <input required="required" class="form-control" placeholder="Ex: Carrefour..." />
                        </div>
                        <div class="form-group">
                            <label>Insira o telefone da empresa</label>
                            <input class="form-control" placeholder="(DDD)XXXXX-XXXX" />
                        </div>
                        <div class="form-group">
                            <label>Insira o endereço da empresa</label>
                            <input class="form-control" placeholder="Ex: Av Lisboa..." />
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->

                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

</body>

</html>