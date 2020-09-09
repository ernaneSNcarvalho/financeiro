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
                        <h2>Consultar Movimento</h2>
                        <h5>Aqui você poderá consultar seus movimentos por um períodos específico </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Selecione o Tipo</label>
                        <select class="form-control">
                            <option value="0" selected>Todos</option>
                            <option value="1">Entrada</option>
                            <option value="2">Saída</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Data Inicial</label>
                        <input type="date" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Data Final</label>
                        <input type="date" class="form-control">
                    </div>
                </div>

                <div class="col-md-12">
                    <center>
                        <button class="btn btn-info">Pesquisar</button>
                    </center>
                </div>

                <hr>



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
                                            <th>Data</th>
                                            <th>Tipo</th>
                                            <th>Valor</th>
                                            <th>Empresa</th>
                                            <th>Categoria</th>
                                            <th>Conta</th>
                                            <th>Observação</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td>Data</td>
                                            <td>Tipo</td>
                                            <td>Valor</td>
                                            <td>Empresa</td>
                                            <td>Categoria</td>
                                            <td>Conta</td>
                                            <td>Observação</td>


                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>


            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

</body>

</html>