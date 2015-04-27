<?php

    function createUser($username, $password, $firstname, $lastname, $genre, $email, $mobile, $birthdate)
    {
        global $conn;
        $stmt = $conn->prepare
        ("
            INSERT INTO utilizador (utilizador, palavrapasse, nomeproprio, sobrenome, genero, email, telefone, datanascimento, dataregisto)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $currentdate = date("Y-m-d");        
        $stmt->execute(array($username, sha1($password), $firstname, $lastname, $genre, $email, $mobile, $birthdate, $currentdate));
    }

    function assignSessionAttr ()
    {
        global $conn;
        $stmt = $conn->prepare
        ("
            SELECT idUtilizador , utilizador, nomeProprio
            FROM Utilizador
            WHERE utilizador = ?
        ");
        $stmt->execute(array($_SESSION['username']));
        $row = $stmt->fetch();
        
        $_SESSION['userid'] = $row['idutilizador'];
        $_SESSION['firstname'] = $row['nomeproprio'];
    }

    function isLoginCorrect($username, $password)
    {
        global $conn;
        $stmt = $conn->prepare
        ("
            SELECT *
            FROM utilizador
            WHERE utilizador = ? AND palavrapasse = ?
        ");
        $stmt->execute(array($username, sha1($password)));
        
        return $stmt->fetch() == true;
    }

?>