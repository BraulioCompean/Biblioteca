<?php
header('Content-Type: application/json');

require_once '../db/Database.php';

if(isset($_GET['isbn'])){
    $isbn = $_GET['isbn'];

    $db = new Database();
    $pdo = $db->getConnection();



    $sql = "SELECT * FROM libros WHERE isbn = :isbn"; //Instruccion SQL para obtener toda la informacion de un libro cuando coincida con el ISBN que le pasemos

    $stmt = $pdo->prepare($sql); //Preparamos el SQL 


    $stmt->bindParam(":isbn",$isbn,PDO::PARAM_STR); //Insertamos el ISBN en la instruccion SQL
    $stmt->execute(); //Ejecutamos el SQL

    $result = $stmt->fetch(PDO::FETCH_ASSOC); 
    if($result){ // En caso de que exista un resultado, nuestra respuesta sera la siguiente
        $response = [
            'isbn' => $result['isbn'],
            'titulo' => $result['titulo'],
            'autor' => $result['autor'],
            'editorial' => $result['editorial'],
            'cantidad' => $result['cantidad'],
            'categoria'=> $result['categoria'],
            'imagen' => $result['imagen'],
            'sinopsis' => $result['sinopsis'],
            'num_pag' => $result['num_pag'],
            'anio_pub'=> $result['anio_pub']
        ];

    }else{ //De otro modo, si no hubo ningun resultado , regresaremos un error con el siguiente mensaje
        $response = [
            'error' => "No se encontro el libro"
        ];
    }
}else{
    $response = [
        'error' => "No se encontro el libro"
    ];
}

echo json_encode($response);
?>