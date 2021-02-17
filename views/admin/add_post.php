<?php require_once 'views/header.php' ?>

<main class="container white">
<form action="index.php?class=post&action=addPost" method="post" enctype="multipart/form-data">
        <p><label for="title">Titre de l'article:</label>
        <p><input type="text" name="title" id="" required></p>

        <p><label for="content">Texte:</label>
        <p><textarea name="content" id="content" cols="30" rows="10"></textarea></p>
        
        <p><select name="id_sub_cat" id="" required>
            <?php
            $subcategories_repository = new SubCategory();
            $subcategories = $subcategories_repository->getAllSubCategories();
            foreach($subcategories as $subcat)  :?>
                <option value="<?= $subcat->getId() ?>"><?= $subcat->getNom() ?></option>
            <?php endforeach ?>
        </select></p>

        <p><input type="file" name="imagePath[]" id="" multiple></p>

        <label for="video">Lien YouTube : </label>
        <p><input type="text" name="video" id="video"></p>
            
        <input type="submit" name="valider" value="Ajouter">
    </form>
</main>
