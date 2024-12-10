<?php
header("Content-Type: application/json");
require_once '../db/Database.php';

$response = [];

try{
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(!empty($_POST['numero-control'])){
            $db = new Database();
            $pdo = $db->getConnection();

            $isbn = htmlspecialchars($_POST['isbn-recomendar-libro']);
            $idUsuario = htmlspecialchars($_POST['id-profesor']);
            $numControl = htmlspecialchars($_POST['numero-control']);

            $sqlVerificarEstudiante = "SELECT EXISTS(SELECT 1 FROM estudiantes WHERE id_usuario = :numControl)";

            $stmtVerificarEstudiante = $pdo->prepare($sqlVerificarEstudiante);
            $stmtVerificarEstudiante->bindParam(':numControl',$numControl,PDO::PARAM_STR);

            $stmtVerificarEstudiante->execute(); $existeEstudiante = $stmtVerificarEstudiante->fetchColumn();

            if($existeEstudiante){
                $sql = "INSERT INTO recomendados (profesor,estudiante,libro) VALUES (:idUsuario,:numControl,:isbn)";
                $stmtSql = $pdo->prepare($sql);
                $stmtSql->bindParam(':idUsuario',$idUsuario,PDO::PARAM_STR);
                $stmtSql->bindParam(':numControl',$numControl,PDO::PARAM_STR);
                $stmtSql->bindParam(':isbn',$isbn,PDO::PARAM_STR);

                $stmtSql->execute();
                $response['exito'] = true;
                $response['mensaje'] = "Se ha recomendado el libro con exito";
            }else{
                $response['exito'] = false;
                $response['mensaje'] = "No se encontro ningun estudiante con el numero de control : $numControl";
            }
          

        }else{
            $response['exito'] = false;
            $response['mensaje'] = 'No ingresaste el numero de control';
        }
    }
}catch(PDOException $e){
    if($e->getCode() === '23505'){
        $response['exito'] = false;
        $response['mensaje'] = 'Ya haz recomendado este libro a este alumno';
    }else{
        $response['exito'] = false;
        $response['mensaje'] = 'Error inesperado: '.$e->getMessage();
    }
}

echo json_encode($response);
exit();