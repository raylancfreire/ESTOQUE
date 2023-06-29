create database estoque_raylan;
use estoque_raylan;



create table itens_tb(
id_item int primary key auto_increment,
nome_item varchar(255) NOT NULL,
qtd_item int not null,
cat_item varchar(255) NOT NULL,
local_item varchar (255) NOT NULL,
status_item varchar (255) not null,
solicitador_item varchar(255),
contato_solicitador_item bigint(11),
data_solicitacao_item TIMESTAMP NULL DEFAULT current_timestamp,
data_item TIMESTAMP NULL DEFAULT current_timestamp
);

CREATE TABLE relatorios_tb (
  id_relatorio INT PRIMARY KEY AUTO_INCREMENT,
  id_item INT,
  nome_item VARCHAR(255),
  quantidade INT,
  retirante_item VARCHAR(255),
  contato_retirante_item BIGINT(11),
  data_retirada_item TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (id_item) REFERENCES itens_tb(id_item)
);

select * from relatorios_tb;
drop table relatorios_tb;


drop table itens_tb;


create table usuarios(
id int auto_increment primary key,
email varchar(255) not null unique,
nome varchar(255) not null,
categoria varchar(50) not null,
login varchar(30) not null unique,
senha varchar(30) not null
);
select * from usuarios;
drop table usuarios;


create table chaves(
id_chave int primary key auto_increment,
numero_chave int (30) unique,
sala_chave varchar(255),
status_chave varchar(255),
solicitador_chave varchar (255),
contato_solicitador_chave bigint (11),
data_solicitacao_chave TIMESTAMP NULL DEFAULT current_timestamp
);

CREATE TABLE relatorios_tb (
    id_relatorio INT PRIMARY KEY AUTO_INCREMENT,
    id_item INT,
    nome_item VARCHAR(255),
    quantidade INT,
    retirante_item VARCHAR(255),
    contato_retirante_item BIGINT(11),
    data_retirada_item TIMESTAMP,
    FOREIGN KEY (id_item) REFERENCES itens_tb(id_item)
);

drop table relatorios_tb;

select * from chaves;

drop table chaves;

select * from usuarios;


select * from itens_tb;