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
                        <h2>Alterar Categoria</h2>
                        <h5>Aqui você poderá alterar o nome de sua categoria</h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <div class="form-group">
                    <label>Nome da Categoria</label>
                    <input class="form-control" placeholder="Exemplo: Alimentação..." />

                </div>
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
            <!-- /. PAGE INNER  -->
        </div>

    </div>


</body>

</html>