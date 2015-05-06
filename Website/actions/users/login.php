<?php
    include_once ('../../config/init.php');
    include_once ($BASE_DIR . 'database/users.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isLoginCorrect($username, $password))
    {
        $_SESSION['username'] = $username;
        assignSessionAttr();

    }

   header ('Location: ' . $BASE_URL);
?>
