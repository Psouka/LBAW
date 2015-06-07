<?php
//include_once ('../config/init.php');

function getUserAuctions($leiloesLimit,$leiloesStart,$iduser)
{

  global $conn;
  $stmt = $conn->prepare("
    SELECT leilao.*,
    (SELECT  max(preco) FROM licitacao WHERE licitacao.idleilao = leilao.idleilao) as licitacao,
    (SELECT  COUNT(*) FROM licitacao WHERE licitacao.idleilao = leilao.idleilao) as nrlicitacao,
    (SELECT  idbloqueio FROM bloqueioleilao WHERE leilao.idleilao = bloqueioleilao .idleilao) as bloqueio
    FROM leilao
    WHERE leilao.idleiloeiro = ?
    GROUP BY leilao.idleilao
    LIMIT ?
    OFFSET ?
    ");
  $stmt->execute(array($iduser,$leiloesLimit,$leiloesStart));

  return $stmt->fetchAll();
}


function checkBlockUser($idUser){
   global $conn;
  $stmt = $conn->prepare(" SELECT * FROM bloqueioutilizador WHERE idutilizador = ?");
  $stmt->execute(array($idUser));
  return $stmt->fetch();
}

function checkBlockAuction($idleilao){
   global $conn;
  $stmt = $conn->prepare(" SELECT * FROM bloqueioleilao WHERE idleilao = ?");
  $stmt->execute(array($idleilao));
  return $stmt->fetch();
}


function blockComment($idComment){

global $conn;

 $stmt = $conn->prepare("
  INSERT INTO bloqueio(idadministrador,datainicio)
  VALUES (?,?)
  RETURNING idbloqueio
  ");
 $datainicio = date('Y-m-d');
 $stmt->execute(array($USERID,$datainicio));
 $result = $stmt->fetch(PDO::FETCH_ASSOC);

 $stmt = $conn->prepare("
  INSERT INTO bloqueiocomentario(idbloqueio,idcomentario)
  VALUES (?,?)");
 $stmt->execute(array($result['idbloqueio'],$idComment));

}

function unlockComment($idComment){
  global $conn;

 $stmt = $conn->prepare("
  DELETE FROM bloqueiocomentario
  WHERE idcomentario = ?
  ");
  $stmt->execute(array($idComment));
}



function blockUser($idUser){
 global $conn;

 $stmt = $conn->prepare("
  INSERT INTO bloqueio(idadministrador,datainicio)
  VALUES (?,?)
  RETURNING idbloqueio
  ");
 $datainicio = date('Y-m-d');
 $stmt->execute(array($USERID,$datainicio));
 $result = $stmt->fetch(PDO::FETCH_ASSOC);

 $stmt = $conn->prepare("
  INSERT INTO bloqueioutilizador(idbloqueio,idutilizador)
  VALUES (?,?)");
 $stmt->execute(array($result['idbloqueio'],$idUser));

}

function unlockUser($idUser){
  global $conn;

 $stmt = $conn->prepare("
  DELETE FROM bloqueioutilizador
  WHERE idutilizador = ?
  ");
  $stmt->execute(array($idUser));

}


function blockAuction($idAuction){

  global $conn;

 $stmt = $conn->prepare("
  INSERT INTO bloqueio(idadministrador,datainicio)
  VALUES (?,?)
  RETURNING idbloqueio
  ");
 $datainicio = date('Y-m-d');
 $stmt->execute(array($USERID,$datainicio));
 $result = $stmt->fetch(PDO::FETCH_ASSOC);

 $stmt = $conn->prepare("
 INSERT INTO bloqueioleilao(idbloqueio,idleilao)
  VALUES (?,?)");
 $stmt->execute(array($result['idbloqueio'],$idAuction));

}

function unlockAuction($idAuction){
  global $conn;

 $stmt = $conn->prepare("
  DELETE FROM bloqueioleilao
  WHERE idleilao = ?
  ");
  $stmt->execute(array($idAuction));
}



function getCommentsAuction($idAuction){
  global $conn;
  $stmt = $conn->prepare
  ("
  SELECT comentario.*, utilizador, localizacao,
 (SELECT  idbloqueio FROM bloqueiocomentario WHERE comentario.idcomentario = bloqueiocomentario .idcomentario) as bloqueio
FROM comentario, utilizador, imagemutilizador
WHERE idleilao = ? AND comentario.idutilizador = utilizador.idutilizador AND imagemutilizador.idimagemutilizador = utilizador.idimagemperfil
     ");

  $stmt->execute(array($idAuction));

  return $result = $stmt->fetchAll();
}

?>