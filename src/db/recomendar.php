<?php
header("Content-Type: application/json");
require_once '../db/Database.php';

$response = [];

try{
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(!empty($_POST['numero-control'])){ //Verificamos que el campo de numero de control no este vacio
            $db = new Database();
            $pdo = $db->getConnection();

            //Guardamos los campos del formulario
            $isbn = htmlspecialchars($_POST['isbn-recomendar-libro']);
            $idUsuario = htmlspecialchars($_POST['id-profesor']);
            $numControl = htmlspecialchars($_POST['numero-control']);

            //SQL para verificar si existe un estudiante con dicho numero de control
            $sqlVerificarEstudiante = "SELECT EXISTS(SELECT 1 FROM estudiantes WHERE id_usuario = :numControl)";

            $stmtVerificarEstudiante = $pdo->prepare($sqlVerificarEstudiante);
            $stmtVerificarEstudiante->bindParam(':numControl',$numControl,PDO::PARAM_STR);

            $stmtVerificarEstudiante->execute(); $existeEstudiante = $stmtVerificarEstudiante->fetchColumn();

            //En caso de que exista ejecutaremos el siguiente bloque de codigo
            if($existeEstudiante){
                $sql = "INSERT INTO recomendados (profesor,estudiante,libro) VALUES (:idUsuario,:numControl,:isbn)"; //SQL para insertar en la tabla de recomendados
                $stmtSql = $pdo->prepare($sql);
                $stmtSql->bindParam(':idUsuario',$idUsuario,PDO::PARAM_STR);
                $stmtSql->bindParam(':numControl',$numControl,PDO::PARAM_STR);
                $stmtSql->bindParam(':isbn',$isbn,PDO::PARAM_STR);

                $stmtSql->execute();
                //Si todo fue con exito , nuestra respuesta sera la siguiente : 
                $response['exito'] = true;
                $response['mensaje'] = "Se ha recomendado el libro con exito";
            }else{
                //Si el estudiante no existe , la respuesta sera la siguiente
                $response['exito'] = false;
                $response['mensaje'] = "No se encontro ningun estudiante con el numero de control : $numControl";
            }
          

        }else{ // Si no se escribio nada en el campo del formulario, regresar este mensaje
            $response['exito'] = false;
            $response['mensaje'] = 'No ingresaste el numero de control';
        }
    }
}catch(PDOException $e){
    //Respuesta para cuando ya hayamos recomendado dicho libro
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