<?php
require_once 'controllers/Controller.php';

require_once 'models/Post.php';

class PostController extends Controller 
{
    
    public function showOne() {

        $post = Post::getPostById($_GET['id']);
    }

    public function showBySubCat() {

        $subcat = SubCategory::getSubCategoryById($_GET["id"]);
        $posts= Post::getPostsBySubCategory($_GET['id_sub_cat']);
        
        
        $this->render('front/sub_category',["subcat"=>$subcat,"posts"=>$posts]);
    }

    public function addPost() {
        $u = new User();
        

        if ($u->isLogged())
        {
            if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['id_sub_cat']) && isset($_POST['valider']))
            {
                $post= new Post();

                $post->setTitle($_POST['title']);
                $post->setIdSubCat($_POST['id_sub_cat']);
                $post->setContent($_POST['content']);

                $id = $post->add();
//Ajout d'images:
                for($i=0; $i<count($_FILES["imagePath"]['name']); $i++)
                {
                    $image = new Image();
                    $image->addImage($id, $i);
                }
// Ajout de vidéos:  
                $video = new Video();
                
                $video->setUrl($_POST['video']);
                $video->setIdPost($id);
                $video->add();
                
                $this->redirectTo('user', 'index');
            }
            $this->render("admin/add_post");
        } else

        $this->render("front/index");

    }
    
    public function editPost() {
        $u=new User();
        $post = Post::getPostById($_GET['id']);
       
        
        
        if ($u->isLogged()){
            if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['valider'])){
             
                $post->setTitle($_POST['title']);
                $post->setContent($_POST['content']);

                $post->edit();

                $this->redirectTo("user","index");
            }
            $this->render("admin/edit_post",["post"=>$post]);
        } else

        $this->render("front/index");
    }

    public function deletePost(){
        $u=new User();
        
        if ($u->isLogged())
        {
            $post = Post::getPostById($_GET['id']);

            $post->delete();
            $this->redirectTo("user","index" );
        } else

        $this->render("front/index");
    }
    public function deleteImage() {
        $u = new User();

        if($u->isLogged()) {
            $image = Image::getImageById($_GET['id']);

            $image->delete();
            $this->redirectTo("user","index");


        } else $this->render("front/index");
    }
}

?>