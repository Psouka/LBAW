<?php
    include_once('../../config/init.php');
    include_once ($BASE_DIR . 'database/users.php');

    $users = getUserById ($_GET['id']);

    echo json_encode ($users);
?>