<?php
header('Content-Type: application/json');
require_once '../db/Database.php';
$response = [];



try {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(!empty($_POST['fecha-esperada-entrega'])){
            
            $db = new Database();
            $pdo = $db->getConnection();
            //Guardamos los campos que nos llegan del formulario
            $isbn = htmlspecialchars($_POST['isbn-prestamo-libro']);
            $fecha_devolucion = htmlspecialchars($_POST['fecha-esperada-entrega']);
            $idUsuario = htmlspecialchars($_POST['id-usuario-prestamo-libro']);
            //SQL para verificar si el usuario es un estudiante
            $sqlVerificarEstudiante = "SELECT id_usuario FROM estudiantes WHERE id_usuario = :idUsuario";
            $stmtVerificarEstudiante = $pdo->prepare($sqlVerificarEstudiante);
            $stmtVerificarEstudiante->bindParam(':idUsuario',$idUsuario,PDO::PARAM_STR);
            $stmtVerificarEstudiante->execute();
    
    
            $esEstudiante = $stmtVerificarEstudiante->fetch(PDO::FETCH_ASSOC);
    
            //SQL para verificar si el usuario es un profesor
            $sqlVerificarProfesor = "SELECT id_usuario FROM profesores WHERE id_usuario = :idUsuario";
            $stmtVerificarProfesor = $pdo->prepare($sqlVerificarProfesor);
            $stmtVerificarProfesor->bindParam(':idUsuario',$idUsuario,PDO::PARAM_STR);
            $stmtVerificarProfesor->execute();
    

            $esProfesor = $stmtVerificarProfesor->fetch(PDO::FETCH_ASSOC);
            
            //SQL para verificar la cantidad de ese libro a tramitar
            $sqlCantidad = "SELECT cantidad FROM libros WHERE isbn = :isbn";
            $stmt_cantidad = $pdo->prepare($sqlCantidad);
            $stmt_cantidad->bindParam(":isbn", $isbn, PDO::PARAM_STR);
            
            $stmt_cantidad->execute();
    
            $resultadoCantidad = $stmt_cantidad->fetch(PDO::FETCH_ASSOC);
            //Verificamos que existe una cantidad
            if ($resultadoCantidad) {
                $cantidad = $resultadoCantidad['cantidad'];

                //Verificamos que la cantidad de libros es mayor a 0, por lo tanto podemos obtener uno prestado
                if ($cantidad > 0) {
                    $pdo->beginTransaction();
                    $sqlInsertPrestamo = "";
                    $stmtInsertPrestamo = null;
                    if($esEstudiante){//Verificamos si el usuario es un estudiante
                        //SQL para insertar el prestamo 
                        $sqlInsertPrestamo = "INSERT INTO prestamos (isbn,id_estudiante,fecha_prestamo,fecha_devolucion) VALUES (:isbn,:id_estudiante,CURRENT_DATE,:fecha_devolucion)";
                        $stmtInsertPrestamo = $pdo->prepare($sqlInsertPrestamo);
                        $stmtInsertPrestamo->bindParam(':isbn', $isbn);
                        $stmtInsertPrestamo->bindParam(':id_estudiante', $idUsuario);
                        $stmtInsertPrestamo->bindParam(':fecha_devolucion', $fecha_devolucion);
                        
                    }elseif($esProfesor){//Verificamos si el usuario es un profesor
                        //SQL para insertar el prestamo
                        $sqlInsertPrestamo = "INSERT INTO prestamos (isbn,id_profesor,fecha_prestamo,fecha_devolucion) VALUES (:isbn,:id_profesor,CURRENT_DATE,:fecha_devolucion)";
                        $stmtInsertPrestamo = $pdo->prepare($sqlInsertPrestamo);
                        $stmtInsertPrestamo->bindParam(':isbn', $isbn);
                        $stmtInsertPrestamo->bindParam(':id_profesor', $idUsuario);
                        $stmtInsertPrestamo->bindParam(':fecha_devolucion', $fecha_devolucion);
                    }
    
                    $stmtInsertPrestamo->execute();
                    
                    //Actualizamos la cantidad de ese libro, restandole - 1 cuando se haya completado el prestamo
                    $sqlUpdateLibroCantidad = "UPDATE libros SET cantidad = cantidad - 1 WHERE isbn = :isbn AND cantidad > 0";
                    $stmtUpdateLibroCantidad = $pdo->prepare($sqlUpdateLibroCantidad);
                    $stmtUpdateLibroCantidad->bindParam(':isbn', $isbn, PDO::PARAM_STR);
    
                    $stmtUpdateLibroCantidad->execute();
                    $pdo->commit();
                    //Si todo estuvo bien, retornaremos el siguiente mensaje
                    $response['exito'] = true;
                    $response['mensaje'] = 'El prestamo se ha realizado con exito';
                } else {
                    //Si la cantidad de ese libro es < 0 , retornaremos el sigueinte mensaje
                    $response['exito'] = false;
                    $response['error'] = 'No quedan mas existencias de este libro,intentalo mas tarde';
                }
            } else {
                $response['exito'] = false;
                $response['error'] = 'No se encontro el libro';
            }
        }else{ //Si los datos en el formulario no se llenaron , regresar el siguiente mensaje
            $response['exito'] = false;
            $response['error'] = 'Ingresa los correctamente los datos';
        }
    }
} catch (PDOException $e) {
    //Catcheo de excepcion en caso de que ya tengamos un prestamo activo de ese libro
    if($e->getCode() === '23505'){ //El codigo para esta clase de excepciones es 23505
        $response['exito'] = false;
        $response['error'] = 'Ya tienes un prestamo activo de este libro';
    }else{
        $response['exito'] = false;
        $repsonse['error'] = 'Error inesperado: ' . $e->getMessage();
    }
}
echo json_encode($response);
