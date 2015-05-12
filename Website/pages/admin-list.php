<?php
    include_once ('../config/init.php');
	
	$smarty->assign('TITLE', 'List Admin');
    $smarty->display ('admin/admin-list.tpl');
?>