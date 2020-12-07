<?php

require_once 'c:/xampp2/htdocs/ControleFinanceiroEADquarta/dao/Conexao.php';
require_once 'c:/xampp2/htdocs/ControleFinanceiroEADquarta/dao/UtilDAO.php';


class ContaDAO extends Conexao
{
    public function CadastrarConta($banco, $agencia, $numero,  $saldo)
    {
        if (trim($banco) == '' || trim($numero) == '' || trim($agencia) == '' || trim($saldo) == '') {
            return 0;
        }

        $conexao = parent::retornaConexao();
        $comando = 'insert into tb_conta(banco, agencia, numero_conta, saldo, id_usuario) values (?,?,?,?,?)';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $banco);
        $sql->bindValue(2, $agencia);
        $sql->bindValue(3, $numero);
        $sql->bindValue(4, $saldo);
        $sql->bindValue(5, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -1;
        }
    }

    public function AlterarConta($banco, $agencia, $numero,  $saldo, $idConta)
    {
        if (trim($banco) == '' || trim($numero) == '' || trim($agencia) == '' || trim($saldo) == '') {
            return 0;
        }


        $conexao = parent::retornaConexao();
        $comando = 'update tb_conta set banco=?, agencia=?, numero_conta=?, saldo=? where id_conta=? and id_usuario=?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $banco);
        $sql->bindValue(2, $agencia);
        $sql->bindValue(3, $numero);
        $sql->bindValue(4, $saldo);
        $sql->bindValue(5, $idConta);
        $sql->bindValue(6, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -1;
        }
    }

    public function ConsultarConta()
    {
        $conexao = parent::retornaConexao();
        $comando = 'select 
                    id_conta,
                    banco,
                    agencia,
                    numero_conta,
                    saldo                    
                    from
                    tb_conta
                    where
                    id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, UtilDAO::CodigoLogado());
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function DetalharConta($idConta)
    {
        $conexao = parent::retornaConexao();
        $comando = 'select id_conta, banco, agencia, numero_conta, saldo from tb_conta where id_conta = ? and id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $idConta);
        $sql->bindValue(2, UtilDAO::CodigoLogado());
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function ExcluirConta($idConta)
    {
        $conexao = parent::retornaConexao();
        $comando = 'delete from tb_conta 
                    where 
                    id_conta=?
                    and
                    id_usuario=?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $idConta);
        $sql->bindValue(2, UtilDAO::CodigoLogado());
        try {
            $sql->execute();
            return 2;
        } catch (Exception $ex) {
            return -2;
        }
    }
}
