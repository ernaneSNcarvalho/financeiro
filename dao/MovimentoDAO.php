<?php

require_once 'c:/xampp2/htdocs/ControleFinanceiroEADquarta/dao/Conexao.php';
require_once 'c:/xampp2/htdocs/ControleFinanceiroEADquarta/dao/UtilDAO.php';


class MovimentoDAO extends Conexao
{
    public function RealizarMovimento($tipo, $data, $valor, $cat, $emp, $cont, $obs)
    {
        if (trim($data) == '' || trim($valor) == '' || $tipo == '' || $cat == '' || $emp == '' || $cont == '') {
            return 0;
        }

        $conexao = parent::retornaConexao();
        $comando = 'insert into tb_movimento
        (tipo_movimento, data_lancamento, valor_lancamento, observacao, id_conta, id_categoria, id_usuario, id_empresa )
        values (?,?,?,?,?,?,?,?)';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $tipo);
        $sql->bindValue(2, $data);
        $sql->bindValue(3, $valor);
        $sql->bindValue(4, $obs);
        $sql->bindValue(5, $cont);
        $sql->bindValue(6, $cat);
        $sql->bindValue(7, UtilDAO::CodigoLogado());
        $sql->bindValue(8, $emp);

        // INICIA A TRANSAÇÃO
        $conexao->beginTransaction();

        try {
            //GRAVA NA TB_MOVIMENTO
            $sql->execute();

            if ($tipo == 1) {
                $comando = 'update tb_conta set saldo = saldo + ? where id_conta = ? ';
            } else {
                $comando = 'update tb_conta set saldo = saldo - ? where id_conta = ?';
            }

            $sql = $conexao->prepare($comando);
            $sql->bindValue(1, $valor);
            $sql->bindValue(2, $cont);
            //Atualiza o saldo da conta
            $sql->execute();

            //CONFIRMA A TRANSAÇÃO
            $conexao->commit();
            return 1;
        } catch (Exception $ex) {

            $conexao->rollBack();
            return -1;
        }
    }

    public function FiltrarMovimento($tipo, $dtinicial, $dtfinal)
    {
        $conexao = parent::retornaConexao();
        if ($tipo == 1 || $tipo == 2) {
            $comando = 'select
                        id_movimento,
                        tipo_movimento,
                        valor_lancamento, 
                        date_format(data_lancamento, "%d/%m/%Y") as data_lancamento,
                        observacao,
                        nome_categoria,
                        nome_empresa,    
                        banco,
                        numero_conta,
                        tb_movimento.id_conta
                        
                    from
                        tb_movimento
                    inner join
                        tb_categoria
                    on
                        tb_movimento.id_categoria = tb_categoria.id_categoria
                    inner join 
                        tb_empresa
                    on
                        tb_movimento.id_empresa = tb_empresa.id_empresa
                    inner join 
                        tb_conta
                    on 
                        tb_movimento.id_conta = tb_conta.id_conta
                    where
                        tb_movimento.id_usuario = ?
                    and 
                        data_lancamento between ? and ?
                    and 
                        tipo_movimento = ? ';
        } else {
            $comando = 'select
                        id_movimento,
                        tipo_movimento,
                         valor_lancamento, 
                         date_format(data_lancamento, "%d/%m/%Y") as data_lancamento,
                        observacao,
                         nome_categoria,
                        nome_empresa,    
                        banco,
                        numero_conta,
                        tb_movimento.id_conta
                        from
                            tb_movimento
                        inner join
                            tb_categoria
                        on
                            tb_movimento.id_categoria = tb_categoria.id_categoria
                        inner join 
                            tb_empresa
                        on
                            tb_movimento.id_empresa = tb_empresa.id_empresa
                        inner join 
                            tb_conta
                        on 
                            tb_movimento.id_conta = tb_conta.id_conta
                        where
                            tb_movimento.id_usuario = ?
                        and 
                            data_lancamento between ? and ?
                        and 
                            tipo_movimento in (1, 2) ';
        }

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, UtilDAO::CodigoLogado());
        $sql->bindValue(2, $dtinicial);
        $sql->bindValue(3, $dtfinal);

        if ($tipo == 1 || $tipo == 2) {
            $sql->bindValue(4, $tipo);
        }

        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function ExcluirMovimento($idMovimento, $idConta, $valor, $tipo)
    {
        $conexao = parent::retornaConexao();
        $comando = 'delete from tb_movimento where id_movimento = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $idMovimento);
        $conexao->beginTransaction();
        try {
            $sql->execute();

            if ($tipo == 1) {
                $comando = 'update tb_conta set saldo = saldo + ? where id_conta = ?';
            } else if ($tipo == 2) {
                $comando = 'update tb_conta set saldo = saldo - ? where id_conta = ?';
            }

            $sql = $conexao->prepare($comando);
            $sql->bindValue(1, $valor);
            $sql->bindValue(2, $idConta);
            $sql->execute();
            $conexao->commit();
            return 1;
        } catch (Exception $ex) {
            $conexao->rollBack();
            return -1;
        }
    }
}
