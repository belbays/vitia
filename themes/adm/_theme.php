<!DOCTYPE html>
<span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Administrador(a)</title>
  <link rel="stylesheet" href="<?= url("themes/adm/assets/styles.css"); ?>"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
  <div class="container">
    <nav>
      <ul>
        <li><a href="#" class="logo">
          <img src="<?= url("themes/adm/assets/img/aa.png"); ?>" alt="">
          <span class="nav-item">AdminSet</span>
        </a></li>
        
        <li><a href="<?= url("/admin"); ?>">
          <i class="fas fa-home"></i>
          <span class="nav-item">Início</span>
        </a></li>

        <li><a href="<?= url("admin/perfil"); ?>">
          <i class="fas fa-user"></i>
          <span class="nav-item">Perfil</span>
        </a></li>

        <li><a href="<?= url("admin/pagamento"); ?>">
          <i class="fas fa-wallet"></i>
          <span class="nav-item">Pagamentos</span>
        </a></li>
        
        <li><a href="<?= url("admin/clientes"); ?>">
          <i class="fas fa-chart-bar"></i>
          <span class="nav-item">Clientes</span>
        </a></li>

        <li><a href="<?= url("admin/tarefas"); ?>">
          <i class="fas fa-tasks"></i>
          <span class="nav-item">Tarefas</span>
        </a></li>

        <li><a href="<?= url("admin/configuracoes"); ?>">
          <i class="fas fa-cog"></i>
          <span class="nav-item">Configurações</span>
        </a></li>

        <!-- 
        <li><a href="<?= url(""); ?>">
          <i class="fas fa-question-circle"></i>
          <span class="nav-item">Dúvidas</span>
        </a></li> 
        -->
        
        <li><a href="<?= url("register"); ?>" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Sair</span>
        </a></li>
      </ul>
    </nav>

    <?php
        echo $this->section("content");
    ?>