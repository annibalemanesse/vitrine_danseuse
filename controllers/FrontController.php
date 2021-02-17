<?php
require_once 'controllers/Controller.php';

class FrontController extends Controller
{
    
    public function index()
    {
        $subcategories_repository = new SubCategory();

        $this->render("front/index", ["subcategory_repository" => $subcategories_repository]);
    }
    public function contact()
    {

        $this->render("front/contact");
    }
   
}