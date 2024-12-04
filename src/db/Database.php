<?php
    class Database{
       
        private $pdo;
        public function __construct(){
            $this->connect();
        }
        private function connect(){
            $dsn = "pgsql:host=ep-quiet-frost-a5om3mkk.us-east-2.aws.neon.tech;port=5432;dbname=neondb;sslmode=require";
            $user = "neondb_owner";
            $password = "eHsJkUPn41Wm";
            
            try{
                $this->pdo = new PDO($dsn, $user, $password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                die("Error de conexion: " . $e->getMessage());
            }
        }
        public function getConnection(){
            return $this->pdo;
        }
    }
?>