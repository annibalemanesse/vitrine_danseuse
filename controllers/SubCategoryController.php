<?php

require_once 'controllers/Controller.php';

require_once 'models/SubCategory.php';

class SubCategoryController extends Controller 
{
    public function listSubCategories(){
        $u=new User;
        if ($u->isLogged())
        {
            $subCategories=(new SubCategory())->getAllSubCategories();
            $this->render("admin/subcategory_list",["subcategories"=>$subCategories]);
        } else

        $this->render("front/index");
    }

    public function showByCat() {

        $this->render("front/category");
    }

    public function addSubCategory(){
        $u=new User;
        
        if ($u->isLogged())
        {
            if (isset($_POST["valider"])){
                
                $subcategory = new SubCategory();
               
                $subcategory->setNom($_POST["name"]);
                $subcategory->setIdCategory($_POST["id_category"]);
                $subcategory->setDescription($_POST['description']);
                
                $subcategory->add();
                $this->redirectTo("user","index");
            }
            $this->render("admin/add_subcategory");
        }
    }

    
    public function editSubCategory(){
        $u=new User();
        
        if ($u->isLogged()){
            
            $subcategory = (new SubCategory())->getSubCategoryById($_GET["id"]);
            $category = (new Category)->getAllCategories();
    
            if (isset($_POST["valider"])){
        
                $subcategory->setNom($_POST["name"]);
                $subcategory->setDescription($_POST["description"]);
                $subcategory->setIdCategory($_POST["id_category"]);                
               
                $subcategory->edit();

                $this->redirectTo("user","index");
                
            }
            
            $this->render("admin/edit_subcategory",["subcategory"=>$subcategory, "category"=>$category]);
        } else

        $this->render("front/index");
    }
    public function deleteSubCategory(){

        $u=new User();
        
        if ($u->isLogged()){

            $subCat = (new SubCategory())->getSubCategoryById($_GET["id"]);
        
                             
            $subCat->delete();

            $this->redirectTo("user","index" );

        }else

        $this->render("front/index");
    }
    
    public function showOne() {
        $subcategories_repository = new SubCategory();

        $this->render('front/sub_category', ["subcategory_repository" => $subcategories_repository]);
    }
}