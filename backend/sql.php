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
    "7"  => 'SELECT *, ROUND(preco * (1+(margem/100)),2) AS venda FROM tb_prod WHERE(SELECT U.class FROM tb_usuario AS U WHERE hash="x00") IN (10,1) ORDER BY nome;' ,
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
    "15" => 'DELETE FROM tb_item_compra WHERE y00="x00" AND (SELECT U.class FROM tb_usuario AS U WHERE hash="x01") IN (10);',
    "16" => 'INSERT INTO tb_usuario (id, user, hash, class, nome, email, cel) VALUES (x00, "x01", "x02", "x03", "x04", "x05", "x06") 
        ON DUPLICATE KEY UPDATE user="x01", hash="x02", class="x03", nome="x04", email="x05", cel="x06";',
    "17" => 'DELETE FROM tb_usuario WHERE id="x00";',
    "18" => 'INSERT INTO tb_veiculo (id, ano, modelo, placa, tipo, tara) VALUES (x00, "x01", "x02", "x03", "x04", "x05") 
        ON DUPLICATE KEY UPDATE ano="x01", modelo="x02", placa="x03", tipo="x04", tara="x05";',
    "19" => 'DELETE FROM tb_veiculo WHERE id="x00"',
    "20" => 'SELECT * FROM tb_veiculo WHERE(SELECT U.class FROM tb_usuario AS U WHERE hash="x00") IN (10) ORDER BY modelo;' ,
    "21" => 'INSERT INTO tb_motorista (id, nome, cpf, rg, cnh, tipo, validade, id_usuario) VALUES (x00, "x01", "x02", "x03", "x04", "x05", "x06", "x07") 
        ON DUPLICATE KEY UPDATE nome="x01", cpf="x02", rg="x03", cnh="x04", tipo="x05", validade="x06", id_usuario="x07";',
    "22" => 'DELETE FROM tb_motorista WHERE id="x00" AND (SELECT U.class FROM tb_usuario AS U WHERE hash="x01") IN (10);',
    "23" => 'SELECT * FROM tb_motorista WHERE(SELECT U.class FROM tb_usuario AS U WHERE hash="x00") IN (10) ORDER BY nome;' ,
    "24" => 'INSERT INTO tb_viagem (id, id_motorista, id_veiculo, data, aberta, obs) VALUES(x00, "x01", "x02", "x03", "x04", "x05") 
        ON DUPLICATE KEY UPDATE id_motorista="x01", id_veiculo="x02", data="x03", aberta="x04", obs="x05";',
    "25" => 'SELECT VIA.*, MOT.nome, VEI.modelo, VEI.placa 
        FROM tb_viagem AS VIA
        INNER JOIN tb_motorista AS MOT
        INNER JOIN tb_veiculo AS VEI 
        ON x00 x01 x02 
        AND MOT.id = VIA.id_motorista
        AND VEI.id = VIA.id_veiculo
        AND data >= "x03"
        AND data <= "x04"
        ORDER BY data DESC;' ,
    "26" => 'SELECT * FROM tb_usuario WHERE (SELECT U.class FROM tb_usuario AS U WHERE hash="x00") IN (10) ORDER BY nome;',
    "27" => 'DELETE FROM tb_usuario WHERE id=x00 ;',
    "28" => 'SELECT VIA.*, MOT.nome, VEI.modelo, VEI.placa 
        FROM tb_viagem AS VIA
        INNER JOIN tb_motorista AS MOT
        INNER JOIN tb_veiculo AS VEI
        INNER JOIN tb_usuario AS USR 
        ON VIA.aberta = 1 
        AND MOT.id = VIA.id_motorista
        AND VEI.id = VIA.id_veiculo
        AND USR.id = MOT.id_usuario
        AND (SELECT U.id FROM tb_usuario AS U WHERE hash="x00") = USR.id
        ORDER BY data DESC;' ,
    "29" => 'SELECT ITEM.*, PROD.nome, PROD.und, PROD.preco, PROD.margem, ROUND(ITEM.qtd * ITEM.val_unit ,2) as total
        FROM tb_item_viagem AS ITEM 
        INNER JOIN tb_prod AS PROD
        ON PROD.id = ITEM.id_prod
        AND ITEM.id_viagem="x00";',
    "30" => 'INSERT INTO tb_item_viagem (id, id_viagem, id_cliente, id_prod, qtd, und, val_unit) VALUES(x00, "x01", "x02", "x03", "x04", "x05", "x06") 
        ON DUPLICATE KEY UPDATE  id_viagem="x01", id_cliente="x02", id_prod="x03", qtd="x04", und="x05", val_unit="x06";',
    "31" => 'SELECT * FROM tb_motorista
	    WHERE id NOT IN (SELECT V.id_motorista FROM tb_viagem AS V WHERE V.aberta=1)	
	    GROUP BY nome;' ,
    "32" => 'SELECT * FROM tb_veiculo
        WHERE id NOT IN (SELECT V.id_veiculo FROM tb_viagem AS V WHERE V.aberta=1)	
        GROUP BY placa;',
    "33" => 'UPDATE tb_viagem SET aberta="0" WHERE id=x00 AND (SELECT U.class FROM tb_usuario AS U WHERE hash="x01") IN (10)',
    "34" => 'DELETE FROM tb_item_viagem WHERE y00="x00" AND (SELECT U.class FROM tb_usuario AS U WHERE hash="x01") IN (10,1);',

    );

?>