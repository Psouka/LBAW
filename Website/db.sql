DROP TABLE IF EXISTS "Categoria" CASCADE;
DROP TABLE IF EXISTS "Pais" CASCADE;
DROP TABLE IF EXISTS "Cidade" CASCADE;
DROP TABLE IF EXISTS "Morada" CASCADE;
DROP TABLE IF EXISTS "Mensagem" CASCADE;
DROP TABLE IF EXISTS "ImagemUtilizador" CASCADE;
DROP TABLE IF EXISTS "ImagemLeilao" CASCADE;
DROP TABLE IF EXISTS "Comentario" CASCADE;
DROP TABLE IF EXISTS "Bloqueio" CASCADE;
DROP TABLE IF EXISTS "BloqueioUtilizador" CASCADE;
DROP TABLE IF EXISTS "BloqueioComentario" CASCADE;
DROP TABLE IF EXISTS "Utilizador" CASCADE;
DROP TABLE IF EXISTS "UtilizadorNormal" CASCADE;
DROP TABLE IF EXISTS "Administrador" CASCADE;
DROP TABLE IF EXISTS "Leilao" CASCADE;
DROP TABLE IF EXISTS "Licitacao" CASCADE;
DROP TABLE IF EXISTS "AvaliacaoUtilizador" CASCADE;
DROP TABLE IF EXISTS "AvaliacaoComentario" CASCADE;



CREATE TABLE Categoria(
	idCategoria BIGSERIAL PRIMARY KEY,
	tipo VARCHAR(20) UNIQUE NOT NULL
	);
CREATE INDEX categoria_index ON Categoria(tipo);

CREATE TABLE Pais(
	idPais BIGSERIAL PRIMARY KEY,
	nome VARCHAR(20) NOT NULL
	);

	
CREATE TABLE Cidade(
	idCidade BIGSERIAL PRIMARY KEY,
	idPais BIGINT REFERENCES Pais(idPais),
	nome VARCHAR(20) NOT NULL
	);



CREATE TABLE Morada(
	idMorada BIGSERIAL PRIMARY KEY,
	idCidade BIGINT REFERENCES Cidade(idCidade),
	linha1 TEXT NOT NULL,
	linha2 TEXT NOT NULL,
	codPostal INTEGER NOT NULL
	);



CREATE TABLE ImagemUtilizador(
	idImagemUtilizador BIGSERIAL PRIMARY KEY,
	localizacao VARCHAR(30) UNIQUE NOT NULL,
	nome VARCHAR(20) NOT NULL
	);
CREATE INDEX ImagemUtilizador_index ON ImagemUtilizador(idImagemUtilizador,localizacao);


CREATE TABLE Leilao(
	idLeilao BIGSERIAL PRIMARY KEY,
	nome VARCHAR(20) NOT NULL,
	descricao TEXT NOT NULL,
	precoInicial MONEY NOT NULL, 
	precoCompraImediata MONEY,
	dataDePublicacao TIMESTAMP NOT NULL,
	dataLimite TIMESTAMP NOT NULL
	);
CREATE INDEX leilao_index ON Leilao USING hash(nome,descricao,precoCompraImediata,dataLimite);

	
CREATE TABLE ImagemLeilao(
	idImagemLeilao BIGSERIAL PRIMARY KEY,
	idLeilao BIGINT REFERENCES Leilao(idLeilao),
	localizacao VARCHAR(30) UNIQUE NOT NULL,
	nome VARCHAR(20) NOT NULL
	);
CREATE INDEX ImagemLeilao_index ON ImagemLeilao(idImagemLeilao,localizacao);
ALTER TABLE public.ImagemLeilao CLUSTER ON ImagemLeilao_index;




CREATE TABLE Utilizador(
	idUtilizador BIGSERIAL PRIMARY KEY,
	utilizador VARCHAR(20) UNIQUE NOT NULL,
	palavrapasse VARCHAR(20) NOT NULL,
	nomeProprio VARCHAR(20) NOT NULL,
	sobrenome VARCHAR(20) NOT NULL,
	genero VARCHAR(9) NOT NULL,
	descricao TEXT,
	email VARCHAR(30) UNIQUE NOT NULL,
	telefone INTEGER NOT NULL,
	dataNascimento DATE NOT NULL,
	dataRegisto DATE NOT NULL,
	idImagemPerfil BIGINT REFERENCES ImagemUtilizador(idImagemUtilizador),
	idImagemCapa BIGINT REFERENCES ImagemUtilizador(idImagemUtilizador)
	);
