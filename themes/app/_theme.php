<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Page</title>
    <link rel="stylesheet" href="<?= url("themes/app/assets/styles.css"); ?>">
    
    <script src="assets/js/scripts.js"></script>

    </head>
<body>
    <section class="menu">
        <div class="nav">
            <div class="logo"><h1><img src="<?= url("themes/app/assets/img/aa.png"); ?>" alt="logo"></h1></div>
        <ul>
            <li><a href="<?= url("app/"); ?>">Início</a></li>
            <li><a href="<?= url("app/artigos"); ?>">Artigos Culinários</a></li>
            <li><a href="<?= url("app/patrocinadores");?>">Patrocinadores</a></li>
            <li><a href="<?= url("app/negocio");?>">Meu Negócio</a></li>
            
        </ul>
       
        <img class="icon" src="<?= url("themes/app/assets/img/profile.png"); ?>" alt=""> 
       
        <div class="text-box">
            <button class="btn btn-white btn-animate"><a href="<?= url("app/perfil"); ?>">Perfil</a></button>
        </div>
    </div>
    </section> 

    <?php
        echo $this->section("content");
    ?>