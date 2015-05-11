<?php
    include_once ('config/init.php');
    include_once ($BASE_DIR . 'database/categories.php');
    include_once ($BASE_DIR .'database/users.php');

    $categories = getAllCategories();

    $smarty->assign ('categories', $categories);
    $smarty->assign('TITLE', 'Leiloes');

    $leiloes =  getRecentAuctions();
	$licitacoes = leiloes_addlicitacao($leiloes);
	$smarty->assign('leiloes', $licitacoes);

    $smarty->display ('main_page.tpl');
?>