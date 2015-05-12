<?php
    include_once ('../config/init.php');
	
	$smarty->assign('TITLE', 'Admin List');
    $smarty->display ('admin/admin-list.tpl');
?>