<?php
    function getAuctionById ($auctionid)
    {
        global $conn;
        $stmt = $conn->prepare
        ("
            SELECT *
            FROM leilao
            WHERE idleilao = ?
        ");
        $stmt->execute(array($auctionid));
        $row = $stmt->fetch();
        return $row;
    }
?>