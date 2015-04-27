<?php
    function isLoginCorrect($username, $password)
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * 
                                FROM utilizador 
                                WHERE utilizador = ? AND palavrapasse = ?");
        $stmt->execute(array($username, $password));
        return $stmt->fetch() == true;
    }
?>