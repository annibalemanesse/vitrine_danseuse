<?php

use Symfony\Component\VarDumper\VarDumper;

class ContactController extends Controller {
    
    public function index(){
        $category_repository = new Category();
        $subcategory_repository = new SubCategory();
        $subjects_repository = new Subject();


        if(isset($_POST['email'])) {
            $contact = new Contact();

            $contact->setEmail($_POST['email']);
            $contact->setIdSubject($_POST['id_subject']);
            $contact->setMessage($_POST['contenu']);

            $contact->add();
            header('Content-Type: application/json');
            echo json_encode(["result" => 'success']);
            exit;
        } else {
            $this->render('front/contact',[
                "subject_repository" => $subjects_repository,
                "category_repository" => $category_repository,
                "subcategory_repository" => $subcategory_repository
            ]);
        }

    }
    public function deleteContact() {
        $u = new User();
        
        if ($u->isLogged())
        {
            $contact = (new Contact())->getContactById($_GET["id"]);
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