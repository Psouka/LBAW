<?php
include_once ('../config/init.php');
include_once ('../database/users.php');


$prof = getUserById($_SESSION['userid']);
$from = getAdress($prof['idmorada']);
$ship = getAdress($prof['idship']);


$smarty->assign('profile', $prof[0]);
$smarty->assign('from', $from[0]);
$smarty->assign('ship', $ship[0]);
$smarty->assign('TITLE', 'Settings');
$smarty->display ('users/settings.tpl');
?>
