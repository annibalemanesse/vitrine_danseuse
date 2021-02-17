<?php require_once 'views/header.php';
        $s= SubCategory::getSubCategoryById($_GET['id']);
        ?>
<main class="container white">
    <h1 class="orange"><?= $s->getNom()?></h1>
    <section class="shows">
        
        <div  class="posts">
            <?php
            $posts = Post::getPostsBySubCategory($_GET['id']);
            foreach($posts as $post):?>  
            <?php  
            $videos = Video::getVideosByIdPost($post->getId())
            ?>
                <article>
                    <h2><?= $post->getTitle() ?></h2>
                    <?php if($image = Image::getImagesByIdPost($post->getId())) :?> 
                    <?php foreach($image as $img):?>
                    <p><img src="img/<?= $img->getPath() ?>" alt=""></p>
                    <?php endforeach ?>
                    <?php endif ?>
                    <p> <?= $post->getContent() ?></p>  
                    <?php foreach($videos as $vid):?>
                    <iframe src="<?= $vid->getUrl()?>" width="560" height="400" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <?php endforeach ?>
                </article>
            <?php endforeach ?>
            
        </div>

       
    </section>


</main>
<?php require_once 'views/front/footer.php'; ?>