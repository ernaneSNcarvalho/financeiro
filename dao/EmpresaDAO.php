<?php

require_once 'c:/xampp2/htdocs/ControleFinanceiroEADquarta/dao/UtilDAO.php';
require_once 'c:/xampp2/htdocs/ControleFinanceiroEADquarta/dao/Conexao.php';

class EmpresaDAO extends Conexao
{
    public function CadastrarEmpresa($nome, $telefone, $endereco)
    {
        if (trim($nome) == '' && trim($telefone) == '' && trim($endereco) == '') {
            return 0;
        }

        $conexao = parent::retornaConexao();
        $comando = 'insert into tb_empresa(nome_empresa, telefone_empresa, endereco_empresa, id_usuario) values (?, ?, ?, ?)';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $telefone);
        $sql->bindValue(3, $endereco);
        $sql->bindValue(4, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -1;
        }
    }

    public function AlterarEmpresa($nome, $telefone, $endereco, $id_empresa)
    {
        if (trim($nome) == '' && trim($telefone) == '' && trim($endereco) == '') {
            return 0;
        }

        $conexao = parent::retornaConexao();
        $comando = 'update tb_empresa set nome_empresa=?, telefone_empresa=?, endereco_empresa=? where id_empresa=? and id_usuario=?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $telefone);
        $sql->bindValue(3, $endereco);
        $sql->bindValue(4, $id_empresa);
        $sql->bindValue(5, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            // echo $ex->getMessage();
            return -1;
        }
    }

    public function ConsultarEmpresa()
    {
        $conexao = parent::retornaConexao();
        $comando = 'select
                            id_empresa, 
                            nome_empresa,
                            telefone_empresa,
                            endereco_empresa
                    from
                            tb_empresa
                    where
                            id_usuario = ?
                 order by   nome_empresa    ';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, UtilDAO::CodigoLogado());
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function DetalharEmpresa($id_empresa)
    {
        $conexao = parent::retornaConexao();
        $comando = 'select id_empresa, nome_empresa, telefone_empresa, endereco_empresa from tb_empresa where id_empresa=? and id_usuario=?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $id_empresa);
        $sql->bindValue(2, UtilDAO::CodigoLogado());
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function ExcluirEmpresa($id_empresa)
    {
        $conexao = parent::retornaConexao();
        $comando = 'delete from tb_empresa 
                    where 
                    id_empresa=?
                    and 
                    id_usuario=?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $id_empresa);
        $sql->bindValue(2, UtilDAO::CodigoLogado());
        try {
            $sql->execute();
            return 2;
        } catch (Exception $ex) {
            return -2;
        }
    }
}
