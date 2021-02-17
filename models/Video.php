<?php
require_once 'utilities/Database.php';

class Video 
{
    private $id;
    private $url;
    private $idPost;

    public function getId() {

        return $this->id;
    }

    public function getUrl() {

        return $this->url;
    }

    public function setUrl($url) {

       $search = substr( $url, 24, 8);
       $this->url = str_replace($search ,"embed/", $url);
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

    public function add() {

        $db = new Database();
        return $db->insert(
            "INSERT INTO videos(`url`, idPost) VALUES (?, ?)",
            [
                $this->url,
                $this->idPost
            ]
        );
    }

    public function delete() :bool{
        $db = new Database();
        return $db->delete(
            "DELETE FROM video WHERE id = ?",
            [$this->id]
        );
    }
    public function getVideosByIdPost($idPost) {
        $db = new Database();
        return $db->getMany(
            "SELECT * FROM `videos`
            WHERE `idPost`= ?",
            'Video',
            [$idPost]
        );
    }
}