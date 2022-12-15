<?php

$query_db = array(
    "0"  => 'SELECT * FROM tb_usuario WHERE (user = "x00" OR email = "x00") AND hash = "x01";',
    "1"  => 'SELECT * FROM tb_clientes WHERE x00 x01 x02 order by x00;',
    "2"  => 'INSERT INTO tb_clientes (id,nome,fantasia,tipo,cnpj_cpf,ie,im,endereco,num,bairro,cep,cidade,estado,tel,bco_nome,bco_ag,bco_cc,bco_pix) 
        VALUES (x00,"x01","x02","x03","x04","x05","x06","x07","x08","x09","x10","x11","x12","x13","x14","x15","x16","x17")
        ON DUPLICATE KEY UPDATE nome="x01",fantasia="x02",tipo="x03",cnpj_cpf="x04",ie="x05",im="x06",endereco="x07",num="x08",bairro="x09",cep="x10",cidade="x11",
        estado="x12",tel="x13",bco_nome="x14",bco_ag="x15",bco_cc="x16",bco_pix="x17";',
    "3" => 'DELETE FROM tb_clientes WHERE id="x00" AND (SELECT U.class FROM tb_usuario AS U WHERE hash="x01") IN (10);',
    "4"  => 'SELECT * FROM tb_und WHERE(SELECT U.class FROM tb_usuario AS U WHERE hash="x00") IN (10) ORDER BY nome;' ,
    "5"  => 'INSERT INTO tb_und (id, nome, sigla) VALUES(x00, "x01", "x02") ON DUPLICATE KEY UPDATE nome="x01", sigla="x02";',
    "6"  => 'DELETE FROM tb_und WHERE id="x00" AND (SELECT U.class FROM tb_usuario AS U WHERE hash="x01") IN (10);',
    "7"  => 'SELECT *, ROUND(preco * (1+(margem/100)),2) AS venda FROM tb_prod WHERE(SELECT U.class FROM tb_usuario AS U WHERE hash="x00") IN (10) ORDER BY nome;' ,
    "8"  => 'INSERT INTO tb_prod (id, nome, und, preco, margem, qtd) VALUES(x00, "x01", "x02", "x03", "x04", "x05") 
        ON DUPLICATE KEY UPDATE nome="x01", und="x02", preco="x03", margem="x04", qtd="x05";',
    "9"  => 'DELETE FROM tb_prod WHERE id="x00" AND (SELECT U.class FROM tb_usuario AS U WHERE hash="x01") IN (10);',
    "10" => 'SELECT  CLI.*, COMP.*, ITEM.valor 
        FROM tb_compra AS COMP 
        INNER JOIN tb_clientes AS CLI
        INNER JOIN ( SELECT id as id_comp, 0 as valor, 0 as id_prod FROM tb_compra WHERE id NOT IN (SELECT id_compra FROM tb_item_compra)
        UNION ALL SELECT id_compra, ROUND(SUM(qtd * val_unit),2) AS valor, id_prod FROM tb_item_compra GROUP BY id_compra) AS ITEM
        ON COMP.id = ITEM.id_comp
        AND COMP.id_cliente = CLI.id
        AND x00 x01 x02
        AND COMP.data >= "x03"
        AND COMP.data <= "x04"
        ORDER BY COMP.data DESC;',
    "11" => 'INSERT INTO tb_compra (id, id_cliente, id_resp, data, status, obs) VALUES(x00, "x01", "x02", "x03", "x04", "x05") 
        ON DUPLICATE KEY UPDATE id_cliente="x01", id_resp="x02", data="x03", status="x04", obs="x05";',
    "12" => 'DELETE FROM tb_compra WHERE id="x00" AND (SELECT U.class FROM tb_usuario AS U WHERE hash="x01") IN (10);',
    "13" => 'SELECT ITEM.*, PROD.nome, PROD.und, PROD.preco, PROD.margem, ROUND(ITEM.qtd * ITEM.val_unit ,2) as total
        FROM tb_item_compra AS ITEM 
        INNER JOIN tb_prod AS PROD
        ON PROD.id = ITEM.id_prod
        AND ITEM.id_compra="x00";',
    "14" => 'INSERT INTO tb_item_compra (id, id_prod, id_compra, qtd, und, val_unit) VALUES(x00, "x01", "x02", "x03", "x04", "x05") 
        ON DUPLICATE KEY UPDATE  id_prod="x01", id_compra="x02", qtd="x03", und="x04", val_unit="x05";',

 );

?>