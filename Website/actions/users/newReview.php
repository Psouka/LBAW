<?php
include_once ('../../config/init.php');
include_once ($BASE_DIR . 'database/users.php');
$idlicitacao = $_POST['idlicitacao'];
$stars = $_POST['stars'];
$textComment = $_POST['textComment'];
$idavaliador = $_SESSION['userid'];

updateReview($idlicitacao,$stars,$textComment,$idavaliador);


header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
?>