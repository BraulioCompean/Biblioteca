<?php
session_start();
$_SESSION['idUsuario'] = "P0000001";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../styles/alumno/alumno-principal-page.css" />
    <title>Libreria</title>
    <link rel="icon" href="../../assets/logo1.webp" />
    <script src="../../scripts/alumno/alumno-principal-page.js" defer></script>
</head>

<body>

    <dialog class="modal" id="modal-show-book">
        <input type="hidden" id="isbn-book-modal">
        <div class="modal-content" id="modal-content-show-book">
            <section class="image-modal-book-container">
                <img
                    src="../../assets/jardinmariposas.jpg"
                    class="modal-img-book"
                    alt=""
                    id="modal-book-img" />
                <div class="modal-btns-interactive">
                    <button class="btns-modal" id="tramitar-prestamo-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-heart">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                        </svg>
                        <span>Tramitar prestamo</span>
                    </button>
                </div>
            </section>
            <section class="book-info-container">
                <div class="title-modal-container">
                    <h2>Titulo</h2>
                    <h3 id="book-title"></h3>
                </div>
                <div>
                    <h2>Autor</h2>
                    <h3 class="book-info-h3" id="book-author"> </h3>
                </div>
                <div class="editorial-modal-container">
                    <h2>Editorial</h2>
                    <h3 class="book-info-h3" id="book-editorial"></h3>
                </div>

                <div class="categories-modal-container">
                    <h2>Categoria</h2>
                    <h3 id="book-category"></h3>
                </div>
                <div class="synopsis-modal-container">
                    <h2>Sinopsis</h2>
                    <p id="book-synopsis">
                    </p>
                </div>
            </section>
        </div>
    </dialog>

    <dialog class="modal" id="modal-prestamo">
        <div class="modal-content" id="modal-content-prestamo">
            <div class="info-book-prestamo">
                <img src="" alt=""
                    id="img-book-prestamo">
                <h4 id="title-book-prestamo"></h4>
                <h5 id="author-book-prestamo"></h5>
            </div>
            <div id="data-container" style="text-align: center; justify-content: center; align-items: center; display: flex; ">
                <form action="" id="form-prestamo" method="post">
                    <input type="hidden" value="6073116330" id="isbn-prestamo-libro" name="isbn-prestamo-libro">
                    <label for="fecha-prestamo">Fecha de prestamo</label>
                    <input type="date" id="fecha-prestamo" name="fecha-prestamo" readonly>
                    <label for="fecha-esperada-entrega">Fecha esperada de entrega</label>
                    <input type="date" id="fecha-esperada-entrega-input" name="fecha-esperada-entrega" max="2025-12-31">
                    <button id="confirmar-prestamo-btn">Confirmar prestamo</button>
                </form>
                <h4 id="mensaje-resultado"></h4>
            </div>
        </div>
    </dialog>

    <aside class="aside-nav-section">
        <div class="library-title">
            <img src="../../assets/logo1.webp" alt="" id="imgL" />
            <h1>Librería</h1>
        </div>
        <nav class="nav-section">
            <ul class="nav-options-list">
                <li class="nav-element">
                    <a href="../profesor/profesor-principal-page.php">
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
                    <a href="../profesor/profesor-explorar-page.php">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-world-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M21 12a9 9 0 1 0 -9 9" /><path d="M3.6 9h16.8" /><path d="M3.6 15h7.9" /><path d="M11.5 3a17 17 0 0 0 0 18" /><path d="M12.5 3a16.984 16.984 0 0 1 2.574 8.62" /><path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M20.2 20.2l1.8 1.8" /></svg>
                        <h4>Explorar</h4>
                    </a>
                </li>
                <li class="nav-element">
                    <a href="../profesor/profesor-libreria-page.php">
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
                    <a href="../profesor/profesor-historial-prestamos-page.php">
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
                    <a href="../profesor/profesor-multas-page.php">
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
                    <a href="">
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
        <div class="navegar">
           <h1>¡Feliz de verte por aquí!</h1>
            <div class="login-section">
                <button class="login-btn" id="login-container">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    </svg>
                    <h3 class="login-link">Usuario Alumno</h3>
                </button>
            </div>
        </div>
        <div class="libreria">
            <div class="libreria-header">
                <h2>Tu libreria</h2>
                <a href="../alumno/alumno-libreria-page.php" id="see-all">
                    Ver libreria
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 6l6 6l-6 6" />
                    </svg>
                </a>

            </div>
            <div class="libreria-container">


                <?php

                require_once '../../db/Database.php';
                try {

                    $db = new Database();
                    $pdo = $db->getConnection();

                    $idUsuario = $_SESSION['idUsuario'];
                    $sql = "SELECT p.isbn,l.titulo,l.autor,l.imagen FROM prestamos p JOIN libros l ON p.isbn = l.isbn
                            WHERE p.id_estudiante = :idusuario
                            AND p.fecha_entrega IS NULL
                            LIMIT 5;
                            ";
                    $stmt = $pdo->prepare($sql);

                    $stmt->bindParam(":idusuario", $idUsuario, PDO::PARAM_STR);
                    $stmt->execute();


                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if(count($result) == 0){
                        echo '<h4>No tienes ningun libro en tu libreria</h4>';
                    }else{
                        foreach ($result as $libro) {
                            echo '<div class="book-card" id = "' . htmlspecialchars($libro['isbn']) . '">
                                <img
                                    src="' . htmlspecialchars($libro['imagen']) . '"
                                    alt=""
                                    class="img-book-card"
                                />
                                <div class="book-card-info-container">
                                    <h4 class="book-name">
                                    ' . htmlspecialchars($libro['titulo']) . '
                                    </h4>
                                    <h5>' . htmlspecialchars($libro['autor']) . '</h5>
                                </div>
                            </div>';
                        }
                    }
                    
                } catch (PDOException $e) {
                    echo '<h4>Error en la consulta: '.$e->getMessage().' </h4>';
                }
                ?>
            </div>
        </div>
    </main>

</body>

</html>