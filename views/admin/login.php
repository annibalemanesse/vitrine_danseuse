<?php require_once 'views/header.php' ?>

<main class="container">
     <section>
         <form action="" method="post" id="login_form">

            <label for="username" class="white"> Nom d'utilisateur: </label>
            <input type="text" name="username" id="username" class="fields">
        
            
            <label for="password" class="white"> Mot de passe : </label>
            <input type="password" name="password" id="password" class="fields">

            <p><input type="submit" name="login" id="login" value="login" class="fields"></p>
        </form>
     </section>
 
 </main>
</body>
</html>
<?php require_once 'views/front/footer.php' ?>