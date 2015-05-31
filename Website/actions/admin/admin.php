<?php

include_once ('../../config/init.php');

function getUserActions($users)
{

}


if(isset($_POST['userLimit']) && isset($_POST['userStart']) && isset($_POST['userWord']))
{

  global $conn;
  $stmt = $conn->prepare("
    SELECT idutilizador, utilizador, nomeproprio, sobrenome,
    (SELECT COUNT(*) FROM leilao WHERE idutilizador =idleiloeiro) as nrleiloes
    FROM utilizador
    WHERE utilizador LIKE ?
    GROUP BY utilizador.idutilizador
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
  SELECT idutilizador, utilizador, nomeproprio, sobrenome,
  (SELECT COUNT(*) FROM leilao WHERE idutilizador =idleiloeiro) as nrleiloes
  FROM utilizador
  GROUP BY utilizador.idutilizador
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
    SELECT leilao.idleilao, idleiloeiro, idcategoria, nome,precoInicial,
    (SELECT  max(preco) FROM licitacao WHERE licitacao.idleilao = leilao.idleilao) as licitacao,
    (SELECT utilizador FROM utilizador WHERE idleiloeiro = idutilizador) as criador
    FROM leilao
    WHERE nome LIKE ?
    GROUP BY leilao.idleilao
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
    SELECT leilao.idleilao, idleiloeiro, idcategoria, nome, precoInicial,
    (SELECT  max(preco) FROM licitacao WHERE licitacao.idleilao = leilao.idleilao) as licitacao,
    (SELECT utilizador FROM utilizador WHERE idleiloeiro = idutilizador) as criador
    FROM leilao
    LIMIT ?
    OFFSET ?
    ");
  $stmt->execute(array($_POST['leiloesLimit'],$_POST['leiloesStart']));

  $result = $stmt->fetchAll();
  echo json_encode($result);
}


?>
