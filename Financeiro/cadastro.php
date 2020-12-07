<?php

require_once '../dao/UsuarioDAO.php';
$dao = new UsuarioDAO();

if (isset($_POST['btn-salvar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senha2 = $_POST['senha2'];
    $ret = $dao->CadastrarUsuario($nome, $email, $senha, $senha2);
   /// header('location: login.php?ret=' . $ret);
}


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include_once '_head.php';
?>

<body>
    <div class="container">
        <div class="row text-center  ">
            <div class="col-md-12">
                <br /><br />
                <?php
                include_once '_msg.php';
                ?>
                <h2>Financeiro: Cadastro Usuário</h2>

                <h5>( Faça seu cadastro aqui )</h5>
                <br />
            </div>
        </div>
        <div class="row">

            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong> Preencher os campos abaixo </strong>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="cadastro.php">
                            <br />
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                                <input id="nome" name="nome" type="text" class="form-control" placeholder="Seu nome" />
                            </div>

                            <div class="form-group input-group">
                                <span class="input-group-addon">@</span>
                                <input id="email" name="email" type="text" class="form-control" placeholder="Seu E-mail" />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input id="senha" name="senha" type="password" class="form-control" placeholder="Crie uma Senha" />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input id="senha2" name="senha2" type="password" class="form-control" placeholder="Repita a Senha" />
                            </div>

                            <button onclick="return ValidarCamposUsuario()" name="btn-salvar" href="index.html" class="btn btn-success ">Finalizar Cadastro</button>
                            <hr />
                            Já possui Cadastro ? <a href="login.php">Clique Aqui</a>
                        </form>
                    </div>

                </div>
            </div>


        </div>
    </div>


</body>

</html>