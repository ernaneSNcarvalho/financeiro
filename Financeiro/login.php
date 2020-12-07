<?php

require_once 'c:/xampp2/htdocs/ControleFinanceiroEADquarta/dao/UsuarioDAO.php';

if (isset($_POST['btnLogar'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $dao = new UsuarioDAO();
    $ret = $dao->ValidarLogin($email, $senha);
}

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include_once '_head.php';

?>

<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <?php
                include_once '_msg.php';
                ?>
                <h2>Financeiro EAD: Ernane 1.0</h2>

                <h5>( Faça seu login )</h5>
                <br />
            </div>
        </div>
        <div class="row ">

            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong> Entre com seus Dados </strong>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="login.php" method="POST">
                            <br />
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                <input name="email" type="text" class="form-control" placeholder="Digite seu e-mail " />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input name="senha" type="password" class="form-control" placeholder="Digite sua senha" />
                            </div>
                            <div class="form-group">

                                <span class="pull-right">
                                    <a href="#">Esqueceu sua Senha ? </a>
                                </span>
                            </div>

                            <button name="btnLogar" class="btn btn-primary ">Acessar</button>
                            <hr />
                            Não possui Cadastro ? <a href="cadastro.php">Clique Aqui </a>
                        </form>
                    </div>

                </div>
            </div>


        </div>
    </div>




</body>

</html>