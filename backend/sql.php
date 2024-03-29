<?php

$query_db = array(
    "0"  => 'SELECT * FROM tb_usuario WHERE (user = "x00" OR email = "x00") AND hash = "x01";',
    "1"  => 'SELECT * FROM tb_clientes WHERE x00 x01 x02 order by nome;',
    "2"  => 'INSERT INTO tb_clientes (id,nome,fantasia,tipo,cnpj_cpf,ie,im,endereco,num,bairro,cep,cidade,estado,tel,bco_nome,bco_ag,bco_cc,bco_pix,modal,whatsapp) 
        VALUES (x00,"x01","x02","x03","x04","x05","x06","x07","x08","x09","x10","x11","x12","x13","x14","x15","x16","x17","x18","x19")
        ON DUPLICATE KEY UPDATE nome="x01",fantasia="x02",tipo="x03",cnpj_cpf="x04",ie="x05",im="x06",endereco="x07",num="x08",bairro="x09",cep="x10",cidade="x11",
        estado="x12",tel="x13",bco_nome="x14",bco_ag="x15",bco_cc="x16",bco_pix="x17",modal="x18",whatsapp="x19";',
    "3" => 'DELETE FROM tb_clientes WHERE id="x00" AND (SELECT U.class FROM tb_usuario AS U WHERE hash="x01") IN (10);',
    "4"  => 'SELECT * FROM tb_und WHERE(SELECT U.class FROM tb_usuario AS U WHERE hash="x00") IN (10) ORDER BY nome;' ,
    "5"  => 'INSERT INTO tb_und (id, nome, sigla) VALUES(x00, "x01", "x02") ON DUPLICATE KEY UPDATE nome="x01", sigla="x02";',
    "6"  => 'DELETE FROM tb_und WHERE id="x00" AND (SELECT U.class FROM tb_usuario AS U WHERE hash="x01") IN (10);',
    "7"  => 'SELECT * FROM tb_prod WHERE nome LIKE "%x00%" AND (SELECT U.class FROM tb_usuario AS U WHERE hash="x01") IN (10,1) ORDER BY nome;',
    "8"  => 'INSERT INTO tb_prod (id, nome, und, preco, margem, id_mat) VALUES(x00, "x01", "x02", "x03", "x04", "x05") 
        ON DUPLICATE KEY UPDATE nome="x01", und="x02", preco="x03", margem="x04", id_mat="x05";',
    "9"  => 'DELETE FROM tb_prod WHERE id="x00" AND (SELECT U.class FROM tb_usuario AS U WHERE hash="x01") IN (10);',
    "10" => 'SELECT  CLI.*, VEND.*, ITEM.valor, USR.user, USR.nome AS nome_vend 
        FROM tb_venda AS VEND 
        INNER JOIN tb_clientes AS CLI
        INNER JOIN tb_usuario AS USR
        INNER JOIN ( SELECT id as id_comp, 0 as valor, 0 as id_prod FROM tb_venda WHERE id NOT IN (SELECT id_venda FROM tb_item_venda)
        UNION ALL SELECT id_venda, ROUND(SUM(qtd * val_unit),2) AS valor, id_prod FROM tb_item_venda GROUP BY id_venda) AS ITEM
        ON VEND.id = ITEM.id_comp
        AND VEND.id_cliente = CLI.id
        AND VEND.id_resp = USR.id
        AND x00 x01 x02
        AND VEND.data >= "x03"
        AND VEND.data <= "x04"
        ORDER BY VEND.data DESC;',
    "11" => 'INSERT INTO tb_venda (id, id_cliente, id_resp, status, obs, data) VALUES(x00, "x01", "x02", "x03", "x04", "x05") 
        ON DUPLICATE KEY UPDATE id_cliente="x01", id_resp="x02", status="x03", obs="x04", data="x05";',
    "12" => 'DELETE FROM tb_venda WHERE id="x00" AND (SELECT U.class FROM tb_usuario AS U WHERE hash="x01") IN (10);',
    "13" => 'SELECT ITEM.*,  LOCAL.modelo, PROD.nome, PROD.und, PROD.preco, PROD.margem, ROUND(ITEM.qtd * ITEM.val_unit ,2) as total
        FROM tb_item_venda AS ITEM 
        INNER JOIN tb_prod AS PROD
        INNER JOIN tb_local AS LOCAL
        ON PROD.id = ITEM.id_prod
        AND (LOCAL.id = ITEM.id_local_origem OR ITEM.id_local_origem=0)
        AND ITEM.id_venda="x00";',
    "14" => 'INSERT INTO tb_item_venda (id, id_venda, id_prod, qtd, und, val_unit, id_local_origem) VALUES(x00, x01, "x02", "x03", "x04", "x05", "x06") 
        ON DUPLICATE KEY UPDATE   id_venda="x01", id_prod="x02", qtd="x03", und="x04", val_unit="x05";',
    "15" => 'DELETE FROM tb_item_venda WHERE y00="x00" AND (SELECT U.class FROM tb_usuario AS U WHERE hash="x01") IN (10);',
    "16" => 'INSERT INTO tb_usuario (id, user, hash, class, nome, email, cel, db, modulos) VALUES (x00, "x01", "x02", "x03", "x04", "x05", "x06", "x07", "x08") 
        ON DUPLICATE KEY UPDATE user="x01", hash="x02", class="x03", nome="x04", email="x05", cel="x06";',
    "17" => 'DELETE FROM tb_usuario WHERE id="x00";',
    "18" => 'INSERT INTO tb_local (id, ano, modelo, placa, tipo, tara, local) VALUES (x00, "x01", "x02", "x03", "x04", "x05", "x06") 
        ON DUPLICATE KEY UPDATE ano="x01", modelo="x02", placa="x03", tipo="x04", tara="x05", local="x06";',
    "19" => 'DELETE FROM tb_local WHERE id="x00"',
    "20" => 'SELECT * FROM tb_local WHERE x01 x02 x03 AND(SELECT U.class FROM tb_usuario AS U WHERE hash="x00") IN (10) ORDER BY modelo;' ,
    "21" => 'INSERT INTO tb_motorista (id, nome, cpf, rg, cnh, tipo, validade, id_usuario, id_local, limite) VALUES (x00, "x01", "x02", "x03", "x04", "x05", "x06", "x07", "x08", "x09") 
        ON DUPLICATE KEY UPDATE nome="x01", cpf="x02", rg="x03", cnh="x04", tipo="x05", validade="x06", id_usuario="x07", id_local="x08", limite="x09";',
    "22" => 'DELETE FROM tb_motorista WHERE id="x00" AND (SELECT U.class FROM tb_usuario AS U WHERE hash="x01") IN (10);',
    "23" => 'SELECT MOT.*, LOCAL.modelo
        FROM tb_motorista AS MOT
        INNER JOIN tb_local AS LOCAL
        ON MOT.id_local = LOCAL.id
        AND(SELECT U.class FROM tb_usuario AS U WHERE hash="x00") IN (10)
        ORDER BY nome;' ,
    "24" => 'INSERT INTO tb_material (id, nome, cod, ncm, und) VALUES(x00, "x01", "x02", "x03", "x04") 
        ON DUPLICATE KEY UPDATE nome="x01", cod="x02", ncm="x03", und="x04";',
    "25" => 'DELETE FROM tb_material WHERE id=x00 AND (SELECT U.class FROM tb_usuario AS U WHERE hash="x01") IN (10);' ,
    "26" => 'SELECT * FROM tb_usuario WHERE (SELECT U.class FROM tb_usuario AS U WHERE hash="x00") IN (10) ORDER BY nome;',
    "27" => 'DELETE FROM tb_usuario WHERE id=x00 ;',
    "28" => 'SELECT MOT.*, LOCAL.modelo, LOCAL.placa
        FROM tb_motorista AS MOT
        INNER JOIN tb_usuario AS USR
        INNER JOIN tb_local AS LOCAL
        ON MOT.id_usuario = USR.id
        AND MOT.id_local = LOCAL.id
        AND USR.hash = "x00"
        AND USR.user = "x01";' ,
    "29" => 'SELECT ITEM.*, ROUND(SUM(ITEM.qtd),2) as qtd_tot, PROD.nome, PROD.und, PROD.preco, PROD.margem, ROUND(ITEM.qtd * ITEM.val_unit ,2) as total, ROUND(PROD.margem,2) as val_venda
        FROM tb_item_estoque AS ITEM 
        INNER JOIN tb_prod AS PROD
        ON PROD.id = ITEM.id_prod
        AND ITEM.id_local="x00"
        AND ITEM.qtd > 0
        GROUP BY ITEM.id_prod
        ORDER BY PROD.nome;',
    "30" => 'INSERT INTO tb_item_estoque (id_local, id_prod, qtd, und, val_unit) VALUES (x00, "x01", "x02", "x03", "x04") 
        ON DUPLICATE KEY UPDATE  id_local="x00", id_prod="x01", qtd=(qtd+x02), und="x03", val_unit=x04;',
    "31" => 'SELECT * FROM tb_motorista
	    WHERE id NOT IN (SELECT V.id_motorista FROM tb_viagem AS V WHERE V.aberta=1)	
	    GROUP BY nome;' ,
    "32" => 'SELECT * FROM tb_material WHERE(SELECT U.class FROM tb_usuario AS U WHERE hash="x00") IN (10) ORDER BY nome;',
    "33" => 'UPDATE tb_viagem SET aberta="0" WHERE id=x00 AND (SELECT U.class FROM tb_usuario AS U WHERE hash="x01") IN (10)',
    "34" => 'DELETE FROM tb_item_estoque WHERE y00="x00" AND y01="x01" AND(SELECT U.class FROM tb_usuario AS U WHERE hash="x02") IN (10,1);',
    "35" => 'SELECT *, ROUND(qtd * val_venda ,2) as total  FROM tb_item_temp WHERE id_local="x00"
        GROUP BY id_prod;',
    "36" => 'INSERT INTO tb_item_temp (id, id_local, id_prod, nome, qtd, und, val_venda, id_item_compra, qtd_orig) VALUES(x00, "x01", "x02", "x03", "x04", "x05", "x06", "x07", "x08") 
        ON DUPLICATE KEY UPDATE  qtd="x04", val_venda="x06";',
    "37" => 'DELETE FROM tb_item_temp WHERE y00="x00" AND (SELECT U.class FROM tb_usuario AS U WHERE hash="x01") IN (10,1);',
    "38" => 'UPDATE tb_item_estoque SET qtd=(qtd-x02) WHERE id_local="x00" AND id_prod="x01";',
    "39" => 'SELECT * FROM 
                (SELECT ITEM.*, LOCAL.modelo, PROD.nome, ROUND(SUM(ITEM.qtd),2) AS qtd_tot 
                FROM tb_item_estoque AS ITEM 
                INNER JOIN tb_local AS LOCAL
                INNER JOIN tb_prod AS PROD
                ON LOCAL.id = ITEM.id_local
                AND PROD.id = ITEM.id_prod
                AND ITEM.id_prod=x00   
                GROUP BY LOCAL.id) AS SEL
            WHERE qtd_tot > 0;',
    "40" => 'SELECT *, 0 as qtd_tot, ROUND(margem ,2) AS venda FROM tb_prod 
        WHERE id NOT IN (
        SELECT ITEM.id_prod FROM tb_item_estoque AS ITEM
        INNER JOIN tb_viagem AS VIA
        ON VIA.id = ITEM.id_viagem
        AND VIA.aberta=1)
        AND nome LIKE "%x00%" 
        AND (SELECT U.class FROM tb_usuario AS U WHERE hash="x01") IN (10,1)
    UNION ALL
        SELECT PROD.*, ROUND(SUM(ITEM.qtd),2) as qtd_tot, ROUND(margem ,2) AS venda FROM tb_prod AS PROD
        INNER JOIN tb_viagem AS VIA
        INNER JOIN tb_item_estoque AS ITEM
        ON VIA.id = ITEM.id_viagem
        AND VIA.aberta=1
        AND PROD.id = ITEM.id_prod
        AND PROD.nome LIKE "%x00%" 
        AND (SELECT U.class FROM tb_usuario AS U WHERE hash="x01") IN (10,1) 
        GROUP BY ITEM.id_prod
        ORDER BY nome;',
    "41" => 'INSERT INTO tb_compra (id, id_cliente, id_resp, status, obs, data, id_local) VALUES(x00, "x01", "x02", "x03", "x04", "x05", "x06") 
        ON DUPLICATE KEY UPDATE id_cliente="x01", id_resp="x02", status="x03", obs="x04", data="x05", id_local="x06";',
    "42" => 'INSERT INTO tb_item_compra (id, id_compra, id_prod, qtd, und, val_unit, id_local_origem) VALUES(x00, x01, "x02", "x03", "x04", "x05", "x06") 
        ON DUPLICATE KEY UPDATE   id_compra="x01", id_prod="x02", qtd="x03", und="x04", val_unit="x05";',
    "43" => 'SELECT  CLI.*, COMP.*, ITEM.valor, USR.user, USR.nome AS nome_comp 
        FROM tb_compra AS COMP 
        INNER JOIN tb_clientes AS CLI
        INNER JOIN tb_usuario AS USR
        INNER JOIN ( SELECT id as id_comp, 0 as valor, 0 as id_prod FROM tb_compra WHERE id NOT IN (SELECT id_compra FROM tb_item_compra)
        UNION ALL SELECT id_compra, ROUND(SUM(qtd * val_unit),2) AS valor, id_prod FROM tb_item_compra GROUP BY id_compra) AS ITEM
        ON COMP.id = ITEM.id_comp
        AND COMP.id_cliente = CLI.id
        AND COMP.id_resp = USR.id
        AND x00 x01 x02
        AND COMP.data >= "x03"
        AND COMP.data <= "x04"
        ORDER BY COMP.data DESC;',
    "44" => 'SELECT ITEM.*, LOCAL.modelo, PROD.nome, PROD.und, PROD.preco, PROD.margem, ROUND((ITEM.qtd - ITEM.estorno) * ITEM.val_unit ,2) as total, ROUND(ITEM.qtd - ITEM.estorno ,2) as qtd_tot
        FROM tb_item_compra AS ITEM 
        INNER JOIN tb_prod AS PROD
        INNER JOIN tb_local AS LOCAL
        ON PROD.id = ITEM.id_prod
        AND (LOCAL.id = ITEM.id_local_origem OR ITEM.id_local_origem=0)
        AND ITEM.id_compra="x00"
        GROUP BY ITEM.id;',
    "45" => 'INSERT INTO tb_item_compra (id, id_compra, id_prod, qtd, und, val_unit) VALUES(x00, x01, x02, "x03", "x04", "x05") 
        ON DUPLICATE KEY UPDATE   id_compra="x01", id_prod="x02", qtd="x03", und="x04", val_unit="x05", estorno="x06";',
    "46" => 'DELETE FROM tb_item_compra WHERE y00="x00" AND (SELECT U.class FROM tb_usuario AS U WHERE hash="x01") IN (10);',
    "47" => 'SELECT TOTAL.* FROM 
	    (SELECT PROD.*, ROUND(SUM(ITEM.qtd),2) AS qtd_tot, ROUND(PROD.margem,2) as venda
		    FROM tb_item_estoque AS ITEM
            INNER JOIN tb_prod AS PROD
            ON ITEM.id_prod=PROD.ID	
            GROUP BY ITEM.id_prod
        UNION ALL 
            SELECT *, 0 AS qtd_tot, ROUND(margem,2) as venda
            FROM tb_prod
        ) AS TOTAL
        WHERE TOTAL.nome LIKE "%x00%"
        GROUP BY TOTAL.id;',
    "48" => ' UPDATE tb_item_estoque SET qtd=x02, val_unit=x04 WHERE id_local="x00" AND id_prod="x01";',
    "49" => 'DELETE FROM tb_compra WHERE id="x00" AND (SELECT U.class FROM tb_usuario AS U WHERE hash="x01") IN (10);',
    "50" => 'UPDATE tb_saldo SET y01=x01 WHERE id="x00";',
    "51" => 'UPDATE tb_item_compra SET y01="x01" WHERE id=x00;',
    "52" => 'SELECT ITEM.*, MAT.ncm, PROD.nome, PROD.und, PROD.preco, PROD.margem, ROUND((ITEM.qtd - ITEM.estorno) * ITEM.val_unit ,2) as total, ROUND(ITEM.qtd - ITEM.estorno ,2) as qtd_tot 
        FROM x00 AS ITEM 
        INNER JOIN tb_prod AS PROD
        INNER JOIN tb_material AS MAT
        ON PROD.id = ITEM.id_prod
        AND PROD.id_mat =  MAT.id
        AND y01="x01" 
        AND (SELECT U.class FROM tb_usuario AS U WHERE hash="x02") IN (10);',
    "53" => 'SELECT MAIL.*, USER.nome AS remetente
        FROM tb_mail AS MAIL 
        INNER JOIN tb_usuario AS USER
        ON MAIL.de=USER.id
        AND MAIL.para=x00
        ORDER BY MAIL.id DESC;',
    "54" => 'INSERT INTO tb_mail (id, de, para, txt) VALUES(DEFAULT, x00, x01, "x02");',
    "55" => 'UPDATE tb_mail  SET nao_lida=FALSE  WHERE id=x00;',
    "56" => 'SELECT id, nome FROM tb_usuario WHERE id NOT IN (x00) ORDER BY nome;',
    "57" => 'DELETE FROM tb_mail WHERE para=x00 AND y01 x02 x01;',
    "58" => 'INSERT INTO tb_saldo (id, id_cliente, data, valor, tipo, quitado, obs, id_origem, tb_origem) VALUES(x00, x01, "x02", "x03", "x04", "x05", "x06", x07, "x08") 
        ON DUPLICATE KEY UPDATE id_cliente="x01", data="x02", valor="x03", tipo="x04", quitado="x05", obs="x06", id_origem="x07", tb_origem="x08";',
    "59" => 'SELECT SAL.*, CLI.fantasia
        FROM tb_saldo AS SAL
        INNER JOIN tb_clientes AS CLI
        ON SAL.id_cliente = CLI.id
        AND x00 x01 x02
        AND SAL.tb_origem NOT IN("x03")
        AND data >= "x04"
        AND data <= "x05"
        ORDER BY SAL.data DESC, SAL.id DESC;',
    "60" => 'DELETE FROM tb_saldo WHERE id="x00" AND (SELECT U.class FROM tb_usuario AS U WHERE hash="x01") IN (10);',
    "61"  => 'SELECT * FROM tb_calendario WHERE y00=x00 AND data_agd>="x01" AND data_agd<="x02";',
    "62"  => 'INSERT INTO tb_calendario (id_user, data_agd, obs) VALUES(x00, "x01", "x02") ON DUPLICATE KEY UPDATE obs="x02";',         
    "63"  => 'DELETE FROM tb_calendario WHERE id_user="x00" AND data_agd="x01";',
    "64"  => 'SELECT * FROM tb_banco WHERE(SELECT U.class FROM tb_usuario AS U WHERE hash="x00") IN (10) ORDER BY banco;' ,
    "65"  => 'INSERT INTO tb_banco (id, banco, bco_ag, bco_cc, bco_pix) VALUES(x00, "x01", "x02", "x03", "x04") 
        ON DUPLICATE KEY UPDATE banco="x01", bco_ag="x02", bco_cc="x03", bco_pix="x04";',
    "66"  => 'DELETE FROM tb_banco WHERE id="x00" AND (SELECT U.class FROM tb_usuario AS U WHERE hash="x01") IN (10);',
    "67"  => 'SELECT * FROM tb_lanc_bancario  
        WHERE id_banco = "x00" AND  data >= "x01 00:00:00" AND data <= "x02 23:59:59" ORDER BY data ASC;' ,
    "68"  => 'INSERT INTO tb_lanc_bancario (id, id_banco, id_cliente, data, valor, forma, ref, obs) VALUES(x00, "x01", "x02", "x03", "x04", "x05", "x06", "x07") 
        ON DUPLICATE KEY UPDATE id_banco="x01", data="x03", valor="x04", forma="x05", obs="x07";',
    "69"  => 'DELETE FROM tb_lanc_bancario WHERE id="x00" AND (SELECT U.class FROM tb_usuario AS U WHERE hash="x01") IN (10);',
    "70"  => 'SELECT ROUND(SUM(valor),2) AS saldo_ini FROM tb_lanc_bancario 
        WHERE id_banco = "x00" AND data < "x01" ;',
    "71" => 'SELECT PROD.nome, ROUND((ITEM.qtd - ITEM.estorno),2) AS qtd, ITEM.und, ROUND(ITEM.val_unit,2) AS preco, ROUND(ITEM.val_unit * ITEM.qtd,2) AS total
        FROM x02 AS ITEM
        INNER JOIN tb_prod AS PROD
        ON ITEM.id_prod = PROD.id
        AND ITEM.x01 = "x00";',
    "72" => 'DELETE FROM tb_saldo WHERE id_origem="x00" AND tb_origem="x02" AND (SELECT U.class FROM tb_usuario AS U WHERE hash="x01") IN (10);',

    );

?>