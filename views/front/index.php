<?php require_once 'views/header.php';

?>
<section class="slider">
    <div class="flexslider">
        <ul class="slides">
            <li>
                <img src="public/img/slide1.jpg" />
            </li>
            <li>
                <img src="public/img/slide2.jpg" />
            </li>
            <li>
                <img src="public/img/slide3.jpg" />
            </li>
        </ul>
    </div>
</section>
<main class="container white">

     <section>
         <div class="rotator-container">
             <h2 class="name orange">Annibale Manesse</h2>
             <div id="rotate">
                 <div>Danseuse</div>
                 <div>Chorégraphe</div>
                 <div>Enseignante</div>
                 <div>Performeuse</div>
             </div>
         </div>

        
        <article class="bio">
            Danseuse Orientale Tribal Fusion ayant un joli parcours scenique avec de superbes references Francaises de ce style de danse comme Louna Omi.

            Anais est également une professionelle de la HoopDance , qui a par la suite appris enormement de technique vitesse lumière en éventails de feu, en arrivant dans la Compagnie! Cette jeune femme pro de l’informatique et du codage de symboles incompréhensifs est tout simplement très douée .
        </article>
        
        <form action="index.php?class=contact&action=addNewsletter" method="post" class="newsletter_form">
            <p> Pour suivre mes dernières actualités: </p>
            <label for="email"> Votre adresse mail : </label>
            <input type="email" name="email" id="email" class="fields">

            <input type="submit"  name="newsletter" value="S'inscrire à la newsletter" id="newsletter" class="fields">
        
        </form>
    </section>
</main>
<script src="public/js/text-rotator.js"></script>

<?php require_once 'views/front/footer.php' ?>
