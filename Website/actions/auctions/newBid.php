<?php
include_once ('../../config/init.php');
include_once ('../../database/bids.php');

if(isset($_POST['idAuction']) && isset($_POST['preco']) && isset($_POST['precoActual']))
{

if($_POST['preco'] >=  ( $_POST['precoActual'] + 0.2) )

try{
createBid($_POST['idAuction'],$_POST['preco']);
}

catch (PDOException $e)
{
	$_SESSION['errorBid'][] = 'Error creating Bid';
}
}


header ('Location: ' . $BASE_URL . 'pages/item.php?id=' . $_POST['idAuction']);

?>