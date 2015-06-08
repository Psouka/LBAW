<?php

function createUser($username, $password, $firstname, $lastname, $genre, $email, $mobile, $birthdate)
{


  $salt = uniqid(mt_rand(), true);
  //  $salt = sprintf("$2a$%02d$", $cost) . $salt;
  $hash = hash('sha256',$salt. $password .$salt);

  global $conn;
  $stmt = $conn->prepare
  ("
    INSERT INTO utilizador ( utilizador, saltpasse, palavrapasse, nomeproprio, sobrenome, genero, email, telefone, datanascimento, dataregisto,idimagemperfil,idimagemcapa)
    VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)
    RETURNING idutilizador
    ");
  $currentdate = date("Y-m-d");
  $stmt->execute(array($username,$salt,$hash, $firstname, $lastname, $genre, $email, $mobile, $birthdate, $currentdate,1,2));

  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  $stmt = $conn->prepare
  ("
    INSERT INTO utilizadornormal
    VALUES (?)
    ");
  $stmt->execute(array($result['idutilizador']));
}

function assignSessionAttr ($username)
{
  global $conn;
  $stmt = $conn->prepare
  ("
    SELECT idutilizador , utilizador, nomeProprio
    FROM utilizador
    WHERE utilizador = ?
    ");
  $stmt->execute(array($username));
  $row = $stmt->fetch();

  $_SESSION['username'] = $row['utilizador'];
  $_SESSION['userid'] = $row['idutilizador'];
  $_SESSION['firstname'] = $row['nomeproprio'];

  $stmt = $conn->prepare
  ("
    SELECT idadministrador 
    FROM administrador
    WHERE idadministrador = ?
    ");
  $stmt->execute(array($_SESSION['userid']));
  $row = $stmt->fetch();

  if($row)
    $_SESSION['usertype'] = 'admin';
  else
    $_SESSION['usertype'] = 'normal';

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
    SELECT idimagemutilizador
    FROM imagemutilizador
    WHERE localizacao = ?
    ");
  $stmt->execute(array($path));
  $result = $stmt->fetch();

  if($result)
    return $result['idimagemutilizador'];


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
    try{
      $newPic = createImagemUtilizador($_FILES['profilePic'],'perfilImage');
    }
    catch (PDOException $e)
    {
    
    $newPic = $oldData['idimagemperfil'];
    }

  }
  else if($oldData['idimagemperfil'] == "")
  {
    echo '2';
    $newPic = 1;
  }
  else
  {
    echo '3';
    $newPic = $oldData['idimagemperfil'];
  }


  if(!empty($_FILES['coverPic']['tmp_name']))
  {
    try{
      $newCover = createImagemUtilizador($_FILES['coverPic'],'coverImage');
    }
    catch (PDOException $e)
    {
    $newCover = $oldData['idimagemcapa'];
    }

  }

  else if($oldData['idimagemcapa'] == "")
    $newCover = 2;
  else
    $newCover = $oldData['idimagemcapa'];

  global $conn;
  $stmt = $conn->prepare
  ("
    UPDATE utilizador
    SET palavrapasse = ?, nomeproprio = ?, sobrenome = ?, genero = ?, descricao = ?, email = ?, telefone = ?, datanascimento = ?, idimagemperfil = ?, idimagemcapa = ?
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
    SELECT localizacao
    FROM imagemutilizador
    WHERE idimagemutilizador = ?
    ");
  $stmt->execute(array($id));
  return $stmt->fetch();
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

  SELECT DISTINCT ON (leilao.idleilao) leilao.*, localizacao
  FROM leilao, imagemleilao
  WHERE leilao.idleilao = imagemleilao.idleilao AND idleiloeiro = ?
  ORDER BY idleilao DESC
  LIMIT 6;
    ");
  $stmt->execute(array($id));

  return $stmt->fetchAll();
}

function leiloes_addlicitacao($leiloes){
  $array = array();

  foreach($leiloes as $leilao)
  {
    global $conn;
    $stmt = $conn->prepare("
      SELECT max(preco), idutilizador, COUNT(*)
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
      $leilao['count'] = 0;
    }
    else
    {
      $leilao['preco'] = $result['preco'];
      $leilao['idutilizador'] = $result['idutilizador'];
      $leilao['count'] = $result['count'];
    }
    $array[] = $leilao;


  }

  return $array;
}

function getRecentAuctions(){
  global $conn;
  $stmt = $conn->prepare("
  SELECT DISTINCT ON (leilao.idleilao) leilao.*, localizacao,
  (SELECT AVG(estrelas) FROM avaliacaoutilizador WHERE idleiloeiro = avaliacaoutilizador.idavaliado) as estrelas
  FROM leilao, imagemleilao
  WHERE leilao.idleilao = imagemleilao.idleilao
  AND NOT EXISTS (SELECT bloqueioleilao.* 
                   FROM  bloqueioleilao
                   WHERE  bloqueioleilao.idleilao = leilao.idleilao)
  AND NOT EXISTS (SELECT bloqueioutilizador.* 
                   FROM  bloqueioutilizador
                   WHERE  bloqueioutilizador.idutilizador = leilao.idleiloeiro)
  AND leilao.datalimite > CURRENT_TIMESTAMP 
  ORDER BY idleilao DESC
  LIMIT 9;
    ");
  $stmt->execute(array());

  return $stmt->fetchAll();
}

function getRating($userid)
{
  global $conn;
  $stmt = $conn->prepare
  ("
    SELECT AVG(estrelas)
    FROM avaliacaoutilizador
    WHERE idavaliado = ?
    ");
  $stmt->execute(array($userid));
  return $stmt->fetch();
}

function resetPass($username,$email){
  $newpass = substr(md5(microtime()),rand(0,26),6);
  $salt = uniqid(mt_rand(), true);
  $hash = hash('sha256',$salt. $newpass .$salt);

  global $conn;
  $stmt = $conn->prepare
  ("
    UPDATE utilizador
    SET palavrapasse = ?, saltpasse = ?
    WHERE email = ? AND utilizador = ?
    RETURNING idutilizador
    ");

  $stmt->execute(array($hash,$salt,$email,$username));
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  if($result)
  return $newpass;
else
  return 'notUpdated';
}

function getReviewsTodo($id)
{
   global $conn;
  $stmt = $conn->prepare
  ("
    SELECT DISTINCT ON (avaliacaoutilizador.idlicitacaovencedora) avaliacaoutilizador.*, licitacao.preco, licitacao.idlicitacao, leilao.nome, leilao.idleilao,
(SELECT nomeproprio FROM utilizador WHERE utilizador.idutilizador = avaliacaoutilizador.idavaliador) as avaliador,
(SELECT nomeproprio FROM utilizador WHERE utilizador.idutilizador = avaliacaoutilizador.idavaliado) as avaliado
FROM avaliacaoutilizador, licitacao, leilao
WHERE avaliacaoutilizador.idlicitacaovencedora= licitacao.idlicitacao  AND leilao.idleilao = licitacao.idleilao
AND avaliacaoutilizador.estrelas IS NULL
AND avaliacaoutilizador.idavaliador = ?


    ");

  $stmt->execute(array($id));
  return $stmt->fetchAll();
}

function getReviews($id)
{
   global $conn;
  $stmt = $conn->prepare
  ("
    SELECT DISTINCT ON (avaliacaoutilizador.idlicitacaovencedora) avaliacaoutilizador.*, licitacao.preco, licitacao.idlicitacao, leilao.nome, leilao.idleilao, localizacao,
(SELECT nomeproprio FROM utilizador WHERE utilizador.idutilizador = avaliacaoutilizador.idavaliador) as avaliador
FROM avaliacaoutilizador, licitacao, leilao, utilizador, imagemutilizador
WHERE avaliacaoutilizador.idlicitacaovencedora= licitacao.idlicitacao  AND leilao.idleilao = licitacao.idleilao
AND avaliacaoutilizador.estrelas IS NOT NULL
AND avaliacaoutilizador.idavaliado = ?
AND avaliacaoutilizador.idavaliador = utilizador.idutilizador
AND imagemutilizador.idimagemutilizador = utilizador.idimagemperfil
    ");

  $stmt->execute(array($id));
  return $stmt->fetchAll();
}


function updateReview($idlicitacao,$stars,$textComment,$idavaliador){
global $conn;
  $stmt = $conn->prepare
  ("
    UPDATE avaliacaoutilizador
    SET estrelas = ?, texto = ?
    WHERE idlicitacaovencedora = ? AND idavaliador = ? 
    ");

  $stmt->execute(array($stars,$textComment,$idlicitacao,$idavaliador));
}

?>
