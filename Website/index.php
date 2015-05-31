<?php
    include_once ('config/init.php');
    include_once ($BASE_DIR . 'database/categories.php');
    include_once ($BASE_DIR .'database/users.php');

    $categories = getAllCategories();

    $smarty->assign ('categories', $categories);
    $smarty->assign('TITLE', 'Leiloes');

    $leiloes =  getRecentAuctions();
    $leiloes = leiloes_addlicitacao($leiloes);

    $firstLeiloes = array();

    for($i = 0; $i < 3; $i++)
    $firstLeiloes[] = array_shift($leiloes);

  //  print_r($firstLeiloes);
 $firstLeilao = array_shift($firstLeiloes);

    $smarty->assign('firstLeilao', $firstLeilao);
    $smarty->assign('firstLeiloes', $firstLeiloes);
	$smarty->assign('leiloes', $leiloes);

  $smarty->display ('main_page.tpl');
?>
