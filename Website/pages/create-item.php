<?php
    include_once ('../config/init.php');
    include_once ($BASE_DIR . 'database/categories.php');

    $categories = getAllCategories ();
    $smarty->assign ('categories', $categories);

    $smarty->display ('create-item.tpl');
?>