--- Generalizações ---

CREATE  OR REPLACE FUNCTION check_utilizador_normal()
  RETURNS TRIGGER AS $check_utilizador_normal$
BEGIN
  IF EXISTS 
  (SELECT idAdministrador FROM Administrador
  WHERE NEW.idUtilizadorNormal = Administrador.idAdministrador
  LIMIT 1)
  THEN
    RAISE EXCEPTION 'Utilizador já é Administrador não pode ser UtilizadorNormal';
    RETURN NULL;
  END IF;
  RETURN NEW;
END;
$check_utilizador_normal$ LANGUAGE plpgsql;

CREATE TRIGGER check_utilizador_normal
  BEFORE INSERT ON UtilizadorNormal
  FOR EACH ROW
  EXECUTE PROCEDURE check_utilizador_normal();


  CREATE  OR REPLACE FUNCTION check_administrador()
  RETURNS TRIGGER AS $check_administrador$
BEGIN
  IF EXISTS 
  (SELECT idUtilizadorNormal FROM UtilizadorNormal
  WHERE NEW.idAdministrador = UtilizadorNormal.idUtilizadorNormal
  LIMIT 1 )
  THEN
    RAISE EXCEPTION 'Utilizador já é UtilizadorNormal não pode ser Administrador';
    RETURN NULL;
  END IF;
  RETURN NEW;
END;
$check_administrador$ LANGUAGE plpgsql;

CREATE TRIGGER check_administrador
  BEFORE INSERT ON Administrador
  FOR EACH ROW
  EXECUTE PROCEDURE check_administrador();


CREATE  OR REPLACE FUNCTION check_bloqueio()
  RETURNS TRIGGER AS $check_bloqueio$
BEGIN
  IF EXISTS 
  (SELECT NEW.idBloqueio FROM BloqueioUtilizador
  WHERE NEW.idBloqueio = BloqueioUtilizador.idBloqueio
  LIMIT 1)
  THEN
    RAISE EXCEPTION 'Bloqueio nao pode ser de dois tipos';
    RETURN NULL;
  END IF;
  RETURN NEW;
END;
$check_bloqueio$ LANGUAGE plpgsql;

CREATE TRIGGER check_bloqueio_utilizador
  BEFORE INSERT ON BloqueioUtilizador
  FOR EACH ROW
  EXECUTE PROCEDURE check_bloqueio();

  CREATE TRIGGER check_bloqueio_leilao
  BEFORE INSERT ON BloqueioLeilao
  FOR EACH ROW
  EXECUTE PROCEDURE check_bloqueio();

  CREATE TRIGGER check_bloqueio_comentario
  BEFORE INSERT ON BloqueioComentario
  FOR EACH ROW
  EXECUTE PROCEDURE check_bloqueio();


--- Prolongar ---

  CREATE  OR REPLACE FUNCTION prolong()
  RETURNS TRIGGER AS $prolong$
BEGIN
    UPDATE Leilao
    SET dataLimite = dataLimite + interval '1 hour'
    WHERE NEW.idLeilao = Leilao.idLeilao 
    AND NEW.data > (dataLimite - interval '5 minutes')
    AND NEW.data < dataLimite; 
    RETURN NEW;
END;
$prolong$
  LANGUAGE plpgsql;
 
CREATE TRIGGER prolong_leilao  
  AFTER INSERT ON Licitacao  
  FOR EACH ROW  
  EXECUTE PROCEDURE prolong();


--- So um bloqueio ativo ---

CREATE  OR REPLACE FUNCTION check_bloqueio_ativo()
  RETURNS TRIGGER AS $check_bloqueio_ativo$
BEGIN 
   IF EXISTS 
  (SELECT Bloqueio.idBloqueio FROM BloqueioUtilizador, Bloqueio
    WHERE NEW.idUtilizador = BloqueioUtilizador.idUtilizador
    AND Bloqueio.idBloqueio = BloqueioUtilizador.idBloqueio
    AND Bloqueio.dataFim > (SELECT dataInicio FROM Bloqueio WHERE NEW.idBloqueio = Bloqueio.idBloqueio)
  )
  THEN 
     RAISE EXCEPTION 'Utilizador ja possui um bloqueio ativo';
     RETURN NULL;
  END IF;
  RETURN NEW;
END;
$check_bloqueio_ativo$ LANGUAGE plpgsql;

CREATE TRIGGER check_bloqueio_ativo
  BEFORE INSERT ON BloqueioUtilizador
  FOR EACH ROW  
  EXECUTE PROCEDURE check_bloqueio_ativo();

--- Leiloeiro nao pode licitar no seu proprio leilao ---

CREATE  OR REPLACE FUNCTION check_auto_licitacao()
RETURNS TRIGGER AS $check_auto_licitacao$
BEGIN
  IF EXISTS
  (SELECT Licitacao.idLicitacao FROM Licitacao, Leilao
  WHERE NEW.idLeilao = Leilao.idLeilao
  AND Leilao.idLeiloeiro = NEW.idUtilizador
  LIMIT 1)
  THEN 
     RAISE EXCEPTION 'Utilizador nao pode licitar no seu proprio leilao';
     RETURN NULL;
  END IF;
  RETURN NEW;
END;
$check_auto_licitacao$ LANGUAGE plpgsql;

CREATE TRIGGER check_auto_licitacao
  BEFORE INSERT ON Licitacao
  FOR EACH ROW
  EXECUTE PROCEDURE check_auto_licitacao();
