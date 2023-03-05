use flexib52_sucata;

select * from tb_compra;

SELECT id as id_comp, 0 as venda, 0 as id_prod FROM tb_compra WHERE id NOT IN (SELECT id_compra FROM tb_item_compra);
SELECT id_compra, ROUND(SUM(qtd * val_unit),2) AS venda, id_prod FROM tb_item_compra GROUP BY id_compra;

SELECT id as id_comp, 0 as valor, 0 as id_prod FROM tb_compra WHERE id NOT IN (SELECT id_compra FROM tb_item_compra)
   UNION ALL 
   SELECT id_compra, ROUND(SUM(qtd * val_unit),2) AS valor, id_prod FROM tb_item_compra GROUP BY id_compra;

SELECT COMP.*, CLI.*, ITEM.valor 
	FROM tb_compra AS COMP 
	INNER JOIN tb_clientes AS CLI
	INNER JOIN ( SELECT id as id_comp, 0 as valor, 0 as id_prod FROM tb_compra WHERE id NOT IN (SELECT id_compra FROM tb_item_compra)
	   UNION ALL SELECT id_compra, ROUND(SUM(qtd * val_unit),2) AS valor, id_prod FROM tb_item_compra GROUP BY id_compra) AS ITEM
	ON COMP.id = ITEM.id_comp
	AND COMP.id_cliente = CLI.id
	AND CLI.fantasia LIKE "%%"
	AND COMP.data >= "0000-00-00"
	AND COMP.data <= "2022-12-31"
	ORDER BY COMP.data DESC;
    
 SELECT *, ROUND(preco * (1+(margem/100)),2) AS venda,(margem) as teste  FROM tb_prod WHERE(SELECT U.class FROM tb_usuario AS U WHERE hash="$~N~3Z69*~<x6r0l*f$`?Z9T3N-H'B") IN (10) ORDER BY nome;   

SELECT ITEM.*, PROD.nome, PROD.und, PROD.preco, PROD.margem, ROUND(ITEM.qtd * ITEM.val_unit ,2) as total
	FROM tb_item_compra AS ITEM 
	INNER JOIN tb_prod AS PROD
	ON PROD.id = ITEM.id_prod
	AND ITEM.id_compra=3;
    
select * from tb_item_compra;    