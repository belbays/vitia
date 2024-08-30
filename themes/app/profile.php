<?php
echo $this->layout("_themesP");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>
<body>
<section class="seccion-perfil-usuario">
    <div class="perfil-usuario-header">
        <div class="perfil-usuario-portada">
            <div class="perfil-usuario-avatar">
                <img src="<?= url("themes/app/assets/img/profile.png"); ?>" alt="img-avatar">
            </div>
            <button type="button" class="boton-portada" id="edit-button">
                <p>Editar</p> 
            </button>
        </div>
    </div>
    <div class="perfil-usuario-body">
        <div class="perfil-usuario-bio">
            <h3 class="titulo">Isabel Bays Ambos da Silva </h3>
            <p class="texto">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="perfil-usuario-footer">
            <ul class="lista-datos">
                <li><i class="icono fas fa-map-signs"></i>Lorem Ipsum</li>
                <li><i class="icono fas fa-phone-alt"></i>Lorem Ipsum</li>
                <li><i class="icono fas fa-briefcase"></i>Lorem Ipsum</li>
                <li><i class="icono fas fa-building"></i>Lorem Ipsum</li>
            </ul>
            <ul class="lista-datos">
                <li><i class="icono fas fa-map-marker-alt"></i> Lorem Ipsum.</li>
                <li><i class="icono fas fa-calendar-alt"></i> Lorem Ipsum</li>
                <li><i class="icono fas fa-user-check"></i>Lorem Ipsum</li>
                <li><i class="icono fas fa-share-alt"></i> Lorem Ipsum</li>
            </ul>
        </div>
    </div>

    <!-- O Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="private-area">
                <h1>Perfil do Usuário</h1>
                <form action="/caminho/para/processar/perfil" method="POST" class="private-area" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input type="password" id="senha" name="senha" required>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto:</label>
                        <input type="file" id="foto" name="foto" accept="image/*">
                    </div>
                    <button type="submit">Atualizar Perfil</button>
                </form>
            </div>
        </div>
    </div>
</section>

</body>
</html>