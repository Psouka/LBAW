<?php
include_once ('../config/init.php');
include_once ('../database/message.php');

$idReceptor = $_GET['idUtilizador'];
$smarty->assign('TITLE', 'Messages');
$smarty->assign('idReceptor', $idReceptor);
$smarty->display ('message/create-message.tpl');

?>