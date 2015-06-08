<?php
    include_once ('../config/init.php');
	
	$smarty->assign('TITLE', 'FAQ');
    $smarty->display ('common/faq.tpl');
?>