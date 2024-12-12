<?php

header("Content-Type: application/json");
require_once "../db/Database.php";
$response =  [];
try {
   
    if($_SERVER["REQUEST_METHOD"] ==  "POST"){
        $db = new Database();
        $pdo = $db->getConnection();

        $isbnLibro = htmlspecialchars($_POST['isbn-libro']);

        
        $sql = "DELETE FROM  libros WHERE isbn = :isbnLibro"; //SQL PARA BORRAR EL LIBRO

        $stmt  = $pdo->prepare($sql); //PREPARAMOS EL SQL

        $stmt->bindParam(':isbn', $isbnLibro); //INSERTAMOS LOS DATOS EN  EL SQL
        if($stmt->execute()){ //SI NOS EJECUTA EL SQL MANDAREMOS UNA RESPUESTA DE EXITO
            $response['exito'] = true;
            $response['mensaje'] = 'El libro se ha eliminado del sistema';
        }else{
            //SI NO SE EJECUTA MANDAREMOS UNA RESPUESTA DE QUE FALLO
            $response['exito'] = false;
            $response['mensaje'] = 'El libro no se encontro o ya se ha eliminado del sistema';
        }
        

    }


} catch (PDOException $e) { //PARA OTRA CLASE  DE ERRORES QUE ATRAPE EL TRY CATCH , RETORNAREMOS ESTA RESPUESTA
    $response['exito'] = false;
    $response['mensaje'] = 'Error inesperado: ' .$e->getMessage();
}

echo json_encode($response);