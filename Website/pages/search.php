<?php
    include_once ('../config/init.php');
	
	$smarty->assign('TITLE', 'Pesquisa');
    $smarty->display ('auctions/search.tpl');
?>