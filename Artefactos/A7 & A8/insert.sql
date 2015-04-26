--Categorias


INSERT INTO Categoria(tipo)
VALUES('Desporto');

INSERT INTO Categoria(tipo)
VALUES('Agricula');

INSERT INTO Categoria(tipo)
VALUES('Telecomunicações');

INSERT INTO Categoria(tipo)
VALUES('AudioVisual');

INSERT INTO Categoria(tipo)
VALUES('Outros');


-- Paises
INSERT INTO Pais(nome)
VALUES('Portugal');

INSERT INTO Pais(nome)
VALUES('Espanha');

INSERT INTO Pais(nome)
VALUES('França');

INSERT INTO Pais(nome)
VALUES('Holanda');

INSERT INTO Pais(nome)
VALUES('Alemanha');

INSERT INTO Pais(nome)
VALUES('Italia');


--Cidades

INSERT INTO Cidade(idPais,nome)
VALUES(1,'Lisboa');

INSERT INTO Cidade(idPais,nome)
VALUES(1,'Porto');

INSERT INTO Cidade(idPais,nome)
VALUES(1,'Faro');

INSERT INTO Cidade(idPais,nome)
VALUES(3,'Paris');

INSERT INTO Cidade(idPais,nome)
VALUES(2,'Madrid');

-- Moradas


INSERT INTO Morada(idCidade,linha1,linha2,codPostal)
VALUES(2,'Rua teste1 Porta: 9999','Rua teste2 Porta: 8888',4444333);


INSERT INTO Morada(idCidade,linha1,linha2,codPostal)
VALUES(2,'Rua teste3 Porta: 2002','Rua teste4 Porta: 2003',4444333);


INSERT INTO Morada(idCidade,linha1,linha2,codPostal)
VALUES(2,'Rua teste8 Porta: 2003','Rua teste2 Porta: 2004',4444333);


INSERT INTO Morada(idCidade,linha1,linha2,codPostal)
VALUES(2,'Rua teste7 Porta: 9999','Rua teste6 Porta: 8888',4222333);

--ImagemUtilizador

INSERT INTO ImagemUtilizador(localizacao,nome)
VALUES('/imagesRecebidas/teste.png','teste');


INSERT INTO ImagemUtilizador(localizacao,nome)
VALUES('/imagesRecebidas/teste2.png','teste2');


INSERT INTO ImagemUtilizador(localizacao,nome)
VALUES('/imagesRecebidas/teste4.png','teste4');


INSERT INTO ImagemUtilizador(localizacao,nome)
VALUES('/imagesRecebidas/teste3.png','teste3');


INSERT INTO ImagemUtilizador(localizacao,nome)
VALUES('/imagesRecebidas/teste5.png','teste5');


-- Utilizador

INSERT INTO Utilizador(utilizador,palavrapasse,nomeProprio,sobrenome,genero, descricao,email,telefone,dataNascimento,dataRegisto,idImagemPerfil,idImagemCapa)
VALUES('username1','ashe1','primeiroNome1','UltimoNome2','M','descricao1','user1@user.com',912223344,'12/03/1954','12/03/2015',1,1);

INSERT INTO Utilizador(utilizador,palavrapasse,nomeProprio,sobrenome,genero, descricao,email,telefone,dataNascimento,dataRegisto,idImagemPerfil,idImagemCapa)
VALUES('username0','ashe2','primeiroNome4','UltimoNome3','M','descricao2','user2@user.com',912221344,'12/04/1975','12/03/2015',1,1);


INSERT INTO Utilizador(utilizador,palavrapasse,nomeProprio,sobrenome,genero, descricao,email,telefone,dataNascimento,dataRegisto,idImagemPerfil,idImagemCapa)
VALUES('username2','ashe3','primeiroNome3','UltimoNome4','F','descricao3','user3@user.com',912312344,'12/04/1920','12/03/2014',4,4);


--Mensagem
INSERT INTO Mensagem(idEmissor,idReceptor,assunto,texto,data)
VALUES(1,2,'assunto importante 1','texto1','12/01/2015');

INSERT INTO Mensagem(idEmissor,idReceptor,assunto,texto,data)
VALUES(2,1,'assunto importante 2','texto2','12/02/2015');

INSERT INTO Mensagem(idEmissor,idReceptor,assunto,texto,data)
VALUES(3,3,'assunto importante 3','texto3','12/03/2015');

INSERT INTO Mensagem(idEmissor,idReceptor,assunto,texto,data)
VALUES(2,1,'assunto importante 1','texto respondido a 1','12/04/2015');


--Admistrador

INSERT INTO Administrador(idAdministrador)
VALUES(1);


-- Utilizador Normal

INSERT INTO UtilizadorNormal(idUtilizadorNormal)
VALUES(2);


INSERT INTO UtilizadorNormal(idUtilizadorNormal)
VALUES(3);

-- Leilao


INSERT INTO Leilao(idLeiloeiro,nome,descricao,precoInicial,precoCompraImediata,dataDePublicacao,dataLimite)
VALUES(2,'leilao1','leilao teste nr 1',99.99,100,'2004-10-19 10:23:54','2005-10-19 10:23:54'); -- completar data

