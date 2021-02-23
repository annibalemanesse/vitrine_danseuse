
<main class="container_form white">
<form action="" method="post" id="contact_form">

    <label for="email">Votre e-mail:</label>
    <input type="email" name="email" id="email" class="fields" required>

    <label for="sujet"> Sujet: </label>
        <select name="id_subject" class="fields" id="sujet">
        <?php
        $subjects = $subject_repository->getAllSubjects();
        foreach($subjects as $subject) :?>
            <option value="<?= $subject->getId()?>"><?= $subject->getName() ?></option>
        <?php endforeach ?> 
        </select>
    <label for="contenu"> Votre message: </label>
    <textarea name="contenu" id="content" cols="30" rows="10" class="fields" required></textarea>

    <input name="send" id="submit" type="submit" value="Envoyer message" class="fields">

</form>
</main>
<script src="public/js/contact.js"></script>

<?php require_once 'views/front/footer.php' ?>