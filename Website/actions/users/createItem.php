<?php
include_once ('../../config/init.php');

$title = $_POST['title'];
$description = $_POST['description'];
$startingBid = $_POST['startingBid']; 
$buyout = $_POST['buyout']; 
$category = $_POST['category']; 
$image = $_POST['image']; 
$expirationDate = $_POST['expirationDate']; 


$idUser =  $_SESSION['idUser'];

global $conn;

$stmt = $conn->prepare("INSERT INTO Leilao VALUES (?,?,?,?,?,?,?)");
$stmt->execute(array($idUser,$title, $description, $startingBid, $buyout, $category, $image, $expirationDate));

?>