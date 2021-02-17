<?php require_once 'views/header.php' ?>
<main class="container">
    <form action="index.php?class=Category&action=editCategory&id=<?=$category->getId()?>" method="post" enctype="multipart/form-data">
            <p><label for="name">Nom de la nouvelle sous-catégorie: </label>
            <p><input type="text" name="name"  value="<?=$category->getNom()?>" required></p>
            <p><input type="submit" name="valider" value="Valider"></p>
    </form>
</main>