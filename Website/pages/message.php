<?php
include_once ('../config/init.php');
include_once ('../database/message.php');

if (isset($_GET['id'])) {
	//Show message
	$message = getMessage($_SESSION['userid'], $_GET['id']);
	$smarty->assign('message', $message);
	$smarty->assign('TITLE', 'Message');
	$smarty->display ('message/message.tpl');
} else {
	//Show List of Messages
	$sended = getMessageSend ($_SESSION['userid']);
	$received = getMessageReceive ($_SESSION['userid']);

	$smarty->assign('sended', $sended);
	$smarty->assign('received', $received);
	$smarty->assign('TITLE', 'Messages');
	$smarty->display ('message/message.tpl');
}

?>