<?php

class UtilDAO
{

    private static function IniciarSessao()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public static function CriarSessao($codLogado, $nomeLogado)
    {
        self::IniciarSessao();
        $_SESSION['cod'] = $codLogado;
        $_SESSION['nome'] = $codLogado;
    }

    public static function CodigoLogado()
    {
        self::IniciarSessao();
        return $_SESSION['cod']; // fixa o código 1 do usuário logado por enquanto!
    }

    public static function NomeLogado()
    {
        self::IniciarSessao();
        return $_SESSION['nome'];
    }

    public static function Deslogar()
    {
        self::IniciarSessao();
        unset($_SESSION['nome']);
        unset($_SESSION['cod']);
        header('location: login.php');
    }

    public static function VerificarLogado()
    {
        self::IniciarSessao();
        if (!isset($_SESSION['cod'])) {
            header('location: login.php');
        }
    }
}
