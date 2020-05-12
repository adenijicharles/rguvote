<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll v3.8.6">
    <title> Robert Gordon University Aberdeen - RGUVote </title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/reset.css" rel="stylesheet">
    <link href="css/modifiers.css" rel="stylesheet">
    <link href="css/forms.css" rel="stylesheet">
</head>
<body>
<header class="padding-t100">
    <div class="logo text-center">
        <a href="./"> <img src="images/logo.png"> </a>
    </div>
</header>
    <?php if(isset($_SESSION['success'])){?>
        <div class="status_message">
            <div class="success">
                <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
            </div>
        </div>
    <?php } ?>

    <?php if(isset($_SESSION['error'])){?>
        <div class="status_message">
            <div class="error">
                <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        </div>
    <?php } ?>