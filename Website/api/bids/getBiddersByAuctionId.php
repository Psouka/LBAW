<?php
    include_once('../../config/init.php');
    include_once ($BASE_DIR . 'database/bids.php');

    $bidders = getBiddersByAuctionId ($_GET['id']);

    echo json_encode ($bidders);
?>