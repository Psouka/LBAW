<?php

include_once ('../../config/init.php');

function getUserActions($users)
{

}


if(isset($_POST['userLimit']) && isset($_POST['userStart']) && isset($_POST['userWord']))
{

  global $conn;
  $stmt = $conn->prepare("
    SELECT idutilizador, utilizador, nomeproprio, sobrenome
    FROM utilizador
    WHERE utilizador LIKE ?
    LIMIT ?
    OFFSET ?
    ");
  $stmt->execute(array('%'.$_POST['userWord'].'%',$_POST['userLimit'],$_POST['userStart']));

  $result = $stmt->fetchAll();
  echo json_encode($result);
}

else if(isset($_POST['userLimit']) && isset($_POST['userStart']))
{

  global $conn;
  $stmt = $conn->prepare("
    SELECT idutilizador, utilizador, nomeproprio, sobrenome
    FROM utilizador
    LIMIT ?
    OFFSET ?
    ");
  $stmt->execute(array($_POST['userLimit'],$_POST['userStart']));

  $result = $stmt->fetchAll();
  echo json_encode($result);
}

else if(isset($_POST['leiloesLimit']) && isset($_POST['leiloesStart']) && isset($_POST['leiloesWord']))
{

  global $conn;
  $stmt = $conn->prepare("
    SELECT idleilao, idleiloeiro, idcategoria, nome
    FROM leilao
    WHERE nome LIKE ?
    LIMIT ?
    OFFSET ?
    ");
  $stmt->execute(array('%'.$_POST['leiloesWord'].'%',$_POST['leiloesLimit'],$_POST['leiloesStart']));

  $result = $stmt->fetchAll();
  echo json_encode($result);
}

else if(isset($_POST['leiloesLimit']) && isset($_POST['leiloesStart']))
{

  global $conn;
  $stmt = $conn->prepare("
    SELECT idleilao, idleiloeiro, idcategoria, nome
    FROM leilao
    LIMIT ?
    OFFSET ?
    ");
  $stmt->execute(array($_POST['leiloesLimit'],$_POST['leiloesStart']));

  $result = $stmt->fetchAll();
  echo json_encode($result);
}


?>
