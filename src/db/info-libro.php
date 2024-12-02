<?php
header('Content-Type: application/json');

require_once '../db/Database.php';

if(isset($_GET['isbn'])){
    $isbn = $_GET['isbn'];

    $db = new Database();
    $pdo = $db->getConnection();



    $sql = "SELECT * FROM libros WHERE isbn = :isbn";

    $stmt = $pdo->prepare($sql);


    $stmt->bindParam(":isbn",$isbn,PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result){
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

    }else{
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