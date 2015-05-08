<?php
include_once ('../config/init.php');

function getCountries()
{
  global $conn;
  $stmt = $conn->prepare ("SELECT * FROM pais ORDER BY nome");
  $stmt->execute();
  return $stmt->fetchAll();
}

if(isset($_GET['idPais']))
{
  //retorna cidades do país dado

  global $conn;
  $stmt = $conn->prepare ("SELECT idcidade, nome FROM cidade WHERE idpais = ? ORDER BY nome");
  $stmt->execute(array($_GET['idPais']));
  $cidades = $stmt->fetchAll();

  echo json_encode($cidades);

}


?>
