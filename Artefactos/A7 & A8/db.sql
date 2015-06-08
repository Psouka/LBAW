DROP TABLE IF EXISTS Categoria CASCADE;
DROP TABLE IF EXISTS Pais CASCADE;
DROP TABLE IF EXISTS Cidade CASCADE;
DROP TABLE IF EXISTS Morada CASCADE;
DROP TABLE IF EXISTS Mensagem CASCADE;
DROP TABLE IF EXISTS ImagemUtilizador CASCADE;
DROP TABLE IF EXISTS ImagemLeilao CASCADE;
DROP TABLE IF EXISTS Comentario CASCADE;
DROP TABLE IF EXISTS Bloqueio CASCADE;
DROP TABLE IF EXISTS BloqueioUtilizador CASCADE;
DROP TABLE IF EXISTS BloqueioComentario CASCADE;
DROP TABLE IF EXISTS BloqueioLeilao CASCADE;
DROP TABLE IF EXISTS Utilizador CASCADE;
DROP TABLE IF EXISTS UtilizadorNormal CASCADE;
DROP TABLE IF EXISTS Administrador CASCADE;
DROP TABLE IF EXISTS Leilao CASCADE;
DROP TABLE IF EXISTS Licitacao CASCADE;
DROP TABLE IF EXISTS LicitacaoVencedora CASCADE;
DROP TABLE IF EXISTS AvaliacaoUtilizador CASCADE;
DROP TABLE IF EXISTS AvaliacaoComentario CASCADE;

CREATE TABLE Categoria(
	idCategoria BIGSERIAL PRIMARY KEY,
	tipo VARCHAR(20) UNIQUE NOT NULL
	);
CREATE INDEX Categoria_index ON public.Categoria USING btree(idCategoria ASC NULLS LAST);


CREATE TABLE Pais(
	idPais BIGSERIAL PRIMARY KEY,
	nome VARCHAR(20) UNIQUE NOT NULL
	);
CREATE INDEX Pais_index ON public.Pais USING btree(idPais ASC NULLS LAST);


CREATE TABLE Cidade(
	idCidade BIGSERIAL PRIMARY KEY,
	idPais BIGINT REFERENCES Pais(idPais),
	nome VARCHAR(20) NOT NULL,
	UNIQUE (idPais, idCidade)
	);
CREATE INDEX Cidade_index ON public.Cidade USING btree(idCidade ASC NULLS LAST, idPais ASC NULLS LAST);
ALTER TABLE public.Cidade CLUSTER ON Cidade_index;


CREATE TABLE Morada(
	idMorada BIGSERIAL PRIMARY KEY,
	idCidade BIGINT REFERENCES Cidade(idCidade),
	linha1 TEXT NOT NULL,
	linha2 TEXT NOT NULL,
	codPostal INTEGER NOT NULL
	);
CREATE INDEX Morada_index ON public.Morada USING btree(idMorada ASC NULLS LAST, idCidade ASC NULLS LAST);
ALTER TABLE public.Morada CLUSTER ON Morada_index;


CREATE TABLE ImagemUtilizador(
	idImagemUtilizador BIGSERIAL PRIMARY KEY,
	localizacao VARCHAR(30) UNIQUE NOT NULL,
	nome VARCHAR(20) NOT NULL
	);
CREATE INDEX ImagemUtilizador_index ON public.ImagemUtilizador USING btree(idImagemUtilizador ASC NULLS LAST);


CREATE TABLE Utilizador(
	idUtilizador BIGSERIAL PRIMARY KEY,
	utilizador VARCHAR(20) UNIQUE NOT NULL,
	saltpasse  VARCHAR(100) NOT NULL,
	palavrapasse VARCHAR(100) NOT NULL,
	nomeProprio VARCHAR(20) NOT NULL,
	sobrenome VARCHAR(20) NOT NULL,
	genero VARCHAR(9) NOT NULL,
	descricao TEXT,
	email VARCHAR(30) UNIQUE NOT NULL,
	telefone INTEGER NOT NULL,
	dataNascimento DATE NOT NULL,
	dataRegisto DATE NOT NULL,
	idImagemPerfil BIGINT REFERENCES ImagemUtilizador(idImagemUtilizador),
	idImagemCapa BIGINT REFERENCES ImagemUtilizador(idImagemUtilizador),
	idMorada BIGINT REFERENCES Morada(idMorada),
	idShip BIGINT REFERENCES Morada(idMorada)
	CHECK ( age(dataNascimento) >= interval '18' year)
	);
