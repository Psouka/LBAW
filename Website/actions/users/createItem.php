<?php
include_once ('../../config/init.php');

$title = $_POST['title'];
$description = $_POST['description'];
$startingBid = $_POST['startingBid']; 
$buyout = $_POST['buyout']; 
$category = $_POST['category']; 

$expirationDate = $_POST['expirationDate']; 


$idUser =  $_SESSION['idUser'];
$dataDePublicacao = date('Y-m-d H:i:s');
global $conn;

// (idLeiloeiro,nome,descricao,precoInicial,precoCompraImediata,dataDePublicacao,dataLimite)
$stmt = $conn->prepare("INSERT INTO Leilao VALUES (?,?,?,?,?,?,?)");
$stmt->execute(array($idUser,$title, $description, $startingBid, $buyout, $dataDePublicacao, $expirationDate));




$stmt = $conn->prepare("SELECT idLeilao, idLeiloeiro, title FROM Leilao 
                                WHERE idLeiloeiro = ? AND title = ?");
$stmt->execute(array($idUser, $title));

$row = $stmt->fetch();

$idLeilao = $row['idLeilao'];


$image = $_FILES['image'];

$count = 1;

foreach ($_FILES as $file) {
 move_uploaded_file($file["tmp_name"], $BASE_DIR . "images/leiloes/" . $title . $count .'.' . $extension); // this is dangerous
    chmod($BASE_DIR . "images/leiloes/" . $title . $count . '.' . $extension, 0644);
    $count++;

  //(idLeilao,Localizaçao,nome)
$stmt = $conn->prepare("INSERT INTO ImagemLeilao VALUES (?,?,?)");
$stmt->execute(array($idLeilao,$BASE_DIR . "images/leiloes/" . $title . $count .'.' . $extension, $title . $count));
}

?>

