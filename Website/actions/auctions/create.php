<?php
    include_once ('../../config/init.php');

    $title = $_POST['title'];
    $description = $_POST['description'];
    $startingBid = $_POST['startingBid']; 
    $buyout = $_POST['buyout']; 
    $category = $_POST['category']; 

    $expirationDate = $_POST['expirationDate']; 
    $dataDePublicacao = date('Y-m-d');
    
    echo '<h1>' . $USERID . '</h1>';

    global $conn;
    $stmt = $conn->prepare
    ("
        INSERT INTO leilao (idleiloeiro, nome, descricao, precoinicial, precocompraimediata, datadepublicacao, datalimite)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt->execute(array($USERID, $title, $description, $startingBid, $buyout, $dataDePublicacao, $expirationDate));

    // header ('Location: ' . $BASE_URL);

/*
    $stmt = $conn->prepare
    ("
        SELECT idleilao, idLeiloeiro, title
        FROM Leilao
        WHERE idLeiloeiro = ? AND title = ?
    ");
    $stmt->execute(array($idUser, $title));
    $row = $stmt->fetch();

    $idLeilao = $row['idLeilao'];
    $image = $_FILES['image'];
    $count = 1;

    foreach ($_FILES as $file)
    {
        move_uploaded_file($file["tmp_name"], $BASE_DIR . "images/leiloes/" . $title . $count .'.' . $extension);
        chmod($BASE_DIR . "images/leiloes/" . $title . $count . '.' . $extension, 0644);
        $count++;
        $stmt = $conn->prepare
        ("
            INSERT INTO ImagemLeilao
            VALUES (?,?,?)
        ");
        $stmt->execute(array($idLeilao,$BASE_DIR . "images/leiloes/" . $title . $count .'.' . $extension, $title . $count));
    }
*/
?>
