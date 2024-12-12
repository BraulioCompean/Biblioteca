<?php

header("Content-Type: application/json");
require_once "../db/Database.php";
$response =  [];
try {
   
    if($_SERVER["REQUEST_METHOD"] ==  "POST"){
        $db = new Database();
        $pdo = $db->getConnection();
        //Guardamos todos los campos del formulario
        $numControl = htmlspecialchars($_POST['numero-control']);
        $nombreProfesor = htmlspecialchars($_POST['nombre-profesor']);
        $apellidosProfesor = htmlspecialchars($_POST['apellidos-profesor']);
        $correoProfesor = htmlspecialchars($_POST['correo-profesor']);
        $telefonoProfesor = htmlspecialchars($_POST['telefono-profesor']);
        $direccionProfesor = htmlspecialchars($_POST['direccion-profesor']);
        $rolProfesor = htmlspecialchars($_POST['rol-profesor']);
        $departamentoProfesor = htmlspecialchars($_POST['departamento-profesor']);
        $contraseñaProfesor = htmlspecialchars($_POST['contraseña-profesor']);
        //Verificamos que ninguno este vacio
        if(empty($nombreProfesor) ||
            empty($numControl) ||
            empty($apellidosProfesor) ||
            empty($correoProfesor) ||
            empty($telefonoProfesor) ||
            empty($direccionProfesor) ||
            empty($rolProfesor) ||
            empty($departamentoProfesor) ||
            empty($contraseñaProfesor) 
          
            ){ //Si uno estuviera vacio regresamos la siguiente respuesta

                $response['exito'] = false;
                $response['mensaje'] = 'Campos incompletos';

                echo json_encode($response);    
                exit;        
            }
            //Si todos los campos estan llenos ejecutamos la siguiente instruccion sql
            $sql = "INSERT INTO profesores (id_usuario, nombres, apellidos, correo, telefono, direccion, rol, departamento, \"password\") 
            VALUES ('$numControl', '$nombreProfesor', '$apellidosProfesor', '$correoProfesor', '$telefonoProfesor', '$direccionProfesor', '$rolProfesor', '$departamentoProfesor', crypt('$contraseñaProfesor', gen_salt('bf')))";

            // Ejecutar la consulta SQL directamente
            $stmt = $pdo->exec($sql);


        if($stmt){ // SI la instruccion se pudo ejecutar, regresamos la siguiente respuesta
            $response['exito'] = true;
            $response['mensaje'] = 'El usuario se ha registrado al sistema';
        }else{ //En caso contrario, regresaremos la siguiente respuesta
            $response['exito'] = false;
            $response['mensaje'] = 'No se pudo registrar al usuario';
        }
        

    }


} catch (PDOException $e) {
    //Respuesta para los casos donde se quiera registrar un usuario ya existente en el sistema
    if($e->getCode() == 23505){
        $response['exito'] = false;
        $response['mensaje'] = "Ya hay un usuario registrado con ese numero de control";
    }else{
        $response['exito'] = false;
        $response['mensaje'] = "Error inesperado: " . $e->getMessage();
    }

}

echo json_encode($response);