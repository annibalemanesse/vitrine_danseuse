<?php
require_once 'utilities/Database.php';

class Contact 
{
    private $id;
    private $email;
    private $id_subject;
    private $message;

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
    
   
    public function getIdSubject()
    {
        return $this->id_subject;
    }

    /**
     * Set the value of subject
     *
     * @return  self
     */ 
    public function setIdSubject($id_subject)
    {
        $this->id_subject = $id_subject;

        return $this;
    }

    
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    public function add() {
        
        $db = new Database();

        return $db->insert(
            "INSERT INTO contact(email, `id_subject`, `message`)
            VALUE (?,?,?) ",
            [
                $this->email,
                $this->id_subject,
                $this->message
            ]
        );
    }

    public function delete()
    {
        $db= new Database();

       return $db->insert(
            "DELETE FROM contact WHERE id = ?",
            [
                $this->id
            ]
            );
    }
    public static function getAllContacts()
    {
        $db = new Database();
        return $db->getMany(
            "SELECT * FROM contact",
            'Contact'
        );
    }

    public function getContactById($id)
    {
        $db = new Database();
        return $db->getOne(
            "SELECT * FROM contact 
            WHERE id = ?",
            [$id],
            'Contact'
        );
    }

}


