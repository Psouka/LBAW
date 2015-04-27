<?php
    include_once ('config/init.php');
    include_once ($BASE_DIR . 'database/categories.php');

    $categories = getAllCategories ();

    $smarty->assign ('categories', $categories);
    $smarty->display ('main_page.tpl');
?>