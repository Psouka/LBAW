<?php
    function getBidsByAuctionId ($auctionid)
    {
        global $conn;
        $stmt = $conn->prepare
        ("
            SELECT *
            FROM licitacao
            WHERE idleilao = ?
        ");
        $stmt->execute(array($auctionid));
        return $stmt->fetchAll ();
    }
?>