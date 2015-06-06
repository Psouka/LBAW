<?php

$conn = new PDO('pgsql:host=vdbm;dbname=lbaw1443', 'lbaw1443', 'kE380uh6'); //FIXED
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->exec('SET SCHEMA \'public\''); //FIXED


function cronAuction() {
    $outdated_auctions = getAuctionEnd();
    foreach ($outdated_auctions as $idAuction) {
        $idBid = getWinner($idAuction);
        addWinner($idAuction, $idBid);
    }
}

function getAuctionEnd()
{
    global $conn;
    $stmt = $conn->prepare
    ("
        SELECT idLeilao
        FROM 
        (
            SELECT idLeilao
                FROM Leilao
                WHERE Leilao.dataLimite <= CURRENT_TIMESTAMP
        ) AS OUTDATED_TABLE
        WHERE NOT EXISTS
        (
            SELECT LicitacaoVencedora.idLeilao
                FROM LicitacaoVencedora
                WHERE LicitacaoVencedora.idLeilao = OUTDATED_TABLE.idLeilao
        )
        ");
    $stmt->execute();
    return $stmt->fetchAll();
}

function getWinner($idAuction)
{
    global $conn;
    $stmt = $conn->prepare
    ("
        SELECT idLicitacao
        FROM Licitacao
        WHERE Licitacao.idLeilao = ?
        ORDER BY preco DESC
        LIMIT 1
        ");
    $stmt->execute(array($idAuction));
    return $stmt->fetch();
}

function addWinner($idAuction, $idBid)
{
    global $conn;
    $stmt = $conn->prepare
    ("
        INSERT INTO LicitacaoVencedora (idLicitacaoVencedora,idLeilao)
        VALUES (?, ?)
        ");
    $stmt->execute(array($idBid, $idAuction));
    return $stmt->fetch();
}

?>