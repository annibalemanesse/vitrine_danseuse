<?php require_once 'views/header.php';
$subcats = SubCategory::getAllSubCategories();
$subjects = Subject::getAllSubjects();
?>

<main class="container">
    <section>
        <div>
            <table>
                <h1 class="orange">Catégories</h1>
                <thead>
                    <th>Nom</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                <?php 
                $categories = Category::getAllCategories();
                foreach($categories as $cat) :?>
                    <tr>
                        <td><?= $cat->getNom() ?></td>
                        <td>
                            <a href="index.php?class=category&action=editCategory&id=<?=$cat->getId()?>"><i class="far fa-edit"></i></a>
                            <a href="index.php?class=category&action=deleteCategory&id=<?=$cat->getId()?>"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody> 
            </table>
            <a href="index.php?class=category&action=addCategory"><input type="button" value="Ajouter une nouvelle catégorie" class="fields"></a>
        </div>

        <div>
            <table>
                <h1 class="orange">Sous-Catégories</h1>
                <thead>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Catégorie</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                <?php
                foreach($subcats as $subcat ):?>
                    <tr>
                        <td><?= $subcat->getNom() ?></td>
                        <td><?= $subcat->getDescription() ?></td>
                       
                        <?php $c = Category::getCategoryById($subcat->getIdCategory()); ?>
                            <td><?= $c->getNom()?></td>
                        
                        <td>
                            <a href="index.php?class=subCategory&action=editSubCategory&id=<?=$subcat->getId()?>"><i class="far fa-edit"></i></a>
                            <a href="index.php?class=SubCategory&action=deleteSubCategory&id=<?=$subcat->getId()?>"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody> 
            </table>
            <a href="index.php?class=subCategory&action=addSubCategory"><input type="button" value="Ajouter une nouvelle sous-catégorie" class="fields"></a>
        </div>
        <div>
            <table>
                <h1 class="orange">Articles</h1>
                <thead>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th>Sous-Catégorie</th>

                    <th>Actions</th>
                </thead>
                <tbody>
                <?php 
               $posts = Post::gettAllPosts();

                foreach($posts as $post) :?>
                    <tr>
                       
                        <td><?= $post->getTitle() ?></td>
                        <td><?= $post->getContent() ?></td>
                        <?php $sub = SubCategory::getSubCategoryById($post->getIdSubCat()); ?>
                        <td><?= $sub->getNom()?></td>
                     
                        <td>
                            <a href="index.php?class=post&action=editPost&id=<?=$post->getId()?>"><i class="far fa-edit"></i></a>
                            <a href="index.php?class=post&action=deletePost&id=<?=$post->getId()?>"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody> 
            </table>
            <a href="index.php?class=post&action=addPost"><input type="button" value="Ajouter un article" class="fields"></a>
        </div>
        <div>
            <table>
                <h1 class="orange">Messages</h1>
                <thead>
                    <th>email</th>
                    <th>Sujet</th>
                    <th>Contenu</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                <?php 
               $contacts = Contact::getAllContacts();

                foreach($contacts as $contact) :?>
                    <tr>
                        <td><?= $contact->getEmail() ?></td>
                        
                        <?php $subject = Subject::getSubjectById($contact->getIdSubject()); ?>
                            <td><?= $subject->getName() ?></td>
                        
                        <td><?= $contact->getMessage() ?></td>
                    
                        <td>
                            <a href="index.php?class=contact&action=deleteContact&id=<?=$contact->getId()?>"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody> 
            </table>
        </div>



    </section>
</main>
