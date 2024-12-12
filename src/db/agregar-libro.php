<?php

header("Content-Type: application/json");
require_once "../db/Database.php";
$response =  [];
try {
   
    if($_SERVER["REQUEST_METHOD"] ==  "POST"){ 
        $db = new Database(); // CREAMOS EL OBJETO DB PARA UTILZARLO PARA LA CONEXION
        $pdo = $db->getConnection(); //CREAMOS EL OBJETO <PHP DATA OBJECTS> PARA ASI PODER TRABAJAR CON LA BASE DE DATOS

        $tituloLibro = htmlspecialchars($_POST['titulo-libro']); //OBTENEMOS LOS DATOS DEL FORMULARIO, CON SUS ATRIBUTOS NAME 
        $autorLibro = htmlspecialchars($_POST['autor-libro']);
        $isbnLibro = htmlspecialchars($_POST['isbn-libro']);
        $imagenLibro = htmlspecialchars($_POST['url-cover-libro']);
        $editorialLibro = htmlspecialchars($_POST['editorial-libro']);
        $anioPublicacionLibro = htmlspecialchars($_POST['anio-publicacion-libro']);
        $cantidadLibro = htmlspecialchars($_POST['cantidad-disponibles-libro']);
        $categoriaLibro = htmlspecialchars($_POST['categoria-libro']);
        $paginasLibro = htmlspecialchars($_POST['numero-paginas-libro']);
        $sinopsisLibro = htmlspecialchars($_POST['sinopsis-libro']);
        
        if(empty($tituloLibro) || //VERIFICAMOS QUE NINGUN CAMPO ESTE VACIO
            empty($isbnLibro) ||
            empty($imagenLibro) ||
            empty($editorialLibro) ||
            empty($anioPublicacionLibro) ||
            empty($cantidadLibro) ||
            empty($categoriaLibro) ||
            empty($paginasLibro) ||
            empty($autorLibro) ||
            empty($sinopsisLibro)){
                    //EN CASO DE QUE ESTE VACIO , DEVOLVEREMOS LA RESPUESTA
                $response['exito'] = false; //EN LA RESPUESTA , AGREGAREMOS EL CAMPO DE EXITO, COMO LOS DATOS QUE INGRESAMOS ESTAN INCOMPLETOS ESTE CAMPO SERA DE TIPO FALSE
                $response['mensaje'] = 'Campos incompletos'; //TAMBIEN DEVOLVEREMOS CON SU RESPECTIVO MENSAJE PARA SABER COMO MANEJAR EL ERROR

                echo json_encode($response);    //RETORNAREMOS LA RESPUESTA CON UN FORMATO JSON PARA ASI PODER HACER USO DE ELLA DESPUES
                exit;        
            }
        // EL SQL PARA INSERTAR EN LIBROS
        $sql = "INSERT INTO  libros (isbn,titulo,autor,editorial,cantidad,categoria,imagen,sinopsis,num_pag,anio_pub) VALUES (:isbn,:titulo,:autor,:editorial,:cantidad,:categoria,:imagen,:sinopsis,:num_pag,:anio_pub)";
            // PREPARAMOS LA SENTENCIA SQL PARA PODER AGREGARLE LOS PARAMETROS
        $stmt  = $pdo->prepare($sql);
            // EN LA SENTENCIA SQL, LE ASIGNAMOS EN EL LUGAR QUE ESTA ENTRE COMILLAS POR EJEMPLO ":isbn" EL VALOR DESARIO EN ESTE CASO $isbnLibro
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
            // SI NOS DEJA EJECUTAR LA SENTENCIA SQL SIGNIFICA QUE TODO ESTUVO BIEN
        if($stmt->execute()){
            $response['exito'] = true; // REGRESAMOS LA RESPUESTA CON UN CAMPO DE EXITO CON VALOR TRUE
            $response['mensaje'] = 'El libro se ha agregado al sistema'; // TAMBIEN REGRESAMOS UN MENSAJE QUE INDICA QUE TODO SALIO BIEN
        }else{
            $response['exito'] = false; // POR LO CONTRARIO, SI NO NOS DEJA EXECUTAR LA SENTENCIA, REGRESARESMOS UN EXITO = FALSE
            $response['mensaje'] = 'No se pudo agregar el libro'; //Y SU MENSAJE CORRESPONDIENTE
        }
        

    }


} catch (PDOException $e) {

    if($e->getCode() === "23505"){ //EN CASO DE QUE EL TRY CATCH ENCUENTRE UN ERROR, VERIFICAREMOS SI EL CODIGO DEL ERROR ES 23505, EL CUAL SIGNIFICA QUE HAY UN ERROR PORQUE YA EXISTE UN REGISTRO CON EL MISMO ISBN DE LIBRO
        $response['exito'] = false; //REGRESAMOS UNA RESPUESTA CON EXITO = FALSE
        $response['mensaje'] = "El libro ya existe en el sistema"; // Y SU DEBIDO MENSAJE
    }else{
        $response['exito'] = false; //SI NO FUERA EL CASO DE QUE EL CODIGO SEA EL 23505, SIGNIFICARIA UN ERROR DE OTRO TIPO , REGRESAMOS UN EXITO = FALSE
        $response['mensaje'] = "Error inesperado: " . $e->getMessage(); // Y SU DEBIDO MENSAJE CON EL MENSAJE INTERNO DEL ERROR

    }
}

//RETORNAMOS LA RESPUESTA CON UN FORMATO JSON
echo json_encode($response);