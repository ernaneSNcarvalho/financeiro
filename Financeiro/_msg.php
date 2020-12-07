<?php

if (isset($_GET['ret'])) {
    $ret = $_GET['ret'];
}

if (isset($ret)) {
    switch ($ret) {
        case -3:
            echo '<div class="alert alert-danger">
            Senha deve conter 6 caracteres!
            </div>';
            break;
        case -5:
            echo '<div class="alert alert-danger">
                Usuário não encontrado!
                </div>';
            break;
        case -4:
            echo '<div class="alert alert-danger">
            As senhas devem ser iguais!
            </div>';
            break;


        case -2:
            echo '<div class="alert alert-danger">
            Não foi possível excluir o registro, pois está em uso!
            </div>';
            break;
        case 2:
            echo '<div class="alert alert-success">
            Item excluido com sucesso!
            </div>';
            break;
        case -1:
            echo '<div class="alert alert-danger">
            Ocorreu um erro na operação. Tente mais tarde!
            </div>';
            break;
        case 0:
            echo '<div class="alert alert-warning">
            Preencher o(s) campo(s) obrigatorio(s)
            </div>';
            break;
        case 1:
            echo '<div class="alert alert-success">
            Ação realizada com sucesso
            </div>';
            break;
    }
}
