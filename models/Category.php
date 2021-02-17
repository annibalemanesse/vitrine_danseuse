<?php
require_once 'utilities/Database.php';
class Category
{
    private $id;
    private $nom;

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }


    public function add(){
        $db = new Database();
        return $db->insert(
            "INSERT INTO category (`nom`) VALUES (?)",
            [
                $this->nom
            ]
            );
    }

    public function edit(){
        $db = new Database();
        return $db->update(
            "UPDATE category
            SET `nom` = ?
            WHERE id LIKE ?",
            [
                $this->nom,
                $this->id
            ]
        );
    }
    public static function getCategoryById($id){
        $db =new Database();
        return $db->getOne(
            "SELECT * FROM category WHERE id = ?",
            [$id],
            "Category"
        );
    }

    public function delete() :bool{
        $db = new Database();
        return $db->delete(
            "DELETE FROM category WHERE id = ?",
            [$this->id]
        );
    }
    public function getAllCategories(){
        $db =new Database();
        return $db->getMany(
            "SELECT * FROM category",
            "Category"
        );
    }
}
    


 