<?php require_once 'views/header.php' ;
?>
<main class="container">
    <form action="index.php?class=post&action=editPost&id=<?=$post->getId()?>" method="post" enctype="multipart/form-data">
            <p><label for="title">Nouveau titre: </label>
            <p><input type="text" name="title"  value="<?=$post->getTitle()?>" required></p>
            <p><label for="content">Contenu :</label>
            <p><textarea name="content" id="content" cols="30" rows="10"><?=$post->getContent()?></textarea></p>
            
            <?php 
               $images = Image::getImagesByIdPost($post->getId());
            foreach ($images as $img) :?>
            <p><img src="img/mini/<?= $img->getPath() ?>" alt=""></p>
           <a href="index.php?class=post&action=deleteImage&id=<?=$img->getId() ?>"> <span class="orange">Supprimer cette image</span></a>
            <?php endforeach ?>
            <p><input type="submit" name="valider" value="Valider"></p>
    </form>
</main>