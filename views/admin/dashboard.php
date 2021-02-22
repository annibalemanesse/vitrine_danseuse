<?php require_once 'views/header.php';


$categories = $category_repository->getAllCategories();
$subcategories = $subcategory_repository->getAllSubCategories();
$subjects = $subject_repository->getAllSubjects();
$posts = $post_repository->getAllPosts();
$contacts = $contact_repository->getAllContacts();


?>

<main class="container">
    <section>
        <div>
            <table>
                <h2 class="orange">Catégories</h2>
                <thead>
                    <th>Nom</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                <?php 
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
                <h2 class="orange">Sous-Catégories</h2>
                <thead>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Catégorie</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                <?php
                foreach($subcategories as $subcat ):?>
                    <tr>
                        <td><?= $subcat->getNom() ?></td>
                        <td><?= $subcat->getDescription() ?></td>
                       
                        <?php $cat = $category_repository->getCategoryById($subcat->getIdCategory()); ?>
                            <td><?= $cat->getNom()?></td>
                        
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
                <h2 class="orange">Articles</h2>
                <thead>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th>Sous-Catégorie</th>

                    <th>Actions</th>
                </thead>
                <tbody>
                <?php 

                foreach($posts as $post) :?>
                    <tr>
                       
                        <td><?= $post->getTitle() ?></td>
                        <td><?= $post->getContent() ?></td>
                        <?php $sub = $subcategory_repository->getSubCategoryById($post->getIdSubCat()); ?>
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
                <h2 class="orange">Messages</h2>
                <thead>
                    <th>email</th>
                    <th>Sujet</th>
                    <th>Contenu</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                <?php
                foreach($contacts as $contact) :?>
                    <tr>
                        <td><?= $contact->getEmail() ?></td>
                        
                        <?php $subject = $subject_repository->getSubjectById($contact->getIdSubject()); ?>
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
<?php require_once 'views/admin/footer.php' ?>

