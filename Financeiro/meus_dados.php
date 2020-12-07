<?php

require_once 'c:/xampp2/htdocs/ControleFinanceiroEADquarta/dao/UsuarioDAO.php';
$dao = new UsuarioDAO;
if (isset($_POST['btnGravar'])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $ret = $dao->AlterarUsuario($nome, $email);
}

$dados = $dao->DetalharUsuario();


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
                        <h2>Meus Dados</h2>
                        <h5>Aqui você poderá alterar suas informações </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="meus_dados.php" method="post">
                    <div class="form-group">
                        <label>Nome do Usuário</label>
                        <input value="<?= $dados[0]["nome_usuario"] ?>" class="form-control" name="nome" id="nome" placeholder="Digite Aqui...." />
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input value="<?= $dados[0]["email_usuario"] ?>" class="form-control" name="email" id="email" placeholder="nome@dominio.com..." />
                    </div>
                    <button type="submit" name="btnGravar" onclick="return ValidarCamposMeusDados()" class="btn btn-success">Alterar</button>

                </form>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

</body>

</html>