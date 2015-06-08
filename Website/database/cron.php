<?php

$conn = new PDO('pgsql:host=vdbm;dbname=lbaw1443', 'lbaw1443', 'kE380uh6'); //FIXED
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->exec('SET SCHEMA \'public\''); //FIXED


function cronAuction() {
    $outdated_auctions = getAuctionEnd();
    foreach ($outdated_auctions as $auction) {
        $licitacao = getWinner($auction['idleilao']);
        if(!$licitacao)
            continue;
        addWinner($auction['idleilao'], $licitacao['idlicitacao']);
        addReview($licitacao['idutilizador'], $auction['idleiloeiro'], $licitacao['idlicitacao']);
    }
}

function getAuctionEnd()
{
    global $conn;
    $stmt = $conn->prepare
    ("
        SELECT idleilao, idleiloeiro
        FROM 
        (
            SELECT idleilao, idleiloeiro
                FROM leilao
                WHERE leilao.datalimite <= CURRENT_TIMESTAMP
        ) AS outdated_table
        WHERE NOT EXISTS
        (
            SELECT licitacaovencedora.idleilao
                FROM licitacaovencedora
                WHERE licitacaovencedora.idleilao = outdated_table.idleilao
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
        SELECT idlicitacao, idutilizador
        FROM licitacao
        WHERE licitacao.idleilao = ?
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
        INSERT INTO licitacaovencedora (idlicitacaovencedora,idleilao)
        VALUES (?, ?)
        ");
    $stmt->execute(array($idBid, $idAuction));
    return $stmt->fetch();
}

function addReview($idAvaliador, $idAvaliado, $idLicitacaoVencedora)
{
    global $conn;
    $stmt = $conn->prepare
    ("
        INSERT INTO avaliacaoutilizador(idavaliador, idavaliado, idlicitacaovencedora, data)
        VALUES (?, ?, ?, CURRENT_TIMESTAMP)
        ");
    $stmt->execute(array($idAvaliador, $idAvaliado, $idLicitacaoVencedora));
    $stmt = $conn->prepare
    ("
        INSERT INTO avaliacaoutilizador(idavaliador, idavaliado, idlicitacaovencedora, data)
        VALUES (?, ?, ?, CURRENT_TIMESTAMP)
        ");
    $stmt->execute(array($idAvaliado, $idAvaliador, $idLicitacaoVencedora));
}

cronAuction();
?>