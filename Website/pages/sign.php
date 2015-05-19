<?php
    include_once ('../config/init.php');

    if(isset($_SESSION['userid']))
    {
        header ('Location: ' . $BASE_URL);
        exit();
    }

    $smarty->assign('TITLE', 'Welcome');
    
    $errorL = '';
    if(isset($_SESSION['errorLogin'])){
    	$errorL = $_SESSION['errorLogin'];
    	unset($_SESSION['errorLogin']);
    }
    $smarty->assign('errorL', $errorL);

    $errorR = '';
    if(isset($_SESSION['errorRegist'])){
    	$errorR = $_SESSION['errorRegist'];
    	unset($_SESSION['errorRegist']);
    }
    $smarty->assign('errorR', $errorR);



    $smarty->display ('users/sign.tpl');
?>