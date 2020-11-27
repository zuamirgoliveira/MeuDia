drop database if exists meudia;
create database meudia;
use meudia;

create table prioridade(
id int primary key NOT NULL AUTO_INCREMENT,
nemotecnico varchar(50) NOT NULL,
descricao varchar (300) NOT NULL
);

create table notificacao(
id int primary key NOT NULL AUTO_INCREMENT,
titulo varchar(50) NOT NULL,
classificacao varchar(50) NOT NULL,
descricao varchar (300) NOT NULL
);


create table usuario(
id int primary key NOT NULL AUTO_INCREMENT,
login varchar(100) NOT NULL,
senha varchar(100) NOT NULL,
sexo varchar(100),
nome varchar(100),
email varchar(100),
h_sono_inicio time,
h_sono_fim time
);

ALTER TABLE usuario ADD url_imagem VARCHAR(255) NULL;

create table tipo_tarefa(
id int primary key NOT NULL AUTO_INCREMENT,
descricao varchar (300) NOT NULL,
usuario int,
h_inicio time,
h_fim time,
CONSTRAINT usuario FOREIGN KEY (usuario) references usuario(id)
);

ALTER TABLE tipo_tarefa
ADD COLUMN dt_desliga DATE;

ALTER TABLE tipo_tarefa
ADD COLUMN liga_desliga CHAR COMMENT '0 = liga, 1 = desliga';

create table tarefa(
id int primary key NOT NULL AUTO_INCREMENT,
usuario int,
titulo varchar(100),
descricao varchar(500),
subtitulo varchar(200),
h_inicio time,
h_fim time,
data_tarefa date NOT NULL,
tipo_tarefa int,
prioridade int,

CONSTRAINT prioridade FOREIGN KEY (prioridade) references prioridade(id),
CONSTRAINT usuario FOREIGN KEY (usuario) references usuario(id),
CONSTRAINT tipo_tarefa FOREIGN KEY (tipo_tarefa) references tipo_tarefa(id)
);

create table usuario_notificacao(
id int primary key NOT NULL AUTO_INCREMENT,   
usuario int NOT NULL,
notificacao int NOT NULL,
CONSTRAINT fk_notificacao FOREIGN KEY (notificacao) references notificacao(id),
CONSTRAINT fk_usuario FOREIGN KEY (usuario) references usuario(id)
);