CREATE INDEX utilizador_gin_index ON public.Utilizador USING GIN(to_tsvector('english', nomeProprio || ' ' || sobrenome));
CREATE INDEX Utilizador_index ON public.Utilizador USING btree(idUtilizador ASC NULLS LAST,idImagemPerfil ASC NULLS LAST,idImagemCapa ASC NULLS LAST);
ALTER TABLE public.Utilizador CLUSTER ON Utilizador_index;


CREATE TABLE Administrador(
	idAdministrador BIGSERIAL NOT NULL REFERENCES Utilizador(idUtilizador),
	PRIMARY KEY(idAdministrador)
	);
CREATE INDEX Administrador_index ON public.Administrador USING btree(idAdministrador ASC NULLS LAST);
ALTER TABLE public.Administrador CLUSTER ON Administrador_index;


CREATE TABLE UtilizadorNormal(
	idUtilizadorNormal BIGSERIAL REFERENCES Utilizador(idUtilizador),
	PRIMARY KEY(idUtilizadorNormal)
	);
CREATE INDEX UtilizadorNormal_index ON public.UtilizadorNormal USING btree(idUtilizadorNormal ASC NULLS LAST);
ALTER TABLE public.UtilizadorNormal CLUSTER ON UtilizadorNormal_index;


CREATE TABLE Leilao(
	idLeilao BIGSERIAL PRIMARY KEY,
	idLeiloeiro BIGINT REFERENCES UtilizadorNormal(idUtilizadorNormal),
	idCategoria BIGINT REFERENCES Categoria(idCategoria),
	nome VARCHAR(20) NOT NULL,
	descricao TEXT NOT NULL,
	precoInicial DECIMAL NOT NULL,
	precoCompraImediata DECIMAL,
	dataDePublicacao TIMESTAMP NOT NULL,
	dataLimite TIMESTAMP NOT NULL,
	CHECK (dataLimite > dataDePublicacao)
	);
CREATE INDEX leilao_gin_index ON public.Leilao USING GIN(to_tsvector('english', nome));
ALTER TABLE Leilao ADD COLUMN leilao_gin_index tsvector;
UPDATE Leilao SET leilao_gin_index = to_tsvector('english', nome);
CREATE INDEX Leilao_index ON public.Leilao USING btree(idLeilao ASC NULLS LAST);


CREATE TABLE Licitacao(
	idLicitacao BIGSERIAL PRIMARY KEY,
	idLeilao BIGINT REFERENCES Leilao(idLeilao),
	idUtilizador BIGINT REFERENCES UtilizadorNormal(idUtilizadorNormal),
	preco DECIMAL NOT NULL,
	data DATE NOT NULL
	);
CREATE INDEX Licitacao_index ON public.Licitacao USING btree(idLicitacao ASC NULLS LAST,idLeilao ASC NULLS LAST,idUtilizador ASC NULLS LAST);
ALTER TABLE public.Licitacao CLUSTER ON Licitacao_index;


CREATE TABLE LicitacaoVencedora(
	idLicitacaoVencedora BIGSERIAL REFERENCES Licitacao(idLicitacao),
	idLeilao BIGINT REFERENCES Leilao(idLeilao)
	);
CREATE INDEX LicitacaoVencedora_index ON public.LicitacaoVencedora USING btree(idLicitacaoVencedora ASC NULLS LAST);


CREATE TABLE ImagemLeilao(
	idImagemLeilao BIGSERIAL PRIMARY KEY,
	idLeilao BIGINT REFERENCES Leilao(idLeilao),
	localizacao VARCHAR(30) UNIQUE NOT NULL,
	nome VARCHAR(20) NOT NULL
	);
CREATE INDEX ImagemLeilao_index ON public.ImagemLeilao USING btree(idImagemLeilao ASC NULLS LAST,idLeilao ASC NULLS LAST);
ALTER TABLE public.ImagemLeilao CLUSTER ON ImagemLeilao_index;

CREATE TABLE Mensagem(
	idMensagem BIGSERIAL PRIMARY KEY,
	idEmissor BIGINT REFERENCES Utilizador(idUtilizador),
	idReceptor BIGINT REFERENCES Utilizador(idUtilizador),
	assunto TEXT NOT NULL,
	texto TEXT,
	data DATE NOT NULL
	);
