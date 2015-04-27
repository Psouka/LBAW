<?php

    function getAllCategories ()
    {
        global $conn;
        $stmt = $conn->prepare
        ("
            SELECT *
            FROM categoria
        ");
        
        $stmt->execute ();
        return $stmt->fetchAll ();
    }

?>