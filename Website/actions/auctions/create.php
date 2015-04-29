<?php
    include_once ('../../config/init.php');
    include_once ('../../database/auctions.php');

    $title = $_POST['title'];
    $description = $_POST['description'];
    $startingBid = $_POST['startingBid']; 
    $buyout = $_POST['buyout']; 
    $category = $_POST['category'];

    $expirationDate = $_POST['expirationDate']; 
    $dataDePublicacao = date('Y-m-d');

    $photo = $_FILES['photo'];
    $extension = end (explode (".", $photo["name"]));

    try
    {
        $idleilao = createAuction ($category, $title, $description, $startingBid, $buyout, $dataDePublicacao, $expirationDate);
        /*
            $upload_dir= '../../images/users/'. $_SESSION['username'] . '/' ;
            for ($index = 0 ; $index < count($_FILES['upload']['name']) ; $i++)
            {
                $upload_file = $upload_dir . urlencode(basename($_FILES['upload']['name'][$i]));
                if (@is_uploaded_file($_FILES['upload']['tmp_name'][$i]))
                {
                    if (@move_uploaded_file($_FILES['upload']['tmp_name'][$i], $upload_file))
                    {
                        addImageToAuction ($idleilao, $upload_file);
                    }
                    else
                        print $error_message[$_FILES['upload']['error'][$i]];
                }
                else
                    print $error_message[$_FILES['upload']['error'][$i]];
            }
        */
    }
    catch (PDOException $e)
    {
        $_SESSION['error_messages'][] = 'Error creating auction: ' . $e->getMessage();
        $_SESSION['form_values'] = $_POST;
        header ('Location: ' . $BASE_URL . 'pages/404.php');
        exit;
    }

    header ('Location: ' . $BASE_URL);
?>
