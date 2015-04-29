<?php
    include_once('../../config/init.php');
    include_once ($BASE_DIR . 'database/auctions.php');

    $auctions = getAuctions ();

    echo json_encode ($auctions);
?>