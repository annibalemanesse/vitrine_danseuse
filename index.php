<?php
require "utilities/autoload.php";
require "vendor/autoload.php";
require_once "controllers/CategoryController.php";
require_once "controllers/FrontController.php";
require_once "controllers/PostController.php";
require_once "controllers/SubCategoryController.php";
require_once "controllers/UserController.php";
require_once 'utilities/Database.php';

// Routeur 


$whoops = new Whoops\Run();
$whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();


if(isset($_GET["class"]))
{
    if(!empty($_GET["class"]))
    {
        $class = ucfirst(strtolower($_GET["class"]))."Controller";
        try {
            $c = new $class();
        } catch (Exception $e) {
            die($e->getMessage());
        }

        if(isset($_GET["action"]))
        {
            if(!empty($_GET["action"]))
            {
                $action = $_GET["action"];
                
                try {
                    $c->$action();
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }
        }else{
            $c->index();
        }
    }
}else{
   
    $c = new FrontController();
    $c->index();
}