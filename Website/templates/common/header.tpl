<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="lbaw1443">
        <link rel="shortcut icon" href="{$BASE_URL}images/shortcut.ico">

        <title>Leilões da Bairrada</title>

        <!-- Bootstrap Core CSS -->
        <link href="{$BASE_URL}css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{$BASE_URL}css/shop-homepage.css" rel="stylesheet">

    </head>
    <body>
        <header>
            {if $USERNAME}
                {include file='common/nav_logged_in.tpl'}
            {else}
                {include file='common/nav_logged_out.tpl'}
            {/if}
        </header>