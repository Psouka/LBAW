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

function getMessageSend ($numMessages, $offset)
{
    global $conn;
    $stmt = $conn->prepare
    ("
        SELECT * FROM mensagem 
        WHERE idemissor = ?
        ORDER BY data
        LIMIT ? OFFSET ?
        ");
    $stmt->execute(array($_SESSION['userid'], $numMessages, $offset);
    return $stmt->fetchAll();
}

function getMessageReceive ($numMessages, $offset)
{
    global $conn;
    $stmt = $conn->prepare
    ("
        SELECT * FROM mensagem 
        WHERE idreceptor = ?
        ORDER BY data
        LIMIT ? OFFSET ?
        ");
    $stmt->execute(array($_SESSION['userid'], $numMessages, $offset);
    return $stmt->fetchAll();
}

function getMessage ($idMessage)
{
    global $conn;
    $stmt = $conn->prepare
    ("
        SELECT * FROM mensagem 
        WHERE idmensagem = ?
        ");
    $stmt->execute(array($idMessage);
    return $stmt->fetchAll();
}

?>