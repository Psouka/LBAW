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
    SELECT leilao.idleilao, leilao.idleiloeiro, utilizador.nomeproprio, leilao.nome, leilao.descricao, leilao.precoinicial, leilao.precocompraimediata, leilao.datadepublicacao, leilao.datalimite,
    (SELECT AVG(estrelas) FROM avaliacaoutilizador WHERE idleiloeiro = avaliacaoutilizador.idavaliado) as estrelas
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
    SELECT comentario.*, utilizador, localizacao
    FROM comentario, utilizador, imagemutilizador
    WHERE idleilao = ? AND comentario.idutilizador = utilizador.idutilizador AND imagemutilizador.idimagemutilizador = utilizador.idimagemperfil
    AND NOT EXISTS (SELECT bloqueiocomentario.* 
     FROM  bloqueiocomentario
     WHERE  bloqueiocomentario.idcomentario = comentario.idcomentario)
  AND NOT EXISTS (SELECT bloqueioutilizador.* 
   FROM  bloqueioutilizador
   WHERE  bloqueioutilizador.idutilizador = comentario.idutilizador)
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

/*
function searchAuctions($searchtext)
{
  global $conn;
  $stmt = $conn->prepare
  ("
    SELECT *, categoria.tipo as nomecategoria, imagemleilao.localizacao as imgpath, utilizador.nomeproprio as nomeleiloeiro
    FROM
    (
      SELECT leilao.*, max(licitacao.preco) as topbid
      FROM leilao LEFT JOIN licitacao USING(idleilao)
      GROUP BY leilao.idleilao
      ) as leilao
  , categoria, imagemleilao, utilizador
  WHERE
  (
    leilao.nome @@to_tsquery(?) OR
    leilao.descricao @@to_tsquery(?) OR
    utilizador.nomeproprio @@to_tsquery(?) OR
    utilizador.sobrenome @@to_tsquery(?)
    )
  AND imagemleilao.idleilao = leilao.idleilao
  AND categoria.idcategoria = leilao.idcategoria
  AND leilao.idleiloeiro = utilizador.idutilizador
  ");
  $stmt->execute(array($searchtext, $searchtext, $searchtext, $searchtext));
  return $result = $stmt->fetchAll();
}
*/


function searchAllAuctions($searchtext)
{
    global $conn;
  $stmt = $conn->prepare
  ("
    SELECT leilao.*, categoria.tipo, localizacao, nomeproprio,
    (SELECT MAX(preco) FROM licitacao WHERE licitacao.idleilao = leilao.idleilao) as bid
    FROM categoria, imagemleilao, utilizador, leilao
  WHERE
  (
    leilao.nome @@to_tsquery(?) OR
    leilao.descricao @@to_tsquery(?)
    )
  AND imagemleilao.idleilao = leilao.idleilao
  AND categoria.idcategoria = leilao.idcategoria
  AND leilao.idleiloeiro = utilizador.idutilizador
  ");
  $stmt->execute(array($searchtext, $searchtext));
  return $result = $stmt->fetchAll();
}

function searchAuctionsTextCat($searchtext,$categoria)
{
    global $conn;
  $stmt = $conn->prepare
  ("
    SELECT leilao.*, categoria.tipo, localizacao, nomeproprio,
    (SELECT MAX(preco) FROM licitacao WHERE licitacao.idleilao = leilao.idleilao) as bid
    FROM categoria, imagemleilao, utilizador, leilao
  WHERE
  (
    leilao.nome @@to_tsquery(?) OR
    leilao.descricao @@to_tsquery(?)
    )
  AND imagemleilao.idleilao = leilao.idleilao
  AND categoria.idcategoria = ?
  AND leilao.idcategoria = categoria.idcategoria
  AND leilao.idleiloeiro = utilizador.idutilizador
  ");
  $stmt->execute(array($searchtext, $searchtext,$categoria));
  return $result = $stmt->fetchAll();
}

function searchAuctionsCat($categoria)
{
    global $conn;
  $stmt = $conn->prepare
  ("
    SELECT leilao.*, categoria.tipo, localizacao, nomeproprio,
    (SELECT MAX(preco) FROM licitacao WHERE licitacao.idleilao = leilao.idleilao) as bid
    FROM categoria, imagemleilao, utilizador, leilao
  WHERE imagemleilao.idleilao = leilao.idleilao
  AND categoria.idcategoria = ?
  AND leilao.idcategoria = categoria.idcategoria
  AND leilao.idleiloeiro = utilizador.idutilizador
  ");
  $stmt->execute(array($categoria));
  return $result = $stmt->fetchAll();
}
?>
