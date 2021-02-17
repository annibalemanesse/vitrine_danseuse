<?php 
require_once 'utilities/Database.php';

class Post 
{
    private $id;
    private $id_sub_cat;
    private $title;
    private $content;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
/**
     * Get the value of id_sub_cat
     */ 
    public function getIdSubCat()
    {
        return $this->id_sub_cat;
    }

    /**
     * Set the value of id_sub_cat
     *
     * @return  self
     */ 
    public function setIdSubCat($id_sub_cat)
    {
        $this->id_sub_cat = $id_sub_cat;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }
    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    public function add(){
        $db = new Database();
        $db->insert(
            "INSERT INTO post (id_sub_cat, title, content) VALUES (?, ? , ?)",
            [
                $this->id_sub_cat,
                $this->title,
                $this->content,
            ]
            );
        return $db->getLastId();
    }

    public function edit(){
        $db = new Database();
        return $db->update(
            "UPDATE post
            SET title = ?, content = ?
            WHERE id LIKE ?",
            [
                $this->title,
                $this->content,

                $this->id
            ]
        );
    }
    
    public function delete() :bool{
        $db = new Database();
        return $db->delete(
            "DELETE FROM post WHERE id = ?",
            [$this->id]
        );
    }
    public static function getPostById($id){
        $db =new Database();
        return $db->getOne(
            "SELECT * FROM post WHERE id = ?",
            [$id],
            "Post"
        );
    }
    public static function getPostsBySubCategory($id_sub_cat) : array{
        $db =new Database();
        return $db->getMany(
            "SELECT * FROM post WHERE id_sub_cat = ?",
            "Post",
            [$id_sub_cat]
        );
    }
    public static function gettAllPosts() {
        $db = new Database();
        return $db->getMany(
            "SELECT * FROM post",
            "Post"
        );
    }

}