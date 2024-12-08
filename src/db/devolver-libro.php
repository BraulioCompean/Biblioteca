<?php
header('Content-Type: application/json');

require_once '../db/Database.php';
$response = [];
try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $db = new Database();
        $pdo = $db->getConnection();
    
        $isbn = htmlspecialchars($_POST['isbn-devolver-libro']);
        $idUsuario = htmlspecialchars($_POST['id-usuario-devolver-libro']);
    
        $sqlVerificarPrestamo = "SELECT EXISTS(SELECT 1 FROM prestamos WHERE isbn  = :isbn AND (id_estudiante = :idUsuario OR id_profesor = :idUsuario) AND fecha_entrega IS NULL) AS existe";
    
        $stmtVerificarPrestamo = $pdo->prepare($sqlVerificarPrestamo);
        $stmtVerificarPrestamo->bindParam(':isbn',$isbn,PDO::PARAM_STR);
        $stmtVerificarPrestamo->bindParam(':idUsuario', $idUsuario, PDO::PARAM_STR);
        $stmtVerificarPrestamo->execute();
    
        $resultVerificarPrestamo = $stmtVerificarPrestamo->fetch(PDO::FETCH_ASSOC);
        
        if ($resultVerificarPrestamo['existe'] == 1) {
    
            try {
    
                $sqlUpdatePrestamo = "UPDATE prestamos SET  fecha_entrega = CURRENT_DATE  WHERE isbn = :isbn AND (id_estudiante = :idUsuario OR id_profesor = :idUsuario)";
                $stmtUpdatePrestamo = $pdo->prepare($sqlUpdatePrestamo);
                $stmtUpdatePrestamo->bindParam(':isbn', $isbn);
                $stmtUpdatePrestamo->bindParam(':idUsuario', $idUsuario);
                
                $stmtUpdatePrestamo->execute();
                if ($stmtUpdatePrestamo->rowCount() > 0) {
    
                    $response['exito'] = true;
                    $response['mensaje'] = 'Libro devuelto con exito.';
                } else {
                    $response['exito'] = false;
                    $response['mensaje'] = 'No se encontro el registro del prestamo al intentar actualizarlo.';
                }
            } catch (PDOException $e) {
                $response['exito'] = false;
                $response['mensaje'] = 'Error al devolver el prestamo.';
                echo "Error " . $e->getMessage();
            }
        } else {
            $response['exito'] = false;
            $response['mensaje'] = "El prestamo no existe o ya fue devuelto.";
        }
    }
} catch (PDOException $e) {
    $response['exito'] = false;
    $response['mensaje'] = 'Error inesperado: ' . $e->getMessage();
    // echo "Error " . $e->getMessage();

}

echo json_encode($response);
