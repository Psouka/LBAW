<?php


function getUserAuctions($leiloesLimit,$leiloesStart,$iduser)
{

  global $conn;
  $stmt = $conn->prepare("
    SELECT leilao.*,
    (SELECT  max(preco) FROM licitacao WHERE licitacao.idleilao = leilao.idleilao) as licitacao,
    (SELECT  COUNT(*) FROM licitacao WHERE licitacao.idleilao = leilao.idleilao) as nrlicitacao   
    FROM leilao
    WHERE leilao.idleiloeiro = ?
    GROUP BY leilao.idleilao
    LIMIT ?
    OFFSET ?
    ");
  $stmt->execute(array($iduser,$leiloesLimit,$leiloesStart));

  return $stmt->fetchAll();
}

?>