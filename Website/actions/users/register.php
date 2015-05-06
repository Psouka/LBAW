<?php
    include_once ('../../config/init.php');
    include_once ($BASE_DIR . 'database/users.php');

    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $genre = $_POST['genre'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $birthdate = $_POST['birthdate'];

    try
    {
        createUser ($username, $password, $firstname, $lastname, $genre, $email, $mobile, $birthdate);
    }
    catch (PDOException $e)
    {
        if (strpos($e->getMessage(), 'users_pkey') !== false)
        {
            $_SESSION['error_messages'][] = 'Duplicate username';
            $_SESSION['field_errors']['username'] = 'Username already exists';
        }
        else
            $_SESSION['error_messages'][] = 'Error creating user';
    }

    // Faz login.
    if (isLoginCorrect($username, $password))
    {
        $_SESSION['username'] = $username;
        assignSessionAttr ();
    }

    header ('Location: ' . $BASE_URL);
?>
