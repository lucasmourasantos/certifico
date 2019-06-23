CREATE TABLE certificado (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  evento_id INTEGER UNSIGNED NOT NULL,
  layout VARCHAR(255) NULL,
  ass VARCHAR(255) NULL,
  PRIMARY KEY(id),
  INDEX certificado_FKIndex1(evento_id)
);

CREATE TABLE curso (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  evento_id INTEGER UNSIGNED NOT NULL,
  nome VARCHAR(255) NULL,
  ministrante VARCHAR(255) NULL,
  ch INTEGER UNSIGNED NULL,
  ch_min INTEGER UNSIGNED NULL,
  inicio VARCHAR(10) NULL,
  fim VARCHAR(10) NULL,
  turno VARCHAR(5) NULL,
  PRIMARY KEY(id),
  INDEX curso_FKIndex1(evento_id)
);

CREATE TABLE evento (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  instituicao_id INTEGER UNSIGNED NOT NULL,
  nome VARCHAR(255) NULL,
  PRIMARY KEY(id),
  INDEX evento_FKIndex1(instituicao_id)
);

CREATE TABLE instituicao (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NULL,
  PRIMARY KEY(id)
);

CREATE TABLE participante (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NULL,
  sexo VARCHAR(50) NULL,
  rg VARCHAR(11) NULL,
  cpf VARCHAR(14) NULL,
  data_nasc VARCHAR(10) NULL,
  cep VARCHAR(10) NULL,
  rua VARCHAR(255) NULL,
  bairro VARCHAR(255) NULL,
  cidade VARCHAR(255) NULL,
  estado VARCHAR(255) NULL,
  f1 BLOB NULL,
  fone VARCHAR(15) NULL,
  PRIMARY KEY(id)
);

CREATE TABLE participante_tem_curso (
  participante_id INTEGER UNSIGNED NOT NULL,
  curso_id INTEGER UNSIGNED NOT NULL,
  evento_id INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(participante_id, curso_id),
  INDEX participante_has_curso_FKIndex1(participante_id),
  INDEX participante_has_curso_FKIndex2(curso_id),
  INDEX participante_tem_curso_FKIndex3(evento_id)
);

CREATE TABLE ponto (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  curso_id INTEGER UNSIGNED NOT NULL,
  participante_id INTEGER UNSIGNED NOT NULL,
  data_2 VARCHAR(10) NULL,
  hora VARCHAR(5) NULL,
  PRIMARY KEY(id),
  INDEX ponto_FKIndex1(participante_id),
  INDEX ponto_FKIndex2(curso_id)
);

CREATE TABLE users (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  usuario VARCHAR(255) NULL,
  email VARCHAR(255) NULL,
  senha VARCHAR(255) NULL,
  PRIMARY KEY(id)
);

CREATE TABLE validacao (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  cpf VARCHAR(14) NULL,
  nome VARCHAR(255) NULL,
  curso VARCHAR(255) NULL,
  codigo VARCHAR(10) NULL,
  PRIMARY KEY(id)
);