CREATE INDEX Mensagem_index ON public.Mensagem USING btree(idMensagem ASC NULLS LAST,idEmissor ASC NULLS LAST,idReceptor ASC NULLS LAST);
ALTER TABLE public.Mensagem CLUSTER ON Mensagem_index;


CREATE TABLE Comentario(
	idComentario BIGSERIAL PRIMARY KEY,
	idUtilizador BIGINT REFERENCES Utilizador(idUtilizador),
	idLeilao BIGINT REFERENCES Leilao(idLeilao),
	texto TEXT CHECK (length(texto) < 300),
	data DATE NOT NULL
	);
CREATE INDEX Comentario_index ON public.Comentario USING btree(idComentario ASC NULLS LAST,idUtilizador ASC NULLS LAST,idLeilao ASC NULLS LAST);
ALTER TABLE public.Comentario CLUSTER ON Comentario_index;


CREATE TABLE Bloqueio(
	idBloqueio BIGSERIAL PRIMARY KEY,
	idAdministrador BIGINT REFERENCES Administrador(idAdministrador),
	dataInicio DATE NOT NULL
	);
CREATE INDEX Bloqueio_index ON public.Bloqueio USING btree(idBloqueio ASC NULLS LAST,idAdministrador ASC NULLS LAST);
ALTER TABLE public.Bloqueio CLUSTER ON Bloqueio_index;


CREATE TABLE BloqueioUtilizador(
	idBloqueio BIGINT REFERENCES Bloqueio(idBloqueio),
	idUtilizador BIGINT REFERENCES Utilizador(idUtilizador),
	PRIMARY KEY(idBloqueio)
	);
CREATE INDEX BloqueioUtilizador_index ON public.BloqueioUtilizador USING btree(idBloqueio ASC NULLS LAST,idUtilizador ASC NULLS LAST);
ALTER TABLE public.BloqueioUtilizador CLUSTER ON BloqueioUtilizador_index;


CREATE TABLE BloqueioComentario(
	idBloqueio BIGINT REFERENCES Bloqueio(idBloqueio),
	idComentario BIGINT REFERENCES Comentario(idComentario),
	PRIMARY KEY(idBloqueio)
	);
CREATE INDEX BloqueioComentario_index ON public.BloqueioComentario USING btree(idBloqueio ASC NULLS LAST,idComentario ASC NULLS LAST);
ALTER TABLE public.BloqueioComentario CLUSTER ON BloqueioComentario_index;


CREATE TABLE BloqueioLeilao(
	idBloqueio BIGINT REFERENCES Bloqueio(idBloqueio),
	idLeilao BIGINT REFERENCES Leilao(idLeilao),
	PRIMARY KEY(idBloqueio)
	);
CREATE INDEX BloqueioLeilao_index ON public.BloqueioLeilao USING btree(idBloqueio ASC NULLS LAST,idLeilao ASC NULLS LAST);
ALTER TABLE public.BloqueioLeilao CLUSTER ON BloqueioLeilao_index;


CREATE TABLE AvaliacaoUtilizador(
	idAvaliador BIGINT REFERENCES UtilizadorNormal(idUtilizadorNormal),
	idAvaliado BIGINT REFERENCES UtilizadorNormal(idUtilizadorNormal),
	idLicitacaoVencedora BIGINT REFERENCES LicitacaoVencedora(idLicitacaoVencedora),
	estrelas BIGINT,
	texto TEXT,
	data DATE NOT NULL,
	PRIMARY KEY(idAvaliador, idAvaliado, idLicitacaoVencedora),
	CHECK (idAvaliador != idAvaliado)
	);
CREATE INDEX AvaliacaoUtilizador_index ON public.AvaliacaoUtilizador USING btree(idAvaliador ASC NULLS LAST,idAvaliado ASC NULLS LAST);
ALTER TABLE public.AvaliacaoUtilizador CLUSTER ON AvaliacaoUtilizador_index;

CREATE TABLE AvaliacaoComentario(
	idAvaliador BIGINT REFERENCES UtilizadorNormal(idUtilizadorNormal),
	idComentario BIGINT REFERENCES Comentario(idComentario),
	gosto BIGINT NOT NULL,
	data DATE NOT NULL,
	PRIMARY KEY(idAvaliador, idComentario)
	);
CREATE INDEX AvaliacaoComentario_index ON public.AvaliacaoComentario USING btree(idAvaliador ASC NULLS LAST,idComentario ASC NULLS LAST);
ALTER TABLE public.AvaliacaoComentario CLUSTER ON AvaliacaoComentario_index;
