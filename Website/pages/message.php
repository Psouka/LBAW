<?php
include_once ('../config/init.php');
include_once ('../database/users.php');
include_once ('../database/message.php');

if (isset($_GET['id'])) {
	//Show message
	$message = getMessage($_SESSION['userid'], $_GET['id']);
	$utilizador = getUserById($_GET['id'])['nomeproprio'];

	$smarty->assign('message', $message);
	$smarty->assign('TITLE', 'Message');
	$smarty->display ('message/message.tpl');
} else {
	//Show List of Messages
	$sended = getMessageSend ($_SESSION['userid']);
	$received = getMessageReceive ($_SESSION['userid']);

	$emissor = getUserById($received['idemissor'])['nomeproprio'];
	$receptor = getUserById($sended['idreceptor'])['nomeproprio'];

	$smarty->assign('sended', $sended);
	$smarty->assign('received', $received);
	$smarty->assign('emissor', $emissor);
	$smarty->assign('receptor', $receptor);
	$smarty->assign('TITLE', 'Messages');
	$smarty->display ('message/message.tpl');
}

?>