<?php

function createMessage ($idEmissor, $idReceptor, $assunto, $texto)
{
    global $conn;
    $stmt = $conn->prepare
    ("
        INSERT INTO mensagem(idemissor, idreceptor, assunto, texto, data)
        VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP)
       	RETURNING idmensagem
        ");
    $stmt->execute(array($idEmissor, $idReceptor, $assunto, $texto));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row['idmensagem'];

}

function getMessageSend ($idEmissor)
{
    global $conn;
    $stmt = $conn->prepare
    ("
        SELECT * FROM mensagem 
        WHERE idemissor = ?
        ORDER BY data
        ");
    $stmt->execute(array($idEmissor));
    return $stmt->fetchAll();
}

function getMessageReceive ($idReceptor)
{
    global $conn;
    $stmt = $conn->prepare
    ("
        SELECT * FROM mensagem 
        WHERE idreceptor = ?
        ORDER BY data
        ");
    $stmt->execute(array($idReceptor));
    return $stmt->fetchAll();
}

function getMessage ($idUtilizador, $idMessage)
{
    global $conn;
    $stmt = $conn->prepare
    ("
        SELECT * FROM mensagem 
        WHERE idmensagem = ?
        AND idemissor = ?
        OR idreceptor = ?
    ");
    $stmt->execute(array($idMessage, $idUtilizador, $idUtilizador));
    return $stmt->fetch();
}

?>