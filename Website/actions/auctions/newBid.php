<?php
include_once ('../../config/init.php');
include_once ('../../database/bids.php');

$result = array();

if(isset($_POST['idAuction']) && isset($_POST['idBidder']) && isset($_POST['idUtilizador']) && isset($_POST['preco']))
{


if(createBid($_POST['idAuction'],$_POST['idBidder'],$_POST['idUtilizador'],$_POST['preco']) !== "")
$result[] = 'done';
else
$result[] = 'fail';

 echo json_encode($result);
}


?>