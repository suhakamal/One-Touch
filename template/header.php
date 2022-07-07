<?php 
session_start();
require 'connect.php';
require 'helper.php';
$message="";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A website for an educational YouTube channel that offers web development courses">
    <meta name="author" content="alaa mustaf and suha kamal">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <link rel="icon" type="image/x-icon" href="logo.svg">
    <script src="app/main.js" async> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/style2.css">
    <title>MMAD</title>
</head>

<body id="home">
    <article >
        <div class="overlay">
        <header class="main-header">

                <a href="index.php" class="logo">       
                    <img src="logo.png" alt="logo"/>
                </a>
                <form class="search" action="search.php" method="get">
                    <input type="search" name="search" placeholder="Search..." />
                </form>
                
                <button onclick="OpenMenu()"  class="menuBtn">Menu</button>

        </header>