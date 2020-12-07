INSERT INTO tb_conta
(banco, agencia, numero_conta, saldo, id_usuario)
VALUES 
('ITAU', '3346', '456-8', 50250.35, 1);

INSERT INTO tb_conta
(banco, agencia, numero_conta, saldo, id_usuario)
VALUES 
('BANCO DO BRASIL', '4000-1', '256835-X', 1950.00, 2);

INSERT INTO tb_conta
(banco, agencia, numero_conta, saldo, id_usuario)
VALUES 
('SICOOB', '4285', '12345-8', 1950.35, 3);

INSERT INTO tb_conta
(banco, agencia, numero_conta, saldo, id_usuario)
VALUES 
('BRADESCO', '4000', '9000-8', 500.35, 4);

INSERT INTO tb_conta
(banco, agencia, numero_conta, saldo, id_usuario)
VALUES 
('CAIXA', '1537', '200-8', 50000000.35, 5);

UPDATE tb_conta SET saldo = 950000.00 WHERE id_conta = 5;

SELECT * FROM tb_conta;