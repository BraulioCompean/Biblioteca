<?php
header('Content-Type: application/json');

require_once '../db/Database.php';
$response = [];
try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $db = new Database(); //CREAMOS EL OBJETO DB DE LA CLASE DATABASE
        $pdo = $db->getConnection(); // USAMOS LA FUNCION GETCONNECTION() DE LA CLASE DATABASE PARA CREAR NUESTRA VARIABLE PDO
        // RECIBIMOS LOS CAMPOS DEL FORMULARIO DEVOLVER LIBRO
        $isbn = htmlspecialchars($_POST['isbn-devolver-libro']);
        $idUsuario = htmlspecialchars($_POST['id-usuario-devolver-libro']);
        //VERIFICAMOS QUE EXISTA UN REGISTRO EN PRESTAMOS DE ESE LIBRO Y QUE SE ENCUENTRE ACTIVO
        $sqlVerificarPrestamo = "SELECT EXISTS(SELECT 1 FROM prestamos WHERE isbn  = :isbn AND (id_estudiante = :idUsuario OR id_profesor = :idUsuario) AND fecha_entrega IS NULL) AS existe";
        
        //PREPARAMOS EL SQL CON LA FUNCION PREPARE DE PDO
        $stmtVerificarPrestamo = $pdo->prepare($sqlVerificarPrestamo);
        $stmtVerificarPrestamo->bindParam(':isbn',$isbn,PDO::PARAM_STR); //INSERTAMOS EN LOS ESPACIOS RESERVADOS EN EL SQL, LOS VALORES DEL FORMULARIO
        $stmtVerificarPrestamo->bindParam(':idUsuario', $idUsuario, PDO::PARAM_STR);
        $stmtVerificarPrestamo->execute(); //EJECUTAMOS EL SQL
        //VERIFICAMOS  QUE EL RESULTADO EXISTE
        $resultVerificarPrestamo = $stmtVerificarPrestamo->fetch(PDO::FETCH_ASSOC);
        
        if ($resultVerificarPrestamo['existe'] == 1) {
    
            try {
              
                //SQL EN CASO DE QUE EL PRESTAMO EXISTA Y ESTE ACTIVO 
                $sqlUpdatePrestamo = "UPDATE prestamos SET  fecha_entrega = CURRENT_DATE  WHERE isbn = :isbn AND (id_estudiante = :idUsuario OR id_profesor = :idUsuario)";
                $stmtUpdatePrestamo = $pdo->prepare($sqlUpdatePrestamo); //PREPARAMOS EL SQL
                $stmtUpdatePrestamo->bindParam(':isbn', $isbn); //INSERTAMOS LOS DATOS EN LOS ESPACIOS RESERVADOS CON LOS DATOS DEL FORMULARIO
                $stmtUpdatePrestamo->bindParam(':idUsuario', $idUsuario);
                
                $stmtUpdatePrestamo->execute(); //EXECUTAMOS EL SQL


                if ($stmtUpdatePrestamo->rowCount() > 0) {
                    //EN CASO DE QUE LA EJECUCION DEL SQL SE COMPLETE, EN LA TABLA LIBROS AGREGAREMOS +1 A LA CANTIDAD DEL LIRO, INDICANDO QUE SE HA DEVUELVTO
                    $sqlUpdateCantidad = "UPDATE libros SET cantidad = cantidad + 1 WHERE isbn  = :isbn";
                    $stmtUpdateCantidad = $pdo->prepare($sqlUpdateCantidad);

                    $stmtUpdateCantidad->bindParam(':isbn',$isbn,PDO::PARAM_STR);
                    $stmtUpdateCantidad->execute();
                    
                    $response['exito'] = true; //DEVOLVEMOS UN EXITO CON VALOR DE TRUE
                    $response['mensaje'] = 'Libro devuelto con exito.'; // Y SU RESPECTIVO MENSAJE DE EXITO
                } else {
                    $response['exito'] = false; //EN CASO DE QUE NO SE HAYA ACTUALIZADO NINGUN PRESTAMO CON EL SQL, REGRESARENOS UNA RESPUESTA CON EXITO = FALSE
                    $response['mensaje'] = 'No se encontro el registro del prestamo al intentar actualizarlo.'; // Y SU RESPECTIVO MENSAJE
                }
            } catch (PDOException $e) { //ATRAPAMOS ERRORES DE TIPO PDOException Y REGRESAMOS UNA RESPUESTA
                $response['exito'] = false;
                $response['mensaje'] = 'Error al devolver el prestamo.';
                echo "Error " . $e->getMessage();
            }
        } else { //EN CASO DE QUE EL REGISTRO DEL PRESTAMO NO EXISTA O YA FUESE DEVUELTO , REGRESAREMOS ESTA RESPUESTA
            $response['exito'] = false;
            $response['mensaje'] = "El prestamo no existe o ya fue devuelto.";
        }
    }
} catch (PDOException $e) { // PARA OTRA CLASE DE ERRORES REGRESAREMOS ESTA RESPUESTA
    $response['exito'] = false;
    $response['mensaje'] = 'Error inesperado: ' . $e->getMessage();
    // echo "Error " . $e->getMessage();

}

echo json_encode($response);
