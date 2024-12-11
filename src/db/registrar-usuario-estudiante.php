<?php

// header("Content-Type: application/json");
require_once "../db/Database.php";
$response =  [];
try {
   
    if($_SERVER["REQUEST_METHOD"] ==  "POST"){
        $db = new Database();
        $pdo = $db->getConnection();
        $numControl = htmlspecialchars($_POST['numero-control']);
        $nombreEstudiante = htmlspecialchars($_POST['nombre-estudiante']);
        $apellidosEstudiante = htmlspecialchars($_POST['apellidos-estudiante']);
        $correoEstudiante = htmlspecialchars($_POST['correo-estudiante']);
        $telefonoEstudiante = htmlspecialchars($_POST['telefono-estudiante']);
        $direccionEstudiante = htmlspecialchars($_POST['direccion-estudiante']);
        $carreraEstudiante = htmlspecialchars($_POST['carrera-estudiante']);
        $semestreEstudiante = htmlspecialchars($_POST['semestre-estudiante']);
        $contraseñaEstudiante = htmlspecialchars($_POST['contraseña-estudiante']);
        
        if(empty($nombreEstudiante) ||
            empty($numControl) ||
            empty($apellidosEstudiante) ||
            empty($correoEstudiante) ||
            empty($telefonoEstudiante) ||
            empty($direccionEstudiante) ||
            empty($carreraEstudiante) ||
            empty($semestreEstudiante) ||
            empty($contraseñaEstudiante) 
          
            ){

                $response['exito'] = false;
                $response['mensaje'] = 'Campos incompletos';

                echo json_encode($response);    
                exit;        
            }
        
            $sql = "INSERT INTO estudiantes (id_usuario, nombres, apellidos, correo, telefono, direccion, carrera, semestre, \"password\") 
            VALUES ('$numControl', '$nombreEstudiante', '$apellidosEstudiante', '$correoEstudiante', '$telefonoEstudiante', '$direccionEstudiante', '$carreraEstudiante', '$semestreEstudiante', crypt('$contraseñaEstudiante', gen_salt('bf')))";

            // Ejecutar la consulta SQL directamente
            $stmt = $pdo->exec($sql);


        if($stmt){
            $response['exito'] = true;
            $response['mensaje'] = 'El usuario se ha registrado al sistema';
        }else{
            $response['exito'] = false;
            $response['mensaje'] = 'No se pudo registrar al usuario';
        }
        

    }


} catch (PDOException $e) {
   
    if($e->getCode() == 23505){
        $response['exito'] = false;
        $response['mensaje'] = "Ya hay un usuario registrado con ese numero de control";
    }else{
        $response['exito'] = false;
        $response['mensaje'] = "Error inesperado: " . $e->getMessage();
    }

}

echo json_encode($response);