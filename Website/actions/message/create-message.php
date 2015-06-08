<?php
    include_once ('../../config/init.php');
    include_once ($BASE_DIR . 'database/message.php');

    $idReceptor = $_POST['idReceptor'];
    $assunto = $_POST['subject']; 
    $texto = $_POST['text'];

    $idMessage = createMessage ($_SESSION['userid'], $idReceptor, $assunto, $texto);
    
    header ('Location: ' . $BASE_URL . 'pages/message.php?id=' . $idMessage);
?>
