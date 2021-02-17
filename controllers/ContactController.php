<?php

use Symfony\Component\VarDumper\VarDumper;

require_once 'Controller.php';
require_once 'models/Contact.php';
require_once 'models/Newsletter.php';

class ContactController extends Controller {
    
    public function addContact(){

        if(isset($_POST['email'])) {
            $contact = new Contact();

            $contact->setEmail($_POST['email']);
            $contact->setIdSubject($_POST['id_subject']);
            $contact->setMessage($_POST['contenu']);


            $contact->add();
            header('Content-Type: application/json');
            echo json_encode(["result" => 'success']);
            exit;
        }
        $this->render('front/contact');

    }
    public function deleteContact() {
        $u = new User();
        
        if ($u->isLogged())
        {
            $contact = Contact::getContactById($_GET["id"]);                 
            $contact->delete();

            $this->redirectTo("user", "index");

        }else

        $this->render("front/index");
    }
    /***
     * Ajout dans la base de données en vue de la récupération ultérieure des adresses email lors de la création d'une newsletter
     */
    public function addNewsletter() {
        if(isset($_POST['newsletter']) && isset($_POST['email'])) 
        {
            
            $n = new Newsletter();
            $n->setEmail($_POST['email']);
            $n->add();
            
            $this->redirectTo("user","index");
        }
        $this->render('front/index');

    }

}