<?php require_once 'views/header.php' ?>
<main class=" white">
        <form action="index.php?class=user&action=editProfile" method="post" enctype="multipart/form-data" class="container_form">
                <label for="name">Nouveau nom d'utilisateur:</label>
                <input type="text" name="username"  value="<?=$u->getUsername()?>" required>
        
                <label for="password">Nouveau mot de passe :</label>
                <span class="password_constraints"> Minimum 8 caractères dont 2 chiffres et 2 lettres</span>

                <input type="password" name="password" id="password" required>

                <input type="submit" name="valider" value="Valider">
        </form>
</main>
<?php require_once 'views/admin/footer.php' ?>
