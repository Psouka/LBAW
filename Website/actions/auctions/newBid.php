<?php
include_once ('../../config/init.php');
include_once ('../../database/bids.php');

if(isset($_POST['idAuction']) && isset($_POST['preco']))
{

createBid($_POST['idAuction'],$_POST['preco']);
}


header ('Location: ' . $BASE_URL . 'pages/item.php?id=' . $_POST['idAuction']);

?>