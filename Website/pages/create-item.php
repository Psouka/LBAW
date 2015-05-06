<?php
    include_once ('../config/init.php');
    include_once ($BASE_DIR . 'database/categories.php');

    $categories = getAllCategories ();
    $smarty->assign ('categories', $categories);
	$smarty->assign('TITLE', 'Create Auction');
    $smarty->display ('auctions/create-item.tpl');
?>