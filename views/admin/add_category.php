<?php require_once 'views/header.php' ?>
<main class="container">
        <form action="index.php?class=category&action=addCategory" method="post" enctype="multipart/form-data">
                <p><label for="name">Nom de la catégorie :</label>
                <p><input type="text" name="name" id="" required></p>
                <p><input type="submit" name="valider" value="Valider"></p>
        </form>
</main>

