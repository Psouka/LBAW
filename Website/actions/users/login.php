<?php
    include_once ('../../config/init.php');
    include_once ($BASE_DIR . 'database/users.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isLoginCorrect($username, $password))
    {
        assignSessionAttr($username);
        header ('Location: ' . $BASE_URL);
        exit();
    }
    else
        $_SESSION['errorLogin'] = 'Username and/or Password Invalid.';


   header ('Location: ' . $BASE_URL . 'pages/sign.php');
?>
