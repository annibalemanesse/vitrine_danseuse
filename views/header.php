<?php 
    require_once 'models/Image.php';
    require_once 'models/Newsletter.php';
    require_once 'models/Video.php';
    require_once 'models/Category.php';

    $db = new Database();
    $user = new User();
    $category_repository = new Category();
    $categories = $category_repository->getAllCategories();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Librairie d'icônes -->
    <script src="https://kit.fontawesome.com/a330a8542c.js" crossorigin="anonymous"></script>
    <!-- Feuilles de style -->
    <link rel="stylesheet" href="public/css/normalize.css">
    <link rel="stylesheet" href="public/css/flexslider.css">
    <link rel="stylesheet" href="public/css/main.css">
    <!-- Librairies JavaScript -->
    <script
        src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="public/js/jquery.flexslider-min.js"></script>
    <!-- Flexslider -->
    <script>
		$(window).on('load', function() {
			$('.flexslider').flexslider({
				directionNav: false,
				controlNav: false
			});
		});
	</script>

    <title> Annibale Manesse </title>
</head>
<body>
    <header>    
        <div class="menu-inline">
            <div class="logo-container">
                <a href="index.php?class=user&action=index">
                    <h1 id="logo">
                    Annibale Manesse
                    </h1>
                </a>
                <span class="heart"><i class="fas fa-heart"></i></span>
            </div>

            <button class="hamburger white"> &#9776 </button>
            <button class="cross white"> &#735 </button>   
        </div>
        <nav class="menu white">
            <ul id="menu">
                <li class="icon-block"><a href="index.php?class=user&action=index">Accueil</a></li>
                
               <?php if(!$user->islogged()) :?>
                <?php foreach ($categories as $cat) :?>
                    <li class="icon-block drop-down">
                           <?= $cat->getNom() ?>
                           <i class="fas fa-sort-down"></i>
                        <ul class="sous-menu hidden" id="sous-menu-<?= $cat->getId() ?>">
                        <?php
                        $subcategories = $subcategory_repository->getSubCategoriesByIdCategory($cat->getId());
                        foreach($subcategories as  $subcat) :?>
                            <li >
                                <a href="index.php?class=subCategory&action=showOne&id=<?= $subcat->getId() ?>"><?= $subcat->getNom() ?></a>
                            </li>
                        <?php endforeach ?>
                        </ul>
                <?php endforeach ?>
                <li class="icon-block"><a href="index.php?class=contact&action=addContact">Contact</a></li>
                <?php else :?> 
                    <li class="icon-block"><a href="index.php?class=user&action=editProfile">Modifier le profil</a></li>

                    <li class="icon-block"><a href="index.php?class=user&action=logout">Se déconnecter</a></li>
                <?php endif ?> 
                
            </ul> 
        </nav>
    </header>