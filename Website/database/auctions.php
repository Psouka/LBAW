<?php

function createAuction ($category, $title, $description, $startingBid, $buyout, $dataDePublicacao, $expirationDate)
{
    global $conn;
    $stmt = $conn->prepare
    ("
        INSERT INTO leilao (idleiloeiro, idcategoria, nome, descricao, precoinicial, precocompraimediata, datadepublicacao, datalimite)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        RETURNING idleilao
        ");
    $stmt->execute(array($_SESSION['userid'], $category, $title, $description, $startingBid, $buyout, $dataDePublicacao, $expirationDate));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row['idleilao'];
}

function addImageToAuction ($idleilao, $path)
{
    global $conn;
    $stmt = $conn->prepare
    ("
        INSERT INTO imagemleilao (idleilao, localizacao)
        VALUES (?, ?)
        ");
    $stmt->execute(array($idleilao, $path));
}

    // retorna array [leilao->idleilao, leilao->idleiloeiro, utilizador->nomeproprio, utilizador->rating, leilao->nome, leilao->descricao, licitacao->"lastbid/biggerbid", leilao->precocompraimediata, leilao->datapublicacao, leilao->datalimite]
function getAuctionById ($auctionid)
{
    global $conn;
    $stmt = $conn->prepare
    ("
        SELECT leilao.idleilao, leilao.idleiloeiro, utilizador.nomeproprio, leilao.nome, leilao.descricao, leilao.precoinicial, leilao.precocompraimediata, leilao.datadepublicacao, leilao.datalimite
        FROM leilao, utilizador
        WHERE leilao.idleilao = ? AND leilao.idleiloeiro = utilizador.idutilizador
        ");
    $stmt->execute(array($auctionid));
    $row = $stmt->fetch();
    return $row;
}

function getAuctions ()
{
    global $conn;
    $stmt = $conn->prepare
    ("
        SELECT *
        FROM leilao
        ");
    $stmt->execute();
    return $stmt->fetchAll ();
}

function createComment($idAuction,$textComment)
{

 global $conn;
 $stmt = $conn->prepare
 ("
    INSERT INTO comentario ( idutilizador, idleilao, texto, data)
    VALUES ( ?, ?, ?, ?)
    ");
 $currentdate = date("Y-m-d");

 $stmt->execute(array($_SESSION['userid'],$idAuction,$textComment,$currentdate));

 $result = $stmt->fetch();
 return $result;
}

function getComments($idAuction){
  global $conn;
  $stmt = $conn->prepare
  ("
  SELECT comentario.*, utilizador
  FROM comentario, utilizador
  WHERE idleilao = ? AND comentario.idutilizador = utilizador.idutilizador
     ");

  $stmt->execute(array($idAuction));

  return $result = $stmt->fetchAll();
}


function getImages($idAuction){
     global $conn;
  $stmt = $conn->prepare
  ("
  SELECT localizacao
  FROM imagemleilao
  WHERE idleilao = ?
     ");

  $stmt->execute(array($idAuction));

  return $result = $stmt->fetchAll();
}
?>
