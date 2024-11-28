<?php

class conexion {
    private $dsn;
    private $user;
    private $password;
    private $pdo;


    public function __construct(){
        $this->dsn = "pgsql:host=ep-quiet-frost-a5om3mkk.us-east-2.aws.neon.tech;port=5432;dbname=neondb;sslmode=require";
        $this->user = "neondb_owner" ;
        $this->password =  "eHsJkUPn41Wm";
    }



    public function connect(){
        if($this->pdo === null){
            try{
                $this->pdo = new PDO($this->dsn,$this->user,$this->password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                echo "Conexion exitosa a Neon";
            }catch (PDOException $e){
                echo "Error de conexion: ". $e->getMessage();
            }
        }
        return $this->pdo;
    }
}
?>
