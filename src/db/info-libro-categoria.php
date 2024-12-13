<?php
header('Content-Type: application/json');

require_once '../db/Database.php';

if(isset($_GET['categoria'])){
    $categoria = $_GET['categoria'];

    $db = new Database();
    $pdo = $db->getConnection();



    $sql = "SELECT * FROM libros WHERE categoria = :categoria";

    $stmt = $pdo->prepare($sql);


    $stmt->bindParam(":categoria",$categoria,PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($result){
        $response = $result;

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