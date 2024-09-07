drop database sislojamarca;
create database sislojamarca;
use sislojamarca;

create table usuario(
    IDSuap VARCHAR(15) primary key,
    nome VARCHAR(100) not null,
    email VARCHAR(100) unique,
    senha VARCHAR(100),
    telefone VARCHAR(11),
    cpf VARCHAR(15) unique
);

create table fornecedor(
    IDFornecedor VARCHAR(15) primary key,
    nomeFornecedor VARCHAR(100) not null,
    email VARCHAR(100) unique,
    cpf VARCHAR(11) unique,
    cnpj VARCHAR(14) unique
);

create table clientes(
    IDSuap_cliente VARCHAR(15) primary key,
    nome VARCHAR(100) not null,
    email VARCHAR(100) unique,
	senha VARCHAR(100),
    telefone VARCHAR(11),
    cpf VARCHAR(15) unique, 
    admID VARCHAR(15),
    FOREIGN KEY (admID)
    references usuario (IDSuap) 
);

create table marca(
    IDMarca INT AUTO_INCREMENT primary key,
    nomeMarca VARCHAR(255) not null unique,
    sigla varchar(10) not null unique,
    descricao TEXT,
    dataCriacao DATE,
    contato VARCHAR(100),
    endereco VARCHAR(255),
    IDFornecedor VARCHAR(15),
    FOREIGN KEY (IDFornecedor)
    references fornecedor (IDFornecedor) 
);

create table produto(
    CBarra VARCHAR(13) primary key,
    titulo VARCHAR(255) not null,
    preco DECIMAL(10, 2),
    marca INT,
    tipo VARCHAR(11),
    qtdProduto INT,
    IDSuap_produto VARCHAR(16),
    FOREIGN KEY (IDSuap_produto)
    references usuario (IDSuap),
    FOREIGN KEY (marca)
    references marca (IDMarca)
);

create table venda (
    IDVenda INT primary key AUTO_INCREMENT,
    CBarra VARCHAR(13),
    IDSuap_cliente VARCHAR(15),
    dataVenda DATE,
    preco DECIMAL(10,2),
    descontoProduto TINYINT,
    tamanhos VARCHAR(11),
    quantidade BIGINT,
    FOREIGN KEY (CBarra) 
    references produto(CBarra),
    FOREIGN KEY (IDSuap_cliente) 
    references clientes (IDSuap_cliente)
);

create table compra (
	IDCompra INT AUTO_INCREMENT PRIMARY KEY,
	CBarra VARCHAR(13),
	qtdProduto SMALLINT,
	dataCompra DATE,
	IDFornecedor VARCHAR(15), 
	FOREIGN KEY (CBarra)
	references produto (CBarra),
	FOREIGN KEY (IDFornecedor)
	references fornecedor (IDFornecedor)
);

insert into usuario values
("20221GBI23I0010", "admin", "admin@gmail.com", "2ac9a6746aca543af8dff39894cfe8173afba21eb01c6fae33d52947222855ef", "77999999999", "00000000001");

insert into fornecedor values
("1", "Gabriel", "gabriel@gmail", "10345678901", "91811234567"),
("2", "ADM", "adm@gmail", "10079345655", "918230195681"),
("3", "N/A", "nada@gmail", "10000000001", "918230192381");

insert into marca values
(DEFAULT, "ESE", "ESE", "bla bla bla", "2020-09-09", "1923810", "Rua Oscar Alho, 600", "1"),
(DEFAULT, "Laboratoria", "LAB", "bla bla bla", "2020-09-09", "1923810", "Rua Oscar Alho, 601", "1"),
(DEFAULT, "Nova Era", "NE", "bla bla bla", "2020-09-09", "1923810", "Rua Oscar Alho, 602", "1");

insert into produto values 
("03192831290", "Moleton Nike", "120.00", 1, "Moleton", "100", "20221GBI23I0010"),
("04192831290", "High New Shots", "123.00", 3, "Camisa", "500", "20221GBI23I0010");

select * from fornecedor;
select * from usuario;
select * from marca;
select * from produto;
select * from clientes;
select * from venda;
select * from compra;



