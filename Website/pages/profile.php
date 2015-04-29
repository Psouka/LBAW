<?php
    include_once ('../config/init.php');

    $profileid = $_GET['id'];
    
    $smarty->display ('users/profile.tpl');
?>