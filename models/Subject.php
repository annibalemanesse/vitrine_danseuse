<?php require_once 'views/header.php';
require_once 'utilities/Database.php';

class Subject {

    private $id;
    private $name;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
    public static function getSubjectById($id) {
        $db = new Database();
        return $db->getOne(
        "SELECT * FROM subject_message
        WHERE id= ?",
        [$id],
        'Subject');
    }
    public static function getAllSubjects() {
        $db = new Database();
        return $db->getMany(
        "SELECT * FROM subject_message",
        'Subject');
    }
}