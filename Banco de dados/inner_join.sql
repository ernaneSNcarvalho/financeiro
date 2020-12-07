select nome_categoria, nome_usuario
from tb_categoria
inner join tb_usuario
on tb_categoria.id_usuario = tb_usuario.id_usuario

select nome_usuario, nome_empresa, telefone_empresa, endereco_empresa
from tb_empresa
inner join tb_usuario
on tb_empresa.id_usuario = tb_usuario.id_usuario

select nome_usuario, banco, saldo, numero_conta, email_usuario
from tb_conta
inner join tb_usuario
on tb_conta.id_usuario = tb_usuario.id_usuario

select nome_usuario, data_lancamento, tipo_movimento, valor_lancamento
from tb_movimento
inner join tb_usuario
on tb_movimento.id_usuario = tb_usuario.id_usuario

select nome_categoria, nome_empresa, nome_usuario, data_lancamento, valor_lancamento
from tb_movimento
inner join tb_usuario
on tb_movimento.id_usuario = tb_usuario.id_usuario
inner join tb_categoria
on tb_movimento.id_categoria = tb_categoria.id_categoria
inner join tb_empresa
on tb_movimento.id_empresa = tb_empresa.id_empresa

select banco, numero_conta, nome_categoria, nome_empresa, nome_usuario, data_lancamento, valor_lancamento
from tb_movimento
inner join tb_conta
on tb_movimento.id_conta = tb_conta.id_conta
inner join tb_categoria
on tb_movimento.id_categoria = tb_categoria.id_categoria
inner join tb_empresa
on tb_movimento.id_empresa = tb_empresa.id_empresa
inner join tb_usuario
on tb_movimento.id_usuario = tb_usuario.id_usuario

