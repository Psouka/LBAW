<?php
include_once ('../config/init.php');
include_once ('../database/users.php');

//echo $_SESSION['userid'];
$avaliacoes = getReviewsTodo($_SESSION['userid']);

//print_r($avaliacoes);
$smarty->assign('avaliacoes', $avaliacoes);

$smarty->assign('TITLE', 'Reviews');
$smarty->display ('users/review.tpl');


?>