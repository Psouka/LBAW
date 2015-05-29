<?php
    include_once ('../config/init.php');

    if($_SESSION['usertype'] != 'admin')
	{
		header ('Location: ' . $BASE_URL . 'pages/404.php');
	}
	
	$smarty->assign('TITLE', 'List Admin');
    $smarty->display ('admin/admin-list.tpl');
?>