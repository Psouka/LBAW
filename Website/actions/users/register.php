<?php
include_once ('../../config/init.php');
include_once ($BASE_DIR . 'database/users.php');

$_POST['username'] = htmlspecialchars($_POST['username'], ENT_COMPAT, 'UTF-8');
$_POST['firstname'] = htmlspecialchars($_POST['firstname'], ENT_COMPAT, 'UTF-8');
$_POST['lastname'] = htmlspecialchars($_POST['lastname'], ENT_COMPAT, 'UTF-8');
$_POST['email'] = htmlspecialchars($_POST['email'], ENT_COMPAT, 'UTF-8');


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
    echo $e;
    if (strpos($e->getMessage(), 'utilizador_utilizador_key') !== false)
    {
        $_SESSION['errorRegist'][] = 'Username already exists';
    }
    else  if (strpos($e->getMessage(), 'utilizador_email_key') !== false)
    {
        $_SESSION['errorRegist'][] = 'Email already exists';
    }
    else  if (strpos($e->getMessage(), 'utilizador_datanascimento_check') !== false)
    {
        $_SESSION['errorRegist'][] = 'UnderAge ';
    }
}

    // Faz login.
if (isLoginCorrect($username, $password))
{
    $_SESSION['username'] = $username;
    assignSessionAttr($username);
    header ('Location: ' . $BASE_URL);
    exit();

}

header ('Location: ' . $BASE_URL . 'pages/sign.php');
?>
