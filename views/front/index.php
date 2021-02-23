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
             <div id="rotate">
                 <div>Danseuse</div>
                 <div>Chorégraphe</div>
                 <div>Enseignante</div>
                 <div>Performeuse</div>
             </div>
         </div>

        
        <article class="bio">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, asperiores, debitis doloremque eligendi incidunt minima molestias non omnis quaerat quis sequi temporibus? Cum delectus dolor fugiat, magnam quas quos veniam.
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
