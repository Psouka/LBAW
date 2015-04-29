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
?>