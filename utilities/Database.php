<?php
define("DATABASE", [
    "host" => "",
    "dbname" => "site_vitrine",
    "user" => "",
    "password" => ""
]);
class Database
{
    private $cnx;
    private $lastId;
   /**
     * Get the value of lastId
     */ 
    public function getLastId()
    {
        return $this->lastId;
    }

    public function __construct()
    {
        try {
        $this->cnx = new PDO("mysql:host=" . DATABASE['host'] . ";dbname=" . DATABASE['dbname'] . ";charset=utf8", DATABASE['user'], DATABASE['password'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            }
        catch(PDOException $e)
            {
            echo "Connection failed: " . $e->getMessage();
            }
    }
    /**
     * 
     *
     * @param string $request
     * @param array $params
     * @return boolean
     */
    public function insert(string $request, array $params) : bool
    {
        $stmt = $this->cnx->prepare($request);
        $result = $stmt->execute($params);
        $this->lastId = ($this->cnx)->lastInsertId();
        return $result;
    }

    /**
     * Récupère un seul élément de la BD et le structure sous le format de la classe demandée
     *
     * @param string $request
     * @param array $params
     * @param string $class
     * @return object|bool
     */
   public function getOne(string $request, array $params, string $class) 
   {
    $stmt = $this->cnx->prepare($request);
    $stmt->execute($params);
    
    $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
    $result = $stmt->fetch();
    
     return $result;
   }

   /**
    * Récupère plusieurs éléments de la BDD
    * Dans un tableau d'objets
    *
    * @param string $request
    * @param array $params
    * @param string $class
    * @return array|bool
    */
   public function getMany(string $request, string $class, array $params = []) 
   {
    $stmt = $this->cnx->prepare($request);
    $stmt->execute($params);
       return $stmt->fetchAll(PDO::FETCH_CLASS, $class);
   }

   /**
    * Supprime une ou plusieurs lignes de la BDD
    *
    * @param string $request
    * @param array $params
    * @return boolean
    */
   public function delete(string $request, array $params) : bool
   {
       $stmt = $this->cnx->prepare($request);
       $result = $stmt->execute($params);
       return $result;
   }
   
   /**
    * Mettre à jour une ligne dans la BDD
    *
    * @param string $request
    * @param array $params
    * @return boolean
    */
   public function update(string $request, array $params) : bool
   {
       $stmt = $this->cnx->prepare($request);
       $result = $stmt->execute($params);
       return $result;
   }

   public function __destruct()
   {
       $this->cnx = null;
    
   }
}
