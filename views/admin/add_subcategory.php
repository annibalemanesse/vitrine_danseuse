<?php require_once 'views/header.php' ?>
<main class="container">
    <form action="index.php?class=subCategory&action=addSubCategory" method="post" enctype="multipart/form-data">
            <p><label for="name">Nom de la nouvelle sous-catégorie: </label></p>
            <p><input type="text" name="name"  value="" required></p>
            <select name="id_category">
                <?php 
                foreach ($categories as $cat) :?>
                    <option value="<?= $cat->getId()?>"><?= $cat->getNom() ?></option>
                <?php endforeach ?>
            </select>
            <p><label for="description">Description :</label></p>
            <p><textarea name="description" id="description" cols="30" rows="10"></textarea></p>
            <p><input type="submit" name="valider" value="Valider"></p>
    </form>
</main>
<?php require_once 'views/admin/footer.php' ?>
