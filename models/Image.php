<?php
require_once 'utilities/Database.php';

class Image
{
    private $id;
    private $path;
    private $idPost;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
    return $this->id;
    }


    /**
     * Get the value of path
     */ 
    public function getPath()
    {
    return $this->path;
    }

    /**
     * Set the value of path
     *
     * @return  self
     */ 
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    
    /**
     * Get the value of idPost
     */ 
    public function getIdPost()
    {
        return $this->idPost;
    }

    /**
     * Set the value of idPost
     *
     * @return  self
     */ 
    public function setIdPost($idPost)
    {
        $this->idPost = $idPost;

        return $this;
    }

    private function add (){
        $db = new Database();
        return $db->insert(
            "INSERT INTO `images` (`path`, idPost) VALUES (?, ?)",
            [
                $this->path,
                $this->idPost
            ]
        );
    }
    public function delete() {
        $db = new Database();
        return $db->delete(
            "DELETE FROM `images` WHERE id = ?",
            [$this->id]
        );
    }
    public function addImage($idPost,$key){
        $unid = "";
        $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["imagePath"]["name"][$key]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        
            $check = getimagesize($_FILES["imagePath"]["tmp_name"][$key]);
            if($check !== false) {
                
                $uploadOk = 1;
            } else {
                echo "Le fichier n'est pas une image";
                $uploadOk = 0;
            }
        
        // Check if file already exists
        if (file_exists($target_file)) {
            $unid = uniqid();
            $target_file = $target_dir .$unid. basename($_FILES["imagePath"]["name"][$key]);
            $uploadOk = 1;
        }
        
        //Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Seulement les formats JPG, JPEG, PNG & GIF sont autorisés.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Le fichier n'a pas pu être téléchargé";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["imagePath"]["tmp_name"][$key], $target_file)) {
               
                $this->path = $unid.basename($_FILES["imagePath"]["name"][$key]);
                $this->idPost = $idPost;
                $this->add();

                //Création d'images miniatures
                $image = new \Gumlet\ImageResize($target_file);
                $image->scale(30);
                $image->save("img/mini/".$_FILES["imagePath"]["name"][$key]);
            }
        }   
    }
    public function getImageById($id) {
        $db = new Database();
        return $db->getOne(
            "SELECT * FROM `images`
            WHERE id= ?",
            [$id],
            'Image'
        );
    }
    public static function getImagesByIdPost($idPost) {
        $db = new Database();
        return $db->getMany(
            "SELECT * FROM `images`
            WHERE `idPost`= ?",
            'Image',
            [$idPost]
        );
    }

}