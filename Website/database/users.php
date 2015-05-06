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

function getUserById ($userid)
{
  global $conn;
  $stmt = $conn->prepare
  ("
  SELECT *
  FROM utilizador
  WHERE idutilizador = ?
  ");
  $stmt->execute(array($userid));
  return $stmt->fetchAll ();
}

?>
