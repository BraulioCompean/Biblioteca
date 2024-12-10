<?php

header("Content-Type: application/json");
require_once "../db/Database.php";
$response =  [];
try {
   
    if($_SERVER["REQUEST_METHOD"] ==  "POST"){
        $db = new Database();
        $pdo = $db->getConnection();

        $isbnLibro = htmlspecialchars($_POST['isbn-libro']);

        
        $sql = "DELETE FROM  libros WHERE isbn = :isbnLibro";

        $stmt  = $pdo->prepare($sql);

        $stmt->bindParam(':isbn', $isbnLibro);
        if($stmt->execute()){
            $response['exito'] = true;
            $response['mensaje'] = 'El libro se ha eliminado del sistema';
        }else{
            $response['exito'] = false;
            $response['mensaje'] = 'El libro no se encontro o ya se ha eliminado del sistema';
        }
        

    }


} catch (PDOException $e) {
    $response['exito'] = false;
    $response['mensaje'] = 'Error inesperado: ' .$e->getMessage();
}

echo json_encode($response);