<?php


function getCountries()
{
  global $conn;
  $stmt = $conn->prepare ("SELECT * FROM pais ORDER BY nome");
  $stmt->execute();
  return $stmt->fetchAll();
}

if(isset($_GET['idPais']))
{
  include_once ('../config/init.php');
  //retorna cidades do país dado

  global $conn;
  $stmt = $conn->prepare ("SELECT idcidade, nome FROM cidade WHERE idpais = ? ORDER BY nome");
  $stmt->execute(array($_GET['idPais']));
  $cidades = $stmt->fetchAll();

  echo json_encode($cidades);

}

function createImage($file,$path,$name){

  if (!is_dir('../../' .$path))
  {
    echo 'tentar criar pasta';
    mkdir('../../' .$path, 0777, true);
  }
  else
  echo 'where';


  $info = pathinfo($file['name']);
$ext = $info['extension']; // get the extension of the file
$newname = $name .'.'. $ext;

$target = $path  .$newname;
if( @move_uploaded_file( $file['tmp_name'], '../../' . $target))
{
  echo 'truetrue';
  return $target;
}
else
echo 'sadDay';



}

?>
