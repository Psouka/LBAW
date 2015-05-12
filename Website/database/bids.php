<?php
function getBiddersByAuctionId ($auctionid)
{
    global $conn;
    $stmt = $conn->prepare
    ("
        SELECT licitacao.idutilizador, utilizador.nomeproprio, licitacao.preco
        FROM licitacao, utilizador
        WHERE licitacao.idleilao = ? AND utilizador.idutilizador = licitacao.idutilizador
        ");
    $stmt->execute(array($auctionid));
    return $stmt->fetchAll ();
}

function createBid($idAuction,$idBidder,$idUtilizador,$preco)
{
   global $conn;
   $stmt = $conn->prepare
   ("
    INSERT INTO licitacao ( idleilao, idutilizador, preco, data)
    VALUES ( ?, ?, ?, ?)
    RETURNING idliciacao
    ");
   $currentdate = date("Y-m-d");
   $stmt->execute(array($idAuction,$idBidder, $preco,$currentdate));

   $result = $stmt->fetchAll();
   return $result;
}
?>