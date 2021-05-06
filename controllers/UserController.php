<?php

class UserController extends Controller
{
    public function index() {
        $category_repository = new Category();
        $subcategory_repository = new SubCategory();

        $u = new User();
        if($u->isLogged())
            {
            $subject_repository = new Subject();
            $post_repository = new Post();
            $contact_repository = new Contact();

            $this->render("admin/dashboard", [
                "category_repository" => $category_repository,
                "subcategory_repository" => $subcategory_repository,
                "subject_repository" => $subject_repository,
                "post_repository" => $post_repository,
                "contact_repository" => $contact_repository
            ]);
        }else
            $this->render('front/index', [
                "category_repository" => $category_repository,
                "subcategory_repository" => $subcategory_repository]);
    }
//Connexion de l'unique utilisateur qui est l'administrateur.
    public function login()
    {
        $u = new User();
        $subcategory_repository = new SubCategory();

        if($u->isLogged())
        {
            $this->render("admin/dashboard", ["subcategory_repository" => $subcategory_repository]);
        }else
        {
            if(isset($_POST['login']) && isset($_POST['username']) && isset($_POST['password']))
            {
                
                 $user = (new User())->getByUsername($_POST['username']);
                 
                if($user instanceof User)
                {
                    
                    if( password_verify($_POST["password"], $user->getPassword()) )
                    {
                        $user->login();
                        $this->redirectTo("user", "index");
                    }else{
                        $this->redirectTo("user", "login");
                    }
                }else{
                    
                    $this->redirectTo("user", "login");
                }
            }
    
            $this->render("admin/login", ["subcategory_repository" => $subcategory_repository]);
        }
    }


    public function editProfile(){
        $user = new User();
        $subcategory_repository = new SubCategory();

        if($u = $user->getById(1))
        {
            if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["valider"]))
            {
                
                $u->setUsername($_POST["username"]);
                $u->setPassword($_POST["password"]);
                $verif = $u->verif();
            
                if ($verif)
                {
                    $u->edit();
                    $this->redirectTo("user","index");
                }else echo "Remplis toutes les cases ma biche";
            }
            $this->render("admin/edit_profile",[
                "subcategory_repository" => $subcategory_repository,
                "u" => $u
                ]);
        } else {
            $this->render('front/index');
        }
        
    }

    public function logout() {
        $u = new User;
        if($u->isLogged()) {
            $u->logout();
        $this->redirectTo("user", "index");
        } 
        $this->render('front/index');
        
    }
}
