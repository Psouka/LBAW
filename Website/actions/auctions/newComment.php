<?php
include_once ('../../config/init.php');
include_once ('../../database/auctions.php');

if(isset($_POST['idAuction']) && isset($_POST['textComment']))
{

createComment($_POST['idAuction'],$_POST['textComment']);
}


header ('Location: ' . $BASE_URL . 'pages/item.php?id=' . $_POST['idAuction']);

?>