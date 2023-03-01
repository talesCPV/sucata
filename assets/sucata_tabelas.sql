
CREATE TABLE tb_usuario (
    id int(11) NOT NULL AUTO_INCREMENT,
    user varchar(12) NOT NULL,
    hash varchar(30) NOT NULL,
    class int(11) DEFAULT NULL,
    nome varchar(40) DEFAULT NULL,
    email varchar(70) DEFAULT NULL,
    cel varchar(14) DEFAULT NULL,
    db varchar(10) DEFAULT NULL,
	UNIQUE KEY (user),
    PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

ALTER TABLE tb_usuario
ADD COLUMN db varchar(10) DEFAULT NULL;
ALTER TABLE tb_usuario ALTER column db varchar(10) DEFAULT NULL;


UPDATE tb_usuario SET db="d2soft98_sucata_2" WHERE id=1;

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
    modal varchar(5) DEFAULT "FORN",
	UNIQUE KEY (nome),
    PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

ALTER TABLE tb_clientes
ADD COLUMN whatsapp varchar(15) DEFAULT NULL;

CREATE TABLE tb_und(
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(20) NOT NULL,
    sigla VARCHAR(10) NOT NULL,
    PRIMARY KEY(id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

/*DROP TABLE tb_material;*/
CREATE TABLE tb_material(
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(20) NOT NULL,
    cod VARCHAR(20) DEFAULT NULL,
    ncm VARCHAR(8) DEFAULT "",
    und VARCHAR(10) DEFAULT "KG",
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

ALTER TABLE tb_prod DROP COLUMN mat;

ALTER TABLE tb_prod
ADD COLUMN id_mat int(11) NOT NULL DEFAULT 1;

ALTER TABLE tb_prod
ADD FOREIGN KEY (id_mat) REFERENCES tb_material(id);

/*DROP TABLE tb_venda;*/
CREATE TABLE tb_venda(
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

/*DROP TABLE tb_item_venda;*/
CREATE TABLE tb_item_venda(
    id INT NOT NULL AUTO_INCREMENT,
    id_venda int(11) NOT NULL,
    id_prod int(11) NOT NULL,
    qtd double NOT NULL DEFAULT 0,
    und  VARCHAR(10) NOT NULL,
    val_unit double NOT NULL DEFAULT 0,
    FOREIGN KEY (id_venda) REFERENCES tb_venda(id),
    FOREIGN KEY (id_prod) REFERENCES tb_prod(id),
    PRIMARY KEY(id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

/*DROP TABLE tb_compra;*/
CREATE TABLE tb_compra(
    id INT NOT NULL AUTO_INCREMENT,
    id_cliente int(11) NOT NULL,
    id_local int(11) NOT NULL,
	id_resp int(11) NOT NULL,
    status varchar(10) NOT NULL DEFAULT "FECHADO",
    obs varchar(255) DEFAULT NULL,
	data datetime DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_cliente) REFERENCES tb_clientes(id),
    FOREIGN KEY (id_local) REFERENCES tb_local(id),
    FOREIGN KEY (id_resp) REFERENCES tb_usuario(id),
    PRIMARY KEY(id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

ALTER TABLE tb_compra
ADD COLUMN id_local int(11) NOT NULL DEFAULT 3;

/*DROP TABLE tb_item_compra;*/
CREATE TABLE tb_item_compra(
    id INT NOT NULL AUTO_INCREMENT,
    id_compra int(11) NOT NULL,
    id_prod int(11) NOT NULL,
    qtd double NOT NULL DEFAULT 0,
    und  VARCHAR(10) NOT NULL,
    val_unit double NOT NULL DEFAULT 0,
    estorno double DEFAULT 0,
    FOREIGN KEY (id_compra) REFERENCES tb_compra(id),
    FOREIGN KEY (id_prod) REFERENCES tb_prod(id),
    PRIMARY KEY(id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

ALTER TABLE tb_item_compra
MODIFY estorno double DEFAULT 0;

/*DROP TABLES tb_local;*/
CREATE TABLE tb_local(
    id INT NOT NULL AUTO_INCREMENT,
    ano  VARCHAR(4) NOT NULL,
    modelo  VARCHAR(20) NOT NULL,
    placa  VARCHAR(8) NOT NULL,
    tipo VARCHAR(10) DEFAULT "CAMINHÃO",
    tara double NOT NULL DEFAULT 0,
    local VARCHAR(5) DEFAULT "FIXO",
    PRIMARY KEY(id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

ALTER TABLE tb_veiculo
ADD COLUMN local VARCHAR(5) DEFAULT "FIXO";

/*drop table tb_motorista;*/
CREATE TABLE tb_motorista(
    id INT NOT NULL AUTO_INCREMENT,
    id_usuario int(11) DEFAULT NULL,
    id_local int(11) DEFAULT NULL,
    nome  VARCHAR(40) NOT NULL DEFAULT "",
    cpf  VARCHAR(14) NOT NULL DEFAULT "",
    rg  VARCHAR(12) NOT NULL DEFAULT "",
    cnh VARCHAR(12) NOT NULL DEFAULT "",
    tipo VARCHAR(2) NOT NULL DEFAULT "",
    limite BOOLEAN NOT NULL DEFAULT 1,
    FOREIGN KEY (id_usuario) REFERENCES tb_usuario(id),
    FOREIGN KEY (id_local) REFERENCES tb_local(id),
	validade date DEFAULT NULL,
    PRIMARY KEY(id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

ALTER TABLE tb_motorista
ADD COLUMN limite BOOLEAN NOT NULL DEFAULT 0;

/*drop table tb_viagem;*/
CREATE TABLE tb_viagem(
    id INT NOT NULL AUTO_INCREMENT,
    id_motorista int(11) NOT NULL,
	id_veiculo int(11) NOT NULL,
    data datetime DEFAULT CURRENT_TIMESTAMP,
    aberta boolean DEFAULT TRUE,
    obs varchar(255) DEFAULT NULL,
    FOREIGN KEY (id_motorista) REFERENCES tb_motorista(id),
    FOREIGN KEY (id_veiculo) REFERENCES tb_local(id),
    PRIMARY KEY(id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

/*drop table tb_item_estoque;*/
CREATE TABLE tb_item_estoque(
    id_local int(11) NOT NULL,
    id_prod int(11) NOT NULL,
    qtd double NOT NULL DEFAULT 0,
    und  VARCHAR(10) NOT NULL,
    val_unit double NOT NULL DEFAULT 0,
    FOREIGN KEY (id_local) REFERENCES tb_local(id),
    FOREIGN KEY (id_prod) REFERENCES tb_prod(id),
    PRIMARY KEY(id_local,id_prod)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

/*drop table tb_item_temp;*/
CREATE TABLE tb_item_temp(
    id INT NOT NULL AUTO_INCREMENT,
    id_local int(11) NOT NULL,
    id_prod int(11) NOT NULL,
    nome VARCHAR(20) NOT NULL,
    qtd double NOT NULL DEFAULT 0,
    und  VARCHAR(10) NOT NULL,
    val_venda double NOT NULL DEFAULT 0,
    id_item_compra int(11) DEFAULT 0,
    FOREIGN KEY (id_local) REFERENCES tb_local(id),
    FOREIGN KEY (id_prod) REFERENCES tb_prod(id),
    PRIMARY KEY(id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

ALTER TABLE tb_item_temp
ADD COLUMN id_item_compra int(11) DEFAULT 0;
ALTER TABLE tb_item_temp
ADD COLUMN qtd_orig double DEFAULT 0;

/*drop table tb_mail;*/
CREATE TABLE tb_mail(
    id INT NOT NULL AUTO_INCREMENT,
    de int(11) NOT NULL,
    para int(11) NOT NULL,
    nao_lida BOOLEAN DEFAULT TRUE,
    txt VARCHAR(255) NOT NULL DEFAULT "",
    data datetime DEFAULT CURRENT_TIMESTAMP, 
    FOREIGN KEY (de) REFERENCES tb_usuario(id),
    FOREIGN KEY (para) REFERENCES tb_usuario(id),
    PRIMARY KEY(id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

/*drop table tb_saldo;*/
CREATE TABLE tb_saldo(
    id INT NOT NULL AUTO_INCREMENT,
    id_cliente int(11) NOT NULL,
    data datetime DEFAULT CURRENT_TIMESTAMP, 
    valor double NOT NULL DEFAULT 0,
    tipo VARCHAR(7) NOT NULL DEFAULT "PAGAR",
    quitado BOOLEAN DEFAULT FALSE,
    obs VARCHAR(255) NOT NULL DEFAULT "",
	FOREIGN KEY (id_cliente) REFERENCES tb_clientes(id),
    PRIMARY KEY(id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE tb_banco(
    id INT NOT NULL AUTO_INCREMENT,
    banco VARCHAR(30) NOT NULL,
	bco_ag varchar(6) DEFAULT NULL,
    bco_cc varchar(15) DEFAULT NULL,
	bco_pix varchar(40) DEFAULT NULL,
    PRIMARY KEY(id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

/*drop table tb_lanc_bancario;*/
CREATE TABLE tb_lanc_bancario(
    id INT NOT NULL AUTO_INCREMENT,
    id_banco INT NOT NULL,
    id_cliente INT NOT NULL,
    data datetime NOT NULL, 
    valor double NOT NULL,
    forma VARCHAR(10) DEFAULT NULL,
    ref VARCHAR(40) DEFAULT NULL,
    obs VARCHAR(255) DEFAULT NULL,
	FOREIGN KEY (id_banco) REFERENCES tb_banco(id),
    FOREIGN KEY (id_cliente) REFERENCES tb_clientes(id),
    PRIMARY KEY(id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;