INSERT INTO Leilao(idLeiloeiro,nome,descricao,precoInicial,precoCompraImediata,dataDePublicacao,dataLimite)
VALUES(2,'leilao2','leilao teste nr 2',99.92,102,'2004-10-19 19:23:54','2005-10-19 20:23:54'); 

INSERT INTO Leilao(idLeiloeiro,nome,descricao,precoInicial,precoCompraImediata,dataDePublicacao,dataLimite)
VALUES(2,'leilao3','leilao teste nr 3',99.00,101,'2002-10-19 10:23:54','2004-10-19 10:23:54'); 


INSERT INTO Leilao(idLeiloeiro,nome,descricao,precoInicial,precoCompraImediata,dataDePublicacao,dataLimite)
VALUES(2,'leilao4','leilao teste nr 4',99.22,1003,'2002-10-19 10:20:54','2004-10-19 10:20:54'); 


INSERT INTO Leilao(idLeiloeiro,nome,descricao,precoInicial,precoCompraImediata,dataDePublicacao,dataLimite)
VALUES(3,'leilao2','leilao teste nr 2',99.11,1099,'2002-10-19 10:23:59','2004-10-19 10:23:59'); 


-- Imagem Leilao

INSERT INTO ImagemLeilao(idLeilao,localizacao,nome)
VALUES(2,'/imagesLeiloes/teste.png','imagemLeilao2');


INSERT INTO ImagemLeilao(idLeilao,localizacao,nome)
VALUES(3,'/imagesLeiloes/teste2.png','imagemLeilao3');


INSERT INTO ImagemLeilao(idLeilao,localizacao,nome)
VALUES(4,'/imagesLeiloes/teste3.png','imagemLeilao4');


INSERT INTO ImagemLeilao(idLeilao,localizacao,nome)
VALUES(5,'/imagesLeiloes/teste4.png','imagemLeilao5');


-- Licitacao

INSERT INTO Licitacao(idLeilao,idUtilizador,preco,data)
VALUES(1,2,99.99,'14/03/2015');


INSERT INTO Licitacao(idLeilao,idUtilizador,preco,data)
VALUES(1,2,100,'15/03/2015');


INSERT INTO Licitacao(idLeilao,idUtilizador,preco,data)
VALUES(1,3,102,'16/03/2015');


INSERT INTO Licitacao(idLeilao,idUtilizador,preco,data)
VALUES(1,3,102,'17/04/2015');


-- Comentario

INSERT INTO Comentario(idUtilizador,idLeilao,assunto,texto,data)
VALUES(1,2,'alerta1','texto sobre alerta','12/01/2015');

INSERT INTO Comentario(idUtilizador,idLeilao,assunto,texto,data)
VALUES(1,2,'alerta2','texto sobre alerta 2','12/02/2015');


INSERT INTO Comentario(idUtilizador,idLeilao,assunto,texto,data)
VALUES(3,1,'alerta1','texto sobre alerta','12/03/2015');


INSERT INTO Comentario(idUtilizador,idLeilao,assunto,texto,data)
VALUES(2,2,'alerta0','texto sobre alerta','12/04/2015');

--Bloqueio

INSERT INTO Bloqueio(idAdministrador,dataInicio,dataFim)
VALUES(1,'12/03/2015','13/03/2015');

INSERT INTO Bloqueio(idAdministrador,dataInicio,dataFim)
VALUES(1,'13/03/2015','14/03/2015');

INSERT INTO Bloqueio(idAdministrador,dataInicio,dataFim)
VALUES(1,'14/03/2015','15/03/2015');


-- BloqueioUtilizador

INSERT INTO BloqueioUtilizador(idBloqueio,idUtilizador)
VALUES(1,2);

INSERT INTO BloqueioUtilizador(idBloqueio,idUtilizador)
VALUES(2,3);


--Bloqueio Comentario

INSERT INTO BloqueioComentario(idBloqueio, idComentario)
VALUES(3,1);


--Avaliacao do Utilizador

INSERT INTO AvaliacaoUtilizador(idAvaliador,idAvaliado,estrelas,data)
VALUES(3,2,3,'14/03/2015');

INSERT INTO AvaliacaoUtilizador(idAvaliador,idAvaliado,estrelas,data)
VALUES(2,3,5,'15/03/2015');


-- AvaliacaoComentario

INSERT INTO AvaliacaoComentario(idAvaliador,idComentario,gosto,data)
VALUES(2,1,1,'14/03/2015');

INSERT INTO AvaliacaoComentario(idAvaliador,idComentario,gosto,data)
VALUES(3,1,1,'14/03/2015');


INSERT INTO AvaliacaoComentario(idAvaliador,idComentario,gosto,data)
VALUES(3,2,0,'15/03/2015');


SELECT * FROM Categoria;
SELECT * FROM Pais;
SELECT * FROM Cidade;
SELECT * FROM Morada;
SELECT * FROM Mensagem;
SELECT * FROM ImagemUtilizador;
SELECT * FROM ImagemLeilao;
SELECT * FROM Comentario;
SELECT * FROM Bloqueio;
SELECT * FROM BloqueioUtilizador;
SELECT * FROM BloqueioComentario;
SELECT * FROM Utilizador;
SELECT * FROM UtilizadorNormal;
SELECT * FROM Leilao;
SELECT * FROM Licitacao;