<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Page</title>
    <link rel="stylesheet" href="themes/web/assets/styles.css">
    <script src="assets/js/scripts.js"></script>

    </head>
<body>
    <section class="menu">
        <div class="nav">
            <div class="logo"><h1><img src="themes/web/assets/images/aa.png" alt="logo"></h1></div>
        <ul>
            <li><a href="<?= url(""); ?>">Início</a></li>
            <li><a href="<?= url("aboutUs");?>"> Sobre nós</a></li>
            <li><a href="<?= url("contactUs"); ?>">Fale conosco</a></li>
        </ul>
       
        <img class="icon" src="themes/app/assets/img/profile.png" alt=""> 
       
        <div class="text-box">
            <button class="btn btn-white btn-animate"><a href="<?= url("register"); ?>">Perfil</a></button>
        </div>
        
        </div>
    </section> 

    <?php
        echo $this->section("content");
    ?>