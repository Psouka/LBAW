<?php

include_once ('../config/init.php');
if(isset($_GET['userLimit']) && isset($_GET['userStart']) && isset($_GET['userWord']))
{

  global $conn;
  $stmt = $conn->prepare("
    SELECT idutilizador, utilizador, nomeproprio, sobrenome
    FROM utilizador
    WHERE utilizador LIKE ?
    LIMIT ?
    OFFSET ?
    ");
  $stmt->execute(array('%'.$_GET['userWord'].'%',$_GET['userLimit'],$_GET['userStart']));

  $result = $stmt->fetchAll();
  print_r($result);
}

else if(isset($_GET['userLimit']) && isset($_GET['userStart']))
{
    
  global $conn;
  $stmt = $conn->prepare("
    SELECT idutilizador, utilizador, nomeproprio, sobrenome
    FROM utilizador
    LIMIT ?
    OFFSET ?
    ");
  $stmt->execute(array($_GET['userLimit'],$_GET['userStart']));

  $result = $stmt->fetchAll();
  print_r($result);
}

else if(isset($_GET['leiloesLimit']) && isset($_GET['leiloesStart']) && isset($_GET['leiloesWord']))
{
  
  global $conn;
  $stmt = $conn->prepare("
    SELECT idleilao, idleiloeiro, idcategoria, nome
    FROM leilao
    WHERE nome LIKE ?
    LIMIT ?
    OFFSET ?
    ");
  $stmt->execute(array('%'.$_GET['leiloesWord'].'%',$_GET['leiloesLimit'],$_GET['leiloesStart']));

  $result = $stmt->fetchAll();
  print_r($result);
}

else if(isset($_GET['leiloesLimit']) && isset($_GET['leiloesStart']))
{

  global $conn;
  $stmt = $conn->prepare("
    SELECT idleilao, idleiloeiro, idcategoria, nome
    FROM leilao
    LIMIT ?
    OFFSET ?
    ");
  $stmt->execute(array($_GET['leiloesLimit'],$_GET['leiloesStart']));

  $result = $stmt->fetchAll();
  print_r($result);
}


?>
