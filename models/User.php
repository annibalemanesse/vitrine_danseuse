<?php 
require_once 'utilities/Database.php';

class User
{
    private $id;
    private $username;
    private $password;


    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

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
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
    public function __construct()
    {
        if(session_status() == PHP_SESSION_NONE)
        {
            session_start();
        }
        if(!array_key_exists("user", $_SESSION))
        {
            $_SESSION["user"] =[];
        }
    }
    public function login()
    {
        $_SESSION["user"] = [
            "id" => $this->id,
            "logged" => true,
            "admin" => true,
            "username" => $this->username
        ];
    }
    public function logout()
    {
        unset($_SESSION["user"]);
        
    }

    public function isLogged()
    {
        if(array_key_exists("logged" , $_SESSION["user"]))
        {
            if($_SESSION['user']["logged"])
                return true;
        }
        return false;
    }
    /**
     * Vérifie que le format du nouveau mot de passe est valide.
     */ 
    public function verif(): bool
    {
        $result = true;
        
        if(empty($this->getUsername()))
        {
            $result = false;
        }  
        
        if(empty($this->getPassword()))
        {
            $result = false;
        }else{
            if(strlen($this->getPassword())< 8)
            {
                echo 'Mot de passe trop court!';
                $result = false;
            }else{
                
                $num =0;
                $char = 0;

                for($i = 0; $i< strlen($this->getPassword()); $i++)
                {
                    if(is_numeric($this->getPassword()[$i]))
                    {
                        $num++;
                    }
                    if(is_string($this->getPassword()[$i]))
                    {
                        $char++;
                    }
                }
                if($num <2 )
                {
                    echo "tu dois saisir au moins 2 chiffres";
                    $result = false;
                }
                if($char <2 )
                {
                    echo "tu dois saisir au moins 2 caractères";
                    $result = false;
                }
            }
        }
        return $result;
    }
    public function edit()
    {
        $db = new Database();
        return $db->update(
            "UPDATE user SET username = ?, `password`=? WHERE id = ?",
            [
                $this->username,
                password_hash($this->getPassword(),PASSWORD_BCRYPT),
                $this->id
            ]
            );
    }
    public static function getByUsername($username) {
       $db= new Database();
       return $db->getOne(" SELECT * FROM user WHERE username = ?",
       [$username],
       "User"
    );
    }
    public static function getById($id){
        $db = new Database();
        return $db->getOne("SELECT * FROM user WHERE id= ?", [$id], 'User'
    );
    }
}