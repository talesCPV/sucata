
CREATE TABLE tb_usuario (
    id int(11) NOT NULL AUTO_INCREMENT,
    user varchar(12) NOT NULL,
    hash varchar(30) NOT NULL,
    class int(11) DEFAULT NULL,
    nome varchar(40) DEFAULT NULL,
    email varchar(70) DEFAULT NULL,
    cel varchar(14) DEFAULT NULL,
	UNIQUE KEY (user),
    PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

INSERT INTO tb_usuario VALUES (DEFAULT,"sassu","$~N~3Z69*~<x6r0l*f$`?Z9T3N-H'B",10,null,null,null);

/*DROP TABLE tb_clientes;*/
CREATE TABLE tb_clientes(
    id int(11) NOT NULL AUTO_INCREMENT,
    nome varchar(50) NOT NULL,
    fantasia varchar(40) DEFAULT null,
    tipo varchar(3) DEFAULT NULL,
    cnpj_cpf varchar(18) DEFAULT NULL,
    ie varchar(15) DEFAULT NULL,
    im varchar(15) DEFAULT NULL,
    endereco varchar(60) DEFAULT NULL,
    num varchar(6) DEFAULT NULL,
    bairro varchar(50) DEFAULT NULL,
    cep varchar(10) DEFAULT NULL,
    cidade varchar(30) DEFAULT NULL,
    estado varchar(2) DEFAULT NULL,
    tel varchar(15) DEFAULT NULL,
    bco_nome varchar(15) DEFAULT NULL,
    bco_ag varchar(6) DEFAULT NULL,
    bco_cc varchar(15) DEFAULT NULL,
	bco_pix varchar(40) DEFAULT NULL,
    saldo DOUBLE NOT NULL DEFAULT 0,
	UNIQUE KEY (nome),
    PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE tb_und(
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(20) NOT NULL,
    sigla VARCHAR(10) NOT NULL,
    PRIMARY KEY(id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

/*DROP TABLE tb_prod;*/
CREATE TABLE tb_prod(
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(20) NOT NULL,
    und  VARCHAR(10) NOT NULL,
    preco double NOT NULL DEFAULT 0,
    margem double NOT NULL DEFAULT 100,
    qtd double NOT NULL DEFAULT 0,
    PRIMARY KEY(id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

ALTER TABLE tb_prod
ADD COLUMN qtd double NOT NULL DEFAULT 0;

/*DROP TABLE tb_compra;*/
CREATE TABLE tb_compra(
    id INT NOT NULL AUTO_INCREMENT,
    id_cliente int(11) NOT NULL,
	id_resp int(11) NOT NULL,
    status varchar(10) NOT NULL DEFAULT "ABERTO",
    obs varchar(255) DEFAULT NULL,
	data datetime DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_cliente) REFERENCES tb_clientes(id),
    FOREIGN KEY (id_resp) REFERENCES tb_usuario(id),
    PRIMARY KEY(id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE tb_item_compra(
    id INT NOT NULL AUTO_INCREMENT,
    id_compra int(11) NOT NULL,
    id_prod int(11) NOT NULL,
    qtd double NOT NULL DEFAULT 0,
    und  VARCHAR(10) NOT NULL,
    val_unit double NOT NULL DEFAULT 0,
    FOREIGN KEY (id_compra) REFERENCES tb_compra(id),
    FOREIGN KEY (id_prod) REFERENCES tb_prod(id),
    PRIMARY KEY(id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

/*DROP TABLES tb_veiculo;*/
CREATE TABLE tb_veiculo(
    id INT NOT NULL AUTO_INCREMENT,
    ano  VARCHAR(4) NOT NULL,
    modelo  VARCHAR(20) NOT NULL,
    placa  VARCHAR(8) NOT NULL,
    tipo VARCHAR(10) DEFAULT "CAMINHÃO",
    tara double NOT NULL DEFAULT 0,
    PRIMARY KEY(id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE tb_motorista(
    id INT NOT NULL AUTO_INCREMENT,
    nome  VARCHAR(40) NOT NULL DEFAULT "",
    cpf  VARCHAR(14) NOT NULL DEFAULT "",
    rg  VARCHAR(12) NOT NULL DEFAULT "",
    cnh VARCHAR(12) NOT NULL DEFAULT "",
    tipo VARCHAR(2) NOT NULL DEFAULT "",    
	validade date DEFAULT NULL,
    PRIMARY KEY(id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;