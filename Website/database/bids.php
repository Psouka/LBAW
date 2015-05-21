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

function createBid($idAuction,$preco)
{
   global $conn;
   $stmt = $conn->prepare
   ("
    INSERT INTO licitacao ( idleilao, idutilizador, preco, data)
    VALUES ( ?, ?, ?, ?)
    ");
   $currentdate = date("Y-m-d");

   $stmt->execute(array($idAuction,$_SESSION['userid'], $preco,$currentdate));

   $result = $stmt->fetch();
   return $result;
}
?>