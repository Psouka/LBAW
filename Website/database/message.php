<?php

function createMessage ($idReceptor, $assunto, $texto)
{
    global $conn;
    $stmt = $conn->prepare
    ("
        INSERT INTO mensagem(idemissor, idreceptor, assunto, texto, data)
        VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP)
        ");
    $stmt->execute(array($_SESSION['userid'], $idReceptor, $assunto, $texto);
}

function getMessageSend ()
{
    global $conn;
    $stmt = $conn->prepare
    ("
        SELECT * FROM message WHERE idemissor = ?
        ");
    $stmt->execute(array($_SESSION['userid']);
    return $stmt->fetchAll();
}

function getMessageReceived ()
{
    global $conn;
    $stmt = $conn->prepare
    ("
        SELECT * FROM message WHERE idreceptor = ?
        ");
    $stmt->execute(array($_SESSION['userid']);
    return $stmt->fetchAll();
}

?>