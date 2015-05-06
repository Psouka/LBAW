<?php
    include_once ('../config/init.php');
	
	$smarty->assign('TITLE', 'Error 404');
    $smarty->display ('common/404.tpl');
?>