<?php
    include_once ('../config/init.php');
    include_once ($BASE_DIR . 'database/categories.php');
	include_once ($BASE_DIR . 'database/util.php');

    $categories = getAllCategories();
    $smarty->assign ('categories', $categories);
	
	$cities = getCities();
	$smarty->assign ('cities', $cities);
	
	$smarty->assign('TITLE', 'Pesquisa');
    $smarty->display ('auctions/search.tpl');
?>