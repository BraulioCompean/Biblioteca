<?php
class Database {
    private $pdo;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        // Configuración del DSN para PostgreSQL
        $dsn = "pgsql:host=ep-quiet-frost-a5om3mkk.us-east-2.aws.neon.tech;port=5432;dbname=neondb;sslmode=require";
        $user = "neondb_owner";
        // La contraseña con el endpoint incluido
        $password = "endpoint=ep-quiet-frost-a5om3mkk;eHsJkUPn41Wm";

        try {
            // Intentamos conectarnos a la base de datos con PDO
            $this->pdo = new PDO($dsn, $user, $password);
            // Configuramos el modo de error
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Si ocurre un error, lo mostramos
            die("Error de conexion: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}
?>

<?php
// Segunda parte del código para la conexión
$dsn = "pgsql:host=ep-quiet-frost-a5om3mkk.us-east-2.aws.neon.tech;port=5432;dbname=neondb;sslmode=require";
$user = "neondb_owner";
// La contraseña con el endpoint incluido
$password = "endpoint=ep-quiet-frost-a5om3mkk;eHsJkUPn41Wm";

// En este caso, no es necesario agregar opciones específicas de MySQL
$options = array(
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
);

try {
    // Intentamos establecer la conexión a PostgreSQL con PDO
    $pdo = new PDO($dsn, $user, $password, $options);
} catch (PDOException $e) {
    // Si ocurre un error, lo mostramos
    echo $e->getMessage();
    die();
}


$prueba = "XD";
?>
