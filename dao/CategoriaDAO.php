<?php

require_once('c:/xampp2/htdocs/ControleFinanceiroEADquarta/dao/Conexao.php');
require_once('c:/xampp2/htdocs/ControleFinanceiroEADquarta/dao/UtilDAO.php');


class CategoriaDAO extends Conexao
{

    public function CadastrarCategoria($nome)
    {
        if (trim($nome) == '') {
            return 0;
        }

        // 1 PASSO: criar uma variável que receberá o obj de conexão
        $conexao = parent::retornaConexao();

        // 2 PASSO: Criar uma variável que RECEBERÁ o comando SQL
        $comando = 'insert into tb_categoria(nome_categoria, id_usuario) values (?, ?)';

        // 3 PASSO: Cria um obj que SERVIRÁ como um barco que será levado ao final para o BD
        $sql = new PDOStatement();

        // 4 PASSO: o barco recebe a conexao que estará preparada para executar o $comando 
        $sql = $conexao->prepare($comando);

        // 5 PASSO: observa se tem ?? no $comando, SE TIVER, configurar os valores no lugar do ?
        $sql->bindValue(1, $nome);
        $sql->bindValue(2, UtilDAO::CodigoLogado());

        //6 PASSO Criar o bloco de tratamento de execução e erro try - Catch
        try {
            // 7 PASSO executa - vai para o BD
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            //ERRO
            return -1;
        }
    }

    public function AlterarCategoria($nome, $cod)
    {
        if (trim($nome) == '') {
            return 0;
        }

        $conexao = parent::retornaConexao();
        $comando = 'update tb_categoria set nome_categoria = ? where id_categoria = ? and id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $cod);
        $sql->bindValue(3, UtilDAO::CodigoLogado());
        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -1;
        }
    }

    public function ConsultarCategoria()
    {
        $conexao = parent::retornaConexao();
        $comando = 'select 
                        id_categoria, 
                        nome_categoria
                    from
                        tb_categoria
                    where 
                        id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, UtilDAO::CodigoLogado());
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function DetalharCategoria($idCategoria)
    {
        $conexao = parent::retornaConexao();
        $comando = 'select 
                        id_categoria, 
                        nome_categoria
                    from
                        tb_categoria
                    where 
                        id_usuario = ?
                    and 
                    id_categoria = ? ';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, UtilDAO::CodigoLogado());
        $sql->bindValue(2, $idCategoria);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        return $sql->fetchAll();
    }

    public function ExcluirCategoria($idCategoria)
    {
        $conexao = parent::retornaConexao();
        $comando = 'delete from tb_categoria
                    where 
                    id_categoria =?
                    and 
                    id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $idCategoria);
        $sql->bindValue(2, UtilDAO::CodigoLogado());
        try {
            $sql->execute();
            return 2;
        } catch (Exception $ex) {
            return -2;
        }
    }
}
