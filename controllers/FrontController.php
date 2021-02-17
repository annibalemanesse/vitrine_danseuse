<?php
require_once 'controllers/Controller.php';

class FrontController extends Controller
{
    
    public function index()
    {
        $this->render("front/index");
    }
    public function contact()
    {
        $this->render("front/contact");
    }
   
}