CREATE INDEX Utilizador_index ON Utilizador(nomeProprio,sobrenome,idImagemPerfil);
ALTER TABLE public.Utilizador CLUSTER ON Utilizador_index;


CREATE TABLE Mensagem(
	idMensagem BIGSERIAL PRIMARY KEY,
	idEmissor BIGINT REFERENCES Utilizador(idUtilizador),
	idReceptor BIGINT REFERENCES Utilizador(idUtilizador),
	assunto TEXT NOT NULL,
	texto TEXT,
	data DATE NOT NULL
	);
CREATE INDEX Mensagem_index ON Mensagem(idEmissor,assunto,data);
ALTER TABLE public.Mensagem CLUSTER ON Mensagem_index;


CREATE TABLE Comentario(
	idComentario BIGSERIAL PRIMARY KEY,
	idUtilizador BIGINT REFERENCES Utilizador(idUtilizador),
	idLeilao BIGINT REFERENCES Leilao(idLeilao),
	assunto TEXT NOT NULL,
	texto TEXT,
	data DATE NOT NULL
	);
CREATE INDEX Comentario_index ON Comentario(idUtilizador,idLeilao,texto,data);
ALTER TABLE public.Comentario CLUSTER ON Comentario_index;


CREATE TABLE Administrador(
	idAdministrador BIGSERIAL NOT NULL REFERENCES Utilizador(idUtilizador),
	PRIMARY KEY(idAdministrador)
	);


CREATE TABLE Bloqueio(
	idBloqueio BIGSERIAL PRIMARY KEY,
	idAdministrador BIGINT REFERENCES Administrador(idAdministrador),
	dataInicio DATE NOT NULL,
	dataFim DATE NOT NULL
	);

CREATE TABLE BloqueioUtilizador(
	idBloqueio BIGINT REFERENCES Bloqueio(idBloqueio),
	idUtilizador BIGINT REFERENCES Utilizador(idUtilizador),
	PRIMARY KEY(idBloqueio)
	);


CREATE TABLE BloqueioComentario(
	idBloqueio BIGINT REFERENCES Bloqueio(idBloqueio),
	idComentario BIGINT REFERENCES Comentario(idComentario),
	PRIMARY KEY(idBloqueio)
	);


CREATE TABLE UtilizadorNormal(
	idUtilizadorNormal BIGSERIAL REFERENCES Utilizador(idUtilizador),
	PRIMARY KEY(idUtilizadorNormal)
	);



CREATE TABLE Licitacao(
	idLicitacao BIGSERIAL PRIMARY KEY,
	idLeilao BIGINT REFERENCES Leilao(idLeilao),
	idUtilizador BIGINT REFERENCES UtilizadorNormal(idUtilizadorNormal),
	preco MONEY NOT NULL,
	data DATE NOT NULL
	);
CREATE INDEX Licitacao_index ON Licitacao(preco,idLeilao,data);
ALTER TABLE public.Licitacao CLUSTER ON Licitacao_index;


CREATE TABLE AvaliacaoUtilizador(
	idAvaliador BIGINT REFERENCES UtilizadorNormal(idUtilizadorNormal),
	idAvaliado BIGINT REFERENCES UtilizadorNormal(idUtilizadorNormal),
	estrelas BIGINT NOT NULL,
	data DATE NOT NULL,
	PRIMARY KEY(idAvaliador, idAvaliado)
	);

CREATE TABLE AvaliacaoComentario(
	idAvaliador BIGINT REFERENCES UtilizadorNormal(idUtilizadorNormal),
	idComentario BIGINT REFERENCES Comentario(idComentario),
	gosto BIGINT NOT NULL,
	data DATE NOT NULL,
	PRIMARY KEY(idAvaliador, idComentario)
	);