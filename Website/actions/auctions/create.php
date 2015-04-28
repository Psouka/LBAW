<?php
include_once ('../../config/init.php');

$title = $_POST['title'];
$description = $_POST['description'];
$startingBid = $_POST['startingBid']; 
$buyout = $_POST['buyout']; 
$category = $_POST['category'];

$expirationDate = $_POST['expirationDate']; 
$dataDePublicacao = date('Y-m-d');

global $conn;
$stmt = $conn->prepare
("
    INSERT INTO leilao (idleiloeiro, idcategoria, nome, descricao, precoinicial, precocompraimediata, datadepublicacao, datalimite)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    RETURNING idleilao
    ");
$stmt->execute(array($_SESSION['userid'], $category, $title, $description, $startingBid, $buyout, $dataDePublicacao, $expirationDate));
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$idLeilao = $result['idLeilao'];



$upload_dir= '../../images/Users/'. $_SESSION['username'] . '/' ;

if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0744, true);
}

$num_files = count($_FILES['upload']['name']);

echo 'Nr Files' . $num_files . '.';

for ($i=0; $i < $num_files; $i++) {
    $upload_file = $upload_dir . urlencode(basename($_FILES['upload']['name'][$i]));

    
        if (@is_uploaded_file($_FILES['upload']['tmp_name'][$i])) {
            if (@move_uploaded_file($_FILES['upload']['tmp_name'][$i], 
                $upload_file )) {

                $stmt = $conn->prepare("
                    INSERT INTO ImagemLeilao (idLeilao, localizacao,nome)
                    VALUES (?, ?, ?)
                    ");

            $stmt->execute(array($idLeilao, $upload_file,urlencode(basename($_FILES['upload']['name'][$i]))));



                echo "hooray";
            } else {
                print $error_message[$_FILES['upload']['error'][$i]];
            }
        } else {
            print $error_message[$_FILES['upload']['error'][$i]];
        }    
    
}

//header ('Location: ' . $BASE_URL);
?>
