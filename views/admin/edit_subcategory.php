<?php require_once 'views/header.php' ?>
<main class="container">
    <form action="index.php?class=subCategory&action=editSubCategory&id=<?=$subcategory->getId()?>" method="post" enctype="multipart/form-data">
            <p><label for="name">Nom de la nouvelle sous-catégorie: </label>
            <p><input type="text" name="name"  value="<?=$subcategory->getNom()?>" required></p>
            <select name="id_category" id="">
            <?php foreach ($category as $cat) :?>
                <option value="<?= $cat->getId()?>"><?= $cat->getNom() ?></option>
            <?php endforeach ?>
        </select>
            <p><label for="description">Description :</label>
            <p><textarea name="description" id="description" cols="30" rows="10"><?=$subcategory->getDescription()?></textarea></p>
            <p><input type="submit" name="valider" value="Valider"></p>
    </form>
</main>
