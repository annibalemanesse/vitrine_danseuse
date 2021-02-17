<?php

require_once 'utilities/Database.php';

class Newsletter
{
    private $id;
    private $email;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
    
   

    public function add() {
        
        $db = new Database();

        return $db->insert(
            "INSERT INTO newsletter(email)
            VALUE (?) ",
            [
                $this->email
            ]
        );
    }

    public function delete()
    {
        $db= new Database();

        return $db->insert(
            "DELETE FROM ophelie WHERE id = ?",
            [
                $this->id
            ]
            );
    }

}


