<?php
class Database{

    private $servername;
    private $username;
    private $password;
    private $nomdb;
    public $database; 

    public function __construct() {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "Papaf@ll21";
        $this->nomdb = "gestionContact";
        try {
            $database = new PDO("mysql:host=$this->servername;dbname=$this->nomdb", $this->username, $this->password);
            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->database = $database;
            // echo 'connexion okiii';
        } catch (PDOException $e) {
            echo "Échec : " . $e->getMessage();
        }
    }

}

$connect = new Database(); 
$database = $connect->database;

?>