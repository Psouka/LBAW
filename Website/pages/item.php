<?php
include_once ('../config/init.php');
include_once ($BASE_DIR . 'database/categories.php');
include_once ($BASE_DIR . 'database/auctions.php');
include_once ($BASE_DIR . 'database/bids.php');

$auctionid = $_GET['id'];
$auction = getAuctionById ($auctionid);

if ($auction)
{
  // categories [categoria->idcategoria, categoria->tipo]
  $categories = getAllCategories ();
  $smarty->assign ('categories', $categories);

  // auctions [leilao->idleilao, leilao->idleiloeiro, utilizador->nomeproprio, utilizador->rating, leilao->nome, leilao->descricao, licitacao->"lastbid/biggerbid", leilao->precocompraimediata, leilao->datapublicacao, leilao->datalimite]
  // falta fazer licitacao->biggestbid <----------------------------------------
  $smarty->assign ('auction', $auction);

  // bidders[utilizador->id, utilizador->nome, licitacao->preco]
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

    $smarty->assign ('itemPrice', $itemPrice);


  $smarty->assign ('itemPrice', $itemPrice);

  $smarty->assign ('bidders', $bidders);
  $smarty->assign('TITLE', 'Auction: ' . $auction['nome']);
  $smarty->display ('auctions/item.tpl');
}
else
{
  header ('Location: ' . $BASE_URL . 'pages/404.php');
}
?>
