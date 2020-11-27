DROP DATABASE IF EXISTS meudia;
CREATE DATABASE meudia;
USE meudia;

CREATE TABLE prioridade (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nemotecnico VARCHAR(50) NOT NULL,
	descricao VARCHAR(300) NOT NULL
);

CREATE TABLE notificacao (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	titulo VARCHAR(50) NOT NULL,
	classificacao VARCHAR(50) NOT NULL,
	descricao VARCHAR (300) NOT NULL
);

CREATE TABLE usuario (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	login VARCHAR(100) NOT NULL,
	senha VARCHAR(100) NOT NULL,
	sexo VARCHAR(100),
	nome VARCHAR(255),
	h_sono_inicio TIME,
	h_sono_fim TIME,
	email VARCHAR(100),
	url_imagem VARCHAR(300) NULL
);

CREATE TABLE tipo_tarefa (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	descricao VARCHAR(300) NOT NULL,
	usuario INT,
	h_inicio TIME,
	h_fim TIME,
    dt_desliga DATE,
    liga_desliga CHAR COMMENT '0 = liga, 1 = desliga',
	CONSTRAINT fk_usuario_tpt FOREIGN KEY (usuario) REFERENCES usuario (id)
);

CREATE TABLE tarefa (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	usuario INT,
	titulo VARCHAR(100),
	descricao VARCHAR(500),
	subtitulo VARCHAR(200),
	h_inicio TIME,
	h_fim TIME,
	data_tarefa DATE NOT NULL,
	tipo_tarefa INT,
	prioridade INT,

	CONSTRAINT fk_prioridade FOREIGN KEY (prioridade) REFERENCES prioridade(id),
	CONSTRAINT fk_usuario_tar FOREIGN KEY (usuario) REFERENCES usuario(id),
	CONSTRAINT fk_tipo_tarefa FOREIGN KEY (tipo_tarefa) REFERENCES tipo_tarefa(id)
);

CREATE TABLE usuario_notificacao (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,   
	usuario INT NOT NULL,
	notificacao INT NOT NULL,
	CONSTRAINT fk_notificacao FOREIGN KEY (notificacao) REFERENCES notificacao(id),
	CONSTRAINT fk_usuario_notf FOREIGN KEY (usuario) REFERENCES usuario(id)
);
