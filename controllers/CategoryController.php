<?php
require_once 'Controller.php';
require_once 'models/Category.php';


class CategoryController extends Controller
{
    public function index()
    {
        $user = new User();
        
        if($user->isLogged())
        {
          $this->render('admin/index');
        }else{
            $this->redirectTo("user", "index");
        }
    }
    public function showOne() {
        $subcategories = SubCategory::getSubCategoriesByIdCategory($_GET['id']);
        
        $this->render('front/category', ['subcategories' => $subcategories]);
    }
    
    public function addCategory(){
        $u =new User();
        
        if ($u->isLogged()){
            if (isset($_POST["valider"])){

                $category = new Category();
                $category->setNom($_POST["name"]);
            
                $category->add();

                $this->redirectTo("user", "index");
            }
            
            $this->render("admin/add_category");
        } else

        $this->render("front/index");
    }

    public function editCategory(){
        $u=new User();
        
        if ($u->isLogged()){
            
            $c = Category::getCategoryById($_GET["id"]);
    
            if (isset($_POST["valider"])){
        
                $c->setNom($_POST["name"]);
                $c->edit();
                $this->redirectTo("user", "index");
            }
            
            $this->render("admin/edit_category",["category"=>$c]);
        } else

        $this->render("front/index");
    }
    public function deleteCategory(){

        $u = new User();
        
        if ($u->isLogged()){

            $c = Category::getCategoryById($_GET["id"]);
        
                             
            $c->delete();

            $this->redirectTo("user", "index");

        }else

        $this->render("front/index");
    }
}