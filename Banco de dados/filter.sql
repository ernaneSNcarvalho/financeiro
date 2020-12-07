SELECT 
    ca.nome_categoria, 
    us.nome_usuario
FROM
    tb_categoria AS ca
        INNER JOIN
    tb_usuario AS us 
ON 
	ca.id_usuario = us.id_usuario
where 
	ca.id_usuario = 1
and 
	ca.nome_categoria like '%Sal%'

SELECT 
    nu.nome_usuario,
    nc.nome_categoria
FROM
    tb_categoria AS nc
        INNER JOIN
    tb_usuario AS nu ON nc.id_usuario = nu.id_usuario
WHERE
    nc.id_usuario LIKE '%1%'
    
select 
	ca.nome_categoria,
    us.nome_usuario
    from
    tb_categoria as ca
    inner join 
    tb_usuario as us
    on
    ca.id_usuario = us.id_usuario
    where ca.id_usuario = 1
    
select 
	mo.data_lancamento,
    mo.valor_lancamento,
    ca.nome_categoria,
    em.nome_empresa,
    us.nome_usuario
from
    tb_movimento as mo
inner join 
    tb_usuario as us
on
    mo.id_usuario = us.id_usuario
inner join 
    tb_categoria as ca
on
    mo.id_categoria = ca.id_categoria
inner join 
    tb_empresa as em
on
    mo.id_empresa = mo.id_empresa
where mo.tipo_movimento = 1




select 
	bc.banco,
    bc.numero_conta,
    ca.nome_categoria,
    em.nome_empresa,
    us.nome_usuario,
    mo.data_lancamento,
    mo.valor_lancamento
from 
	tb_movimento as mo
inner join 
	tb_conta as bc
on
	mo.id_conta = bc.id_conta
inner join
	tb_categoria as ca
on
	mo.id_categoria = ca.id_categoria
inner join 
	tb_empresa as em
on 
	mo.id_empresa = em.id_empresa
inner join 
	tb_usuario as us
on
	mo.id_usuario = us.id_usuario
where mo.tipo_movimento = 1
and us.id_usuario in (1, 2)






select 
	co.banco,
    co.numero_conta,
    ca.nome_categoria,
    em.nome_empresa,
    us.nome_usuario,
    mo.data_lancamento,
    mo.valor_lancamento
from 
	tb_movimento as mo
inner join
	tb_conta as co
on 
	mo.id_conta = co.id_conta;
inner join 
	tb_categoria as ca
on
	mo.id_categoria = ca.id_categoria
inner join 
	tb_empresa as em
on
	mo.id_empresa = em.id_empresa
inner join 
	tb_usuario as us
on 
	mo.id_usuario = us.id_usuario
where 
	mo.tipo_entrada in (1, 2)
and 
	mo.data_movimento between '2020-01-01' and '2020-10-14'

    