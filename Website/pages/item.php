<?php
    include_once ('../config/init.php');
    include_once ($BASE_DIR . 'database/categories.php');
    include_once ($BASE_DIR . 'database/auctions.php');
    include_once ($BASE_DIR . 'database/bids.php');

    $auctionid = $_GET['id'];

    $categories = getAllCategories ();
    $smarty->assign ('categories', $categories);

    $auction = getAuctionById ($auctionid);
    $smarty->assign ('auction', $auction);

    $bids = getBidsByAuctionId ($auctionid);
    $smarty->assign ('bids', $bids);

    $smarty->display ('auctions/item.tpl');
?>