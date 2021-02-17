<?php

use Symfony\Component\VarDumper\VarDumper;

require_once 'controllers/Controller.php';

require_once 'models/User.php';

class UserController extends Controller
{
    public function index() {
        /*$u = new User();
        if($u->isLogged())
        {*/
            $this->render("admin/dashboard");
       // }else $this->render('front/index');
    }
//Connexion de l'unique utilisateur qui est l'administrateur.
    public function login()
    {
        $u = new User();
        
        if($u->isLogged())
        {
          
            $this->render("admin/dashboard");
        }else
        {
            
            if(isset($_POST['login']) && isset($_POST['username']) && isset($_POST['password']))
            {
                
                 $user = User::getByUsername($_POST['username']);
                 
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
    
            $this->render("admin/login");
        }
        

    }


    public function editProfile(){
        if($u = User::getById(1))
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
            $this->render("admin/edit_profile");
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