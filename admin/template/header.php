<?php 
session_start();
require '../connect.php';
require '../helper.php';
$message="";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A website for an educational YouTube channel that offers web development courses">
    <meta name="author" content="alaa mustaf & suha kamal">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <link rel="icon" type="image/x-icon" href="logo.svg">
    <script src="../app/main.js" async> </script>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/style2.css">
    <title>MMAD</title>
</head>

<body id="">
    <article >
        <div class="">
        <header class="main-header">

                <a href="index.php" class="logo">       
                    <img src="../logo.png" alt="logo"/>
                </a>
                <form class="search">
                    <input type="search" name="search" placeholder="Search..." />
                </form>
                
                <button onclick="OpenMenu()"  class="menuBtn">Menu</button>

        </header>