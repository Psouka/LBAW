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
  return $stmt->fetch();
}

function getAdress($adressid)
{
  global $conn;
  $stmt = $conn->prepare
  ("
  SELECT *
  FROM morada
  WHERE idmorada = ?
  ");
  $stmt->execute(array($adressid));
  return $stmt->fetch();
}

function createImagemUtilizador($file,$name)
{
  echo $BASE_URL;
  include_once ('util.php');

  $path = $BASE_URL . createImage($file,'images/users/'.$_SESSION['username'].'/',$name);
  global $conn;
  $stmt = $conn->prepare
  ("
  INSERT INTO imagemutilizador (localizacao)
  VALUES ( ?)
  RETURNING idimagemutilizador
  ");
  $stmt->execute(array($path));
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result['idimagemutilizador'];

}


function editProfile()
{

  $oldData =  getUserById($_SESSION['userid']);

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


  if(isset($_POST['descricao'])  && $_POST['descricao'] != "")
  $newDescricao = $_POST['descricao'];
  else
  $newDescricao = $oldData['descricao'];

  if(isset($_POST['password']) && isset($_POST['confirmpassword']))
  {
    if($_POST['confirmpassword'] === $_POST['password'] && $_POST['confirmpassword'] !== "")
    {
      $salt = uniqid(mt_rand(), true);
      //  $salt = sprintf("$2a$%02d$", $cost) . $salt;
      $hash = hash('sha256',$salt.  $_POST['password'] .$salt);
    }
    else
    $newPassword =$oldData['palavrapasse'];
  }
  else
  $newPassword =$oldData['palavrapasse'];


  if(!empty($_FILES['profilePic']['tmp_name']))
  {
    echo '1';
    $newPic = createImagemUtilizador($_FILES['profilePic'],'perfilImage');
  }
  else if($oldData['idImagemPerfil'] == "")
  {
    echo '2';
    $newPic = 1;
  }
  else
  {
    echo '3';
    $newPic = $oldData['idImagemPerfil'];
  }


  if(!empty($_FILES['coverPic']['tmp_name']))
  $newCover = createImagemUtilizador($_FILES['coverPic'],'coverImage');
  else if($oldData['idImagemCapa'] == "")
  $newCover = 2;
  else
  $newCover = $oldData['idImagemCapa'];

  global $conn;
  $stmt = $conn->prepare
  ("
  UPDATE utilizador
  SET palavrapasse = ?, nomeproprio = ?, sobrenome = ?, genero = ?, descricao = ?, email = ?, telefone = ?, datanascimento = ?, idImagemPerfil = ?, idImagemCapa = ?
  WHERE idutilizador = ?
  ");

  $stmt->execute(array($newPassword,$newFirstName,$newLastName,$newGender,$newDescricao,$newEmail, $newPhone , $newBirthDate, $newPic, $newCover, $_SESSION['userid']));

}

function createResidence($line1, $line2, $city, $postCode){
  global $conn;
  $stmt = $conn->prepare
  ("
  INSERT INTO Morada(idCidade,linha1,linha2,codPostal)
  VALUES(?,?,?,?)
  RETURNING idmorada
  ");
  $stmt->execute(array($city,$line1,$line2,$postCode));
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result['idmorada'];
}

function changeResidence(){

  $idMorada = createResidence($_POST['line1'], $_POST['line2'], $_POST['city'], $_POST['postcode']);

  global $conn;
  $stmt = $conn->prepare
  ("
  UPDATE utilizador
  SET idmorada = ?
  WHERE idutilizador = ?
  ");
  $stmt->execute(array($idMorada,$_SESSION['userid']));

}

function changeShiping(){

  $idMorada = createResidence($_POST['line1'], $_POST['line2'], $_POST['city'], $_POST['postcode']);

  global $conn;
  $stmt = $conn->prepare
  ("
  UPDATE utilizador
  SET idship = ?
  WHERE idutilizador = ?
  ");
  $stmt->execute(array($idMorada,$_SESSION['userid']));
}

function getimagemUtilizador($id){
  global $conn;
  $stmt = $conn->prepare("
  SELECT idimagemutilizador, localizacao
  FROM imagemutilizador
  WHERE imagemutilizador = ?
  ");
  $stmt->execute(array($id));
  return $stmt->fetch()['localizacao'];
}

function getcategoriasUtilizador($id){
  global $conn;
  $stmt = $conn->prepare("
  SELECT DISTINCT tipo, categoria.idcategoria, leilao.idcategoria, idleiloeiro
  FROM categoria, leilao
  WHERE  idleiloeiro = ? AND categoria.idcategoria = leilao.idcategoria
  ");
  $stmt->execute(array($id));

  return $stmt->fetchAll();
}

function getMoradaProfile($id)
{
  global $conn;
  $stmt = $conn->prepare(" SELECT pais.nome AS nomepais, cidade.nome AS nomecidade
    FROM morada, cidade, pais
    WHERE  idmorada = ? AND morada.idcidade = cidade.idcidade AND cidade.idpais = pais.idpais
    ");
    $stmt->execute(array($id));
    return $stmt->fetch();
  }

  function getLastAuctions($id){
    global $conn;
    $stmt = $conn->prepare("
    SELECT idleilao, nome, descricao, precoinicial
    FROM leilao
    WHERE  idleiloeiro = ?
    LIMIT 6;
    ");
    $stmt->execute(array($id));

    return $stmt->fetchAll();
  }

  function getLiciatacoes($leiloes){
    $licitacao = array();

    $i = 0;
    $array = array();

    foreach($leiloes as $leilao)
    {
      global $conn;
      $stmt = $conn->prepare("
      SELECT max(preco), idutilizador
      FROM licitacao
      WHERE  idleilao = ?
      GROUP BY licitacao.idutilizador
      ");
      $stmt->execute(array($leilao['idleilao']));
      $result =$stmt->fetch();

      if(empty($result))
      {
        $leilao['preco'] = 0;
        $leilao['idutilizador'] = 0;
      }
      else
      {
        $leilao['preco'] = $result['preco'];
        $leilao['idutilizador'] = $result['idutilizador'];
      }
      $array[] = $leilao;


    }

    return $array;

  }

  ?>
