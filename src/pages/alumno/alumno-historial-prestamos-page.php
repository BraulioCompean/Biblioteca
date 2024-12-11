<?php include '../sesion.php'; ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta
        name="viewport"
        content="width=
    , initial-scale=1.0" />
    <link rel="stylesheet" href="../../styles/alumno/alumno-historial-prestamos-page.css" />
    <title>Historial de Prestamos</title>
</head>

<body>
    <aside class="aside-nav-section">
        <div class="library-title">
            <img src="../../assets/logo1.webp" alt="" id="imgL" />
            <h1>Biblioteca</h1>
        </div>
        <nav class="nav-section">
            <ul class="nav-options-list">
                <li class="nav-element">
                    <a href="../alumno/alumno-principal-page.php">
                        <svg id="home-svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-home">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                        </svg>
                        <h4>Home</h4>
                    </a>
                </li>
                <li class="nav-element">
                    <a href="../alumno/alumno-explorar-page.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-world-search">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M21 12a9 9 0 1 0 -9 9" />
                            <path d="M3.6 9h16.8" />
                            <path d="M3.6 15h7.9" />
                            <path d="M11.5 3a17 17 0 0 0 0 18" />
                            <path d="M12.5 3a16.984 16.984 0 0 1 2.574 8.62" />
                            <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                            <path d="M20.2 20.2l1.8 1.8" />
                        </svg>
                        <h4>Explorar</h4>
                    </a>
                </li>
                <li class="nav-element">
                    <a href="../alumno/alumno-libreria-page.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-book">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                            <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                            <path d="M3 6l0 13" />
                            <path d="M12 6l0 13" />
                            <path d="M21 6l0 13" />
                        </svg>
                        <h4>Mi libreria</h4>
                    </a>
                </li>
                <li class="nav-element">
                    <a href="../alumno/alumno-recomendados-page.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-star">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                        </svg>
                        <h4>Recomendados</h4>
                    </a>
                </li>
                <li class="nav-element">
                    <a href="../alumno/alumno-historial-prestamos-page.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-building-bank">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 21l18 0" />
                            <path d="M3 10l18 0" />
                            <path d="M5 6l7 -3l7 3" />
                            <path d="M4 10l0 11" />
                            <path d="M20 10l0 11" />
                            <path d="M8 14l0 3" />
                            <path d="M12 14l0 3" />
                            <path d="M16 14l0 3" />
                        </svg>
                        <h4>Prestamos</h4>
                    </a>
                </li>
                <li class="nav-element">
                    <a href="../alumno/alumno-multas-page.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-ticket">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M15 5l0 2" />
                            <path d="M15 11l0 2" />
                            <path d="M15 17l0 2" />
                            <path d="M5 5h14a2 2 0 0 1 2 2v3a2 2 0 0 0 0 4v3a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-3a2 2 0 0 0 0 -4v-3a2 2 0 0 1 2 -2" />
                        </svg>
                        <h4>Multas</h4>
                    </a>
                </li>
            </ul>
            <hr />
            <ul class="user-menu">
                <li class="nav-element">
                    <a href="../alumno/alumno-perfil-page.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                        </svg>
                        <h4>Perfil</h4>
                    </a>
                </li>
                <li class="nav-element">
                    <a href="../login.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-logout-2">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2" />
                            <path d="M15 12h-12l3 -3" />
                            <path d="M6 15l-3 -3" />
                        </svg>
                        <h4>Cerrar Sesión</h4>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>
    <main>
        <section class="prestamos-historial">
            <header class="header-prestamos">
                <h1>Historial de Prestamos</h1>
            </header>
            <div class="prestamos-container">
                <?php

                        require_once '../../db/Database.php';
                        $db = new Database();
                        $pdo = $db->getConnection();


                        $idUsuario = $_SESSION['idUsuario'];

                        $sqlPrestamos = "SELECT libros.titulo ,libros.autor , prestamos.fecha_prestamo , prestamos.fecha_devolucion,prestamos.fecha_entrega FROM prestamos JOIN libros ON prestamos.isbn = libros.isbn WHERE prestamos.id_estudiante = :idUsuario ORDER BY prestamos.fecha_prestamo DESC ";
                        $stmt_prestamos = $pdo->prepare($sqlPrestamos);
                        $stmt_prestamos->bindParam(":idUsuario", $idUsuario, PDO::PARAM_STR);
                        $stmt_prestamos->execute();
                        $prestamos = $stmt_prestamos->fetchAll(PDO::FETCH_ASSOC);
                        $fecha = date('Y-m-d');
                        if (count($prestamos) > 0) {    
                            foreach($prestamos as $prestamo){
                                $estadoPrestamo = 'Devuelto';
                                if ($prestamo['fecha_entrega'] === null) {
                                    if (strtotime($prestamo['fecha_devolucion']) < strtotime($fecha)) {
                                        $estadoPrestamo = 'Vencido';
                                    } else {
                                        $estadoPrestamo = 'Activo';
                                    }
                                }
                                echo ' <div class="prestamo-card ' . $estadoPrestamo . '">
                                            <div class="info-prestamo-libro">
                                                <h3>"'.$prestamo['titulo'].'" de '.$prestamo['autor'].'</h3>
                                            </div>
                                        
                                            <div class="info-prestamo-container">
                                                <div class="estado-prestamo-container">
                                                    <h5 id="estado-prestamo">Estado : '.$estadoPrestamo.'</h5>
                                                </div>
                                                <div>
                                                    <h5 id="fecha-prestamo">Fecha de prestamo : '.$prestamo['fecha_prestamo'].'</h5>
                                                </div>
                                                <div>
                                                    <h5 id="fecha-vencimiento">Fecha de vencimiento : '.$prestamo['fecha_devolucion'].' </h5>
                                                </div>
                                                <div>
                                                    <h5 id="fecha-devolucion">Fecha de devolucion : '.($prestamo['fecha_entrega'] ? htmlspecialchars($prestamo['fecha_entrega']) : 'Pendiente').'</h5>
                                                </div>
                                            </div>
                                        </div>';
                            }
                        }else{
                            echo '<h4> No tienes prestamos registrados </h4>';
                        }

                        ?> 
            </div>
        </section>


    </main>
</body>

</html>