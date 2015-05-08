<?php

function createUser($username, $password, $firstname, $lastname, $genre, $email, $mobile, $birthdate)
{

  $salt = uniqid(mt_rand(), true);
  //  $salt = sprintf("$2a$%02d$", $cost) . $salt;
  $hash = hash('sha256',$salt. $password .$salt);


  global $conn;
  $stmt = $conn->prepare
  ("
  INSERT INTO utilizador ( utilizador, saltpasse, palavrapasse, nomeproprio, sobrenome, genero, email, telefone, datanascimento, dataregisto)
  VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
  RETURNING idutilizador
  ");
  $currentdate = date("Y-m-d");
  $stmt->execute(array($username,$salt,$hash, $firstname, $lastname, $genre, $email, $mobile, $birthdate, $currentdate));

  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  $stmt = $conn->prepare
  ("
  INSERT INTO utilizadornormal
  VALUES (?)
  ");
  $stmt->execute(array($result['idutilizador']));
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
  WHERE utilizador = ?
  ");
  $stmt->execute(array($username));
  $row = $stmt->fetch();

  $salt = $row['saltpasse'];

  return hash('sha256',$salt. $password .$salt) === $row['palavrapasse'];
}

function getUsers ()
{
  global $conn;
  $stmt = $conn->prepare
  ("
  SELECT *
  FROM utilizador
  ");
  $stmt->execute();
  return $stmt->fetchAll ();
}

function getUserById($userid)
{
  global $conn;
  $stmt = $conn->prepare
  ("
  SELECT *
  FROM utilizador
  WHERE idutilizador = ?
  ");
  $stmt->execute(array($userid));
  return $stmt->fetchAll();
}

function getAdress($adressid)
{
  global $conn;
  $stmt = $conn->prepare
  ("
  SELECT *
  FROM Morada
  WHERE idMorada = ?
  ");
  $stmt->execute(array($adressid));
  return $stmt->fetchAll();
}

function editProfile()
{

  $oldData =  getUserById($_SESSION['userid']);

  $oldData = $oldData[0];


  if(isset($_POST['first-name']) && $_POST['first-name'] != "")
  $newFirstName = $_POST['first-name'];
  else
  $newFirstName =$oldData['nomeproprio'];


  if(isset($_POST['last-name']) && $_POST['last-name'] != "")
  $newLastName = $_POST['last-name'];
  else
  $newLastName =$oldData['sobrenome'];

  if(isset($_POST['optionsRadios']) && $_POST['optionsRadios'] != "")
  $newGender = $_POST['optionsRadios'];
  else
  $newGender =$oldData['genero'];

  if(isset($_POST['birthDate']) && $_POST['birthDate'] != "")
  $newBirthDate = $_POST['birthDate'];
  else
  $newBirthDate =$oldData['datanascimento'];

  if(isset($_POST['email'])  && $_POST['email'] != "")
  $newEmail = $_POST['email'];
  else
  $newEmail =$oldData['email'];

  if(isset($_POST['phoneNumber'])  && $_POST['phoneNumber'] != "")
  $newPhone = $_POST['phoneNumber'];
  else
  $newPhone =$oldData['telefone'];

  if(isset($_POST['password']) && isset($_POST['confirmpassword']))
  {
    if($_POST['confirmpassword'] === $_POST['password'] && $_POST['confirmpassword'] != "")
    $newPassword = $_POST['password'];
    else
    $newPassword =$oldData['palavrapasse'];
  }
  else
  $newPassword =$oldData['palavrapasse'];


  $newPic =1;

  $newCover = 2;


  echo  $newFirstName .'|'. $newLastName .'|'. $newGender .'|'. $newBirthDate .'|'. $newEmail .'|'. $newPhone .'|'. $newPassword .'|'.$newPic .'|'. $newCover .'|'. $_SESSION['userid'];

  global $conn;
  $stmt = $conn->prepare
  ("
  UPDATE utilizador
  SET palavrapasse = ?, nomeproprio = ?, sobrenome = ?, genero = ?, email = ?, telefone = ?, datanascimento = ?, idImagemPerfil = ?, idImagemCapa = ?
  WHERE idutilizador = ?
  ");

  $stmt->execute(array($newPassword,$newFirstName,$newLastName,$newGender,$newEmail, $newPhone , $newBirthDate, $newPic, $newCover, $_SESSION['userid']));

}

?>
