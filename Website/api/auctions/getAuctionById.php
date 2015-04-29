<?php
    include_once('../../config/init.php');
    include_once ($BASE_DIR . 'database/auctions.php');

    $auction = getAuctionById ($_GET['id']);

    echo json_encode ($auction);
?>