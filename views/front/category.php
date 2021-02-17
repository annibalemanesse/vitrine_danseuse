<?php require_once 'views/header.php' ?>

<main class="container">
    <section class="container-hero">
        
            <?php 
            $category_repository = new Category();
            $category = $category_repository->getCategoryById($_GET['id_category']);

            $subcategory_repository = new SubCategory();
            $subcategories = $subcategory_repository->getSubCategoriesByIdCategory($category->getId());
            foreach($subcategories as $subcat) :?>
                <a href="index.php?class=SubCategory&action=showOne&id=<?= $subcat->getId() ?>"> 
                    <div  class="mini-hero">
                    <h2 class="orange"><?= $subcat->getNom() ?></h2>
                    <p class="white"><?= $subcat->getDescription() ?></p>
                    </div>
                </a>
            <?php endforeach ?>

    </section>

</main>

<?php require_once 'views/front/footer.php' ?>