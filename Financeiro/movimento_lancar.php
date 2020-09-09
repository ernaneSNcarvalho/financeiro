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
                        <h2>Lançar Movimento</h2>
                        <h5>Aqui você poderá cadastrar suas entradas e saídas </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Selecione o tipo de movimento</label>
                        <select class="form-control">
                            <option value="">Selecione</option>
                            <option value="1">Entrada</option>
                            <option value="2">Saída</option>
                        </select>

                    </div>

                    <div class="form-group">
                        <label>Data do Movimento</label>
                        <input type="date" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Valor do Lançamento</label>
                        <input class="form-control" placeholder="Digite aqui..." />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Selecione a empresa</label>
                        <select class="form-control">
                            <option value="">Selecione</option>

                        </select>

                    </div>
                    <div class="form-group">
                        <label>Selecione a conta</label>
                        <select class="form-control">
                            <option value="">Selecione</option>

                        </select>

                    </div>
                    <div class="form-group">
                        <label>Selecione a categoria</label>
                        <select class="form-control">
                            <option value="">Selecione</option>

                        </select>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Observação</label>
                        <textarea name="" id="" class="form-control" placeholder="Digite aqui...(opcional)"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

</body>

</html>