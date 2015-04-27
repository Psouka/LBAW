<?php
    function userID()
    {
       global $conn;
       
    $stmt = $conn->prepare("SELECT idUtilizador , utilizador FROM Utilizador WHERE utilizador = ?");
    $stmt->execute(array($_SESSION['username']));

    $row = $stmt->fetch()

    $_SESSION['idUser'] = $row['idUtilizador'];

    }
?>