<?php require_once 'views/header.php' ?>
<main class="container_form white">
        <form action="index.php?class=user&action=editProfile" method="post" enctype="multipart/form-data">
                <p><label for="name">Nouveau nom d'utilisateur:</label>
                <p><input type="text" name="username"  value="<?=$u->getUsername()?>" required></p>
        
                <p><label for="password">Nouveau mot de passe :</label></p>
                <span> Minimum 8 caractères dont 2 chiffres et 2 lettres</span>

                <input type="password" name="password" id="password" required>

                <p><input type="submit" name="valider" value="Valider"></p>
        </form>
</main>
