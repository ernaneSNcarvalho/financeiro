<?php
require_once 'c:/xampp2/htdocs/ControleFinanceiroEADquarta/dao/UtilDAO.php';

if (isset($_GET['close']) && $_GET["close"] == 1) {
    UtilDAO::Deslogar();
}
?>

<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">


            <li>
                <a href="meus_dados.php"><i class="fa fa-sitemap fa-3x"></i>Meus Dados<span class=""></span></a>
            </li>

            <li>
                <a href="#"><i class="fa fa-sitemap fa-3x"></i>Categoria<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="categoria_nova.php">Nova Categoria</a>
                    </li>
                    <li>
                        <a href="categoria_consultar.php">Consultar/Alterar Categoria</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-sitemap fa-3x"></i>Empresa<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="empresa_nova.php">Nova Empresa</a>
                    </li>
                    <li>
                        <a href="empresa_consultar.php">Consultar/Alterar Empresa</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-sitemap fa-3x"></i>Contas<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="conta_nova.php">Nova Conta</a>
                    </li>
                    <li>
                        <a href="conta_consultar.php">Consultar/Alterar Conta</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-sitemap fa-3x"></i>Meus Movimentos<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="movimento_lancar.php">Lançar Movimento</a>
                    </li>
                    <li>
                        <a href="movimento_consultar.php">Consultar Movimento</a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="_menu.php?close=1"><i class="fa fa-square-o fa-3x"></i>Sair</a>
            </li>
        </ul>

    </div>

</nav>