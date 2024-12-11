<?php
class Database {
    private $pdo;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        // $dsn = "pgsql:host=ep-quiet-frost-a5om3mkk.us-east-2.aws.neon.tech;port=5432;dbname=neondb;sslmode=require";
        $dsn = "postgresql://neondb_owner:eHsJkUPn41Wm@ep-quiet-frost-a5om3mkk.us-east-2.aws.neon.tech/neondb?sslmode=require&options=endpoint%3Dep-quiet-frost-a5om3mkk";
        $user = "neondb_owner";
        $password = "eHsJkUPn41Wm";

        try {
            $this->pdo = new PDO($dsn, $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexion: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}
?>
<?php
$dsn = "pgsql:host=ep-quiet-frost-a5om3mkk.us-east-2.aws.neon.tech;port=5432;dbname=neondb;sslmode=require";
$username = "neondb_owner";
$password = "eHsJkUPn41Wm";
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'",
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
);

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}