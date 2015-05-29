<?php
include_once ('../config/init.php');
include_once ($BASE_DIR . 'database/categories.php');
include_once ($BASE_DIR . 'database/auctions.php');
include_once ($BASE_DIR . 'database/bids.php');

$auctionid = $_GET['id'];
$auction = getAuctionById ($auctionid);

if ($auction)
{
  $categories = getAllCategories ();
  $smarty->assign ('categories', $categories);

  $smarty->assign ('auction', $auction);
  $bidders = getBiddersByAuctionId ($auctionid);

  $itemPrice = $auction['precoinicial'];
  foreach ($bidders as $bidd) {
    if($bidd['preco'] > $itemPrice)
    $itemPrice = $bidd['preco'];
  }

  $comments = getComments($auctionid);

  $array = array();
  $i = 0;
  foreach ($comments as $com) {
    $com['line'] = $i % 2;
    $i++;
    $array[] = $com;
  }

  $comments = $array;

  $smarty->assign ('comments', $comments);

  $images = getImages($auctionid);

  $firstImage = $images[0];
  unset($images[0]);
  $smarty->assign ('images', $images);
  $smarty->assign ('firstImage', $firstImage);

  $smarty->assign ('itemPrice', $itemPrice);

  $smarty->assign ('bidders', $bidders);
  $smarty->assign('TITLE', 'Auction: ' . $auction['nome']);
  $smarty->display ('admin/admin-item.tpl');
}
else
{
  header ('Location: ' . $BASE_URL . 'pages/404.php');
}
?>