<?php
include_once ('../../config/init.php');
include_once ('../../database/auctions.php');

$_POST['title'] = htmlspecialchars($_POST['title'], ENT_COMPAT, 'UTF-8');
$_POST['description'] = htmlspecialchars($_POST['description'], ENT_COMPAT, 'UTF-8');

$title = $_POST['title'];
$description = $_POST['description'];
$startingBid = $_POST['startingBid'];
$buyout = $_POST['buyout'];
$category = $_POST['category'];

$expirationDate = $_POST['expirationDate'];
$dataDePublicacao = date('Y-m-d');

    //$photo = $_FILES['photo'];
    //$extension = end (explode (".", $photo["name"]));


$num_files = count($_FILES['upload']['name']);

try
{
    $idleilao = createAuction ($category, $title, $description, $startingBid, $buyout, $dataDePublicacao, $expirationDate);

    $upload_dir= 'images/auctions/'. $_SESSION['username'] . '/' . $idleilao . '/' ;

    if (!is_dir('../../' .$upload_dir))
    {
      mkdir('../../' . $upload_dir, 0777, true);
    }

    for ($index = 0 ; $index < $num_files ; $index++)
    {

    $ext = end(explode('.', urlencode(basename($_FILES['upload']['name'][$index]))));

    if(!strcasecmp($ext,'png') &&  !strcasecmp($ext,'jpg') &&  !strcasecmp($ext,'bmp')  &&  !strcasecmp($ext,'gif'))
        continue;

        $upload_file = '../../' . $upload_dir . $index  . '.' . $ext;
        if (@is_uploaded_file($_FILES['upload']['tmp_name'][$index]))
        {
            if (@move_uploaded_file($_FILES['upload']['tmp_name'][$index], $upload_file))
            {
                addImageToAuction ($idleilao, $upload_dir  . $index  . '.' . $ext);
            }
            else
                print $error_message[$_FILES['upload']['error'][$index]];
        }
        else
            print $error_message[$_FILES['upload']['error'][$index]];
    }

}
catch (PDOException $e)
{
    $_SESSION['error_messages'][] = 'Error creating auction: ' . $e->getMessage();
    $_SESSION['form_values'] = $_POST;
    header ('Location: ' . $BASE_URL . 'pages/404.php');
    exit;
}

header ('Location: ' . $BASE_URL . 'pages/item.php?id=' . $idleilao);
?>
