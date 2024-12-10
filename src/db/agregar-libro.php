<?php

header("Content-Type: application/json");
require_once "../db/Database.php";
$response =  [];
try {
   
    if($_SERVER["REQUESTED_METHOD"] ==  "POST"){
        $db = new Database();
        $pdo = $db->getConnection();

        $tituloLibro = htmlspecialchars($_POST['titulo-libro']);
        $autorLibro = htmlspecialchars($_POST['autor-libro']);
        $isbnLibro = htmlspecialchars($_POST['isbn-libro']);
        $imagenLibro = htmlspecialchars($_POST['url-cover-libro']);
        $editorialLibro = htmlspecialchars($_POST['editorial-libro']);
        $anioPublicacionLibro = htmlspecialchars($_POST['anio-publicacion-libro']);
        $cantidadLibro = htmlspecialchars($_POST['cantidad-disponibles-libro']);
        $categoriaLibro = htmlspecialchars($_POST['categoria-libro']);
        $paginasLibro = htmlspecialchars($_POST['numero-paginas-libro']);
        $sinopsisLibro = htmlspecialchars($_POST['sinopsis-libro']);

        
        $sql = "INSERT INTO  libros (isbn,titulo,autor,editorial,cantidad,categoria,imagen,sinopsis,num_pag,anio_pub) VALUES (:isbn,:titulo,:autor,:editorial,:cantidad,:categoria,:imagen,:sinopsis,:num_pag,:anio_pub)";

        $stmt  = $pdo->prepare($sql);

        $stmt->bindParam(':isbn', $isbnLibro);
        $stmt->bindParam(':titulo', $tituloLibro);
        $stmt->bindParam(':autor', $autorLibro);
        $stmt->bindParam(':editorial', $editorialLibro);
        $stmt->bindParam(':cantidad', $cantidadLibro);
        $stmt->bindParam(':categoria', $categoriaLibro);    
        $stmt->bindParam(':imagen', $imagenLibro);
        $stmt->bindParam(':sinopsis', $sinopsisLibro);
        $stmt->bindParam(':num_pag', $paginasLibro);
        $stmt->bindParam(':anio_pub', $anioPublicacionLibro);

        if($stmt->execute()){
            $response['exito'] = true;
            $response['mensaje'] = 'El libro se ha agregado al sistema';
        }else{
            $response['exito'] = false;
            $response['mensaje'] = 'El libro ya existe en el sistema';
        }
        

    }


} catch (PDOException $e) {
    $response['exito'] = false;
    $response['mensaje'] = "Error inesperado: " . $e->getMessage();
}

echo json_encode($response);