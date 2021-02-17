<?php
require_once 'utilities/Database.php';


class SubCategory
{
    private $id;
    private $nom;
    private $id_category;
    private $description;
    

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

    /**
     * Get the value of id_category
     */ 
    public function getIdCategory()
    {
        return $this->id_category;
    }

    /**
     * Set the value of id_category
     *
     * @return  self
     */ 
    public function setIdCategory($id_category)
    {
        $this->id_category = $id_category;

        return $this;
    }
/**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
    
    

    public function add(){
        $db = new Database();
        return $db->insert(
            "INSERT INTO sub_category (`nom`, id_category,`description` ) VALUES (?,?,?)",
            [
                $this->nom,
                $this->id_category,
                $this->description
            ]
            );
    }

    public function edit(){
        $db = new Database();
        return $db->update(
            "UPDATE sub_category
            SET `nom` = ?, id_category = ?, `description` = ?
            WHERE id LIKE ?",
            [
                $this->nom,
                $this->id_category,
                $this->description,
                $this->id
            ]
        );
    }
    public function getSubCategoryById($id){
        $db =new Database();
        return $db->getOne(
            "SELECT * FROM sub_category WHERE id = ?",
            [$id],
            "SubCategory"
        );
    }
    public function getSubCategoriesByIdCategory($id_category) {
        $db =new Database();
        return $db->getMany(
            "SELECT * FROM sub_category WHERE id_category = ?",
            "SubCategory",
            [$id_category]
        );
    }
    public function delete() :bool{
        $db = new Database();
        return $db->delete(
            "DELETE FROM sub_category WHERE id = ?",
            [$this->id]
        );
    }
    public static function getAllSubCategories(){
        $db =new Database();
        return $db->getMany(
            "SELECT * FROM sub_category",
            "SubCategory"
        );
    }
    

}
    


 