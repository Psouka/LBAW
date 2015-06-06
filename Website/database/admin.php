<?php
//include_once ('../config/init.php');

function getUserAuctions($leiloesLimit,$leiloesStart,$iduser)
{

  global $conn;
  $stmt = $conn->prepare("
    SELECT leilao.*,
    (SELECT  max(preco) FROM licitacao WHERE licitacao.idleilao = leilao.idleilao) as licitacao,
    (SELECT  COUNT(*) FROM licitacao WHERE licitacao.idleilao = leilao.idleilao) as nrlicitacao   
    FROM leilao
    WHERE leilao.idleiloeiro = ?
    GROUP BY leilao.idleilao
    LIMIT ?
    OFFSET ?
    ");
  $stmt->execute(array($iduser,$leiloesLimit,$leiloesStart));

  return $stmt->fetchAll();
}


function blockComment($idComment){

global $conn;

 $conn->beginTransaction();
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

 return $conn->commit() == true;
}

function blockUser($idUser){
 global $conn;

 $conn->beginTransaction();
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

 return $conn->commit() == true;
}


function blockAuction($idAuction){

  global $conn;

 $conn->beginTransaction();
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

 return $conn->commit() == true;
}

?>