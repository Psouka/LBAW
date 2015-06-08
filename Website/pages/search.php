<?php
include_once ('../config/init.php');
include_once ($BASE_DIR . 'database/categories.php');
include_once ($BASE_DIR . 'database/util.php');
include_once ($BASE_DIR . 'database/auctions.php');
include_once ($BASE_DIR . 'database/users.php');

$searchfield = "'" . 'Pesquisa' . "'";
$hiddeninput = "";
$hiddencat = "";
function sortPriceLow( $a, $b ) {
    return $a["precoinicial"] - $b["precoinicial"];
}
function sortPriceHigh( $a, $b ) {
    return $b["precoinicial"] - $a["precoinicial"];
}
function timeNewer( $a, $b ) {
    return strtotime($a["datalimite"]) - strtotime($b["datalimite"]);
}
function timeSoon( $a, $b ) {
    return strtotime($b["datalimite"]) - strtotime($a["datalimite"]);
}





if (isset($_GET['text']) || isset($_GET['category']))
{


    if(isset($_GET['text']))
    {
        $searchfield = "'" . $_GET['text'] . "'";
        $hiddeninput = $_GET['text'];
    }
    
    if(isset($_GET['category']))
    {
        $hiddencat = $_GET['category'];
    }


    $smarty->assign ('hiddeninput', $hiddeninput);
    $smarty->assign ('hiddencat', $hiddencat);
    $smarty->assign ('searchfield', $searchfield);

    if(isset($_GET['text']) && isset($_GET['category']) && $_GET['category'] != "" && $_GET['text'] != "")
    {
        $auctions = searchAuctionsTextCat($_GET['text'],$_GET['category']);
    }
    else if(isset($_GET['text']) && $_GET['text'] != "")
    {
        $auctions = searchAllAuctions($searchfield);
    }
    else if(isset($_GET['category']) && $_GET['category'] != "")
    {
        $auctions = searchAuctionsCat($_GET['category']);
    }

    if(isset($_GET['sort']))
    {
        if($_GET['sort'] == "pricel")
            usort($auctions, "sortPriceLow");
        else if($_GET['sort'] == "priceh")
            usort($auctions, "sortPriceHigh");
        else if($_GET['sort'] == "times")
            usort($auctions, "timeSoon");
        else if($_GET['sort'] == "timen")
            usort($auctions, "timeNewer");

    }

    $smarty->assign ('auctions', $auctions);
    //print_r($auctions);

    if(isset($_GET['text'])  && $_GET['text'] != "")
        $users = searchUsers($searchfield);
    $smarty->assign ('users', $users);

    $categories = getAllCategories();
    $smarty->assign ('categories', $categories);

    $cities = getCities();
    $smarty->assign ('cities', $cities);

    $smarty->assign('TITLE', 'Pesquisa');
  $smarty->display ('auctions/search.tpl');
}
else
{
    header ('Location: ' . $BASE_URL . 'pages/404.php');
}
?>