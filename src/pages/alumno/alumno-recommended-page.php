<?php
session_start();
$_SESSION['idUsuario'] = "00000001";
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta
        name="viewport"
        content="width=
    , initial-scale=1.0" />
    <link rel="stylesheet" href="../../styles/alumno/alumno-recommended-page.css" />
    <title>Libros Recomendados</title>
    <script src="../../scripts/alumno/alumno-recommended-page.js" defer></script>
</head>

<body>


    <!-- VENTANAS MODAL -->
<!-- ---------------------------------------------------------------- -->

        
    <!-- ---------------------------------------------------------------- -->
        <!-- MODAL MOSTRAR LIBRO -->
    <!-- ---------------------------------------------------------------- -->


        <dialog class="modal" id="modal-libro">
            
            <input type="hidden" id="isbn-modal-mostrar-libro">

            <div class="modal-content" id="modal-content-mostrar-libro">
                <section>
                    <img
                        src="../../assets/jardinmariposas.jpg"
                        class="modal-img-libro"
                        alt=""
                        id="modal-img-libro" />
                    <div class="modal-btns-interactive">
                        <button class="btns-modal" id="tramitar-prestamo-btn">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-building-bank"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 21l18 0" /><path d="M3 10l18 0" /><path d="M5 6l7 -3l7 3" /><path d="M4 10l0 11" /><path d="M20 10l0 11" /><path d="M8 14l0 3" /><path d="M12 14l0 3" /><path d="M16 14l0 3" /></svg>
                            <span>Tramitar prestamo</span>
                        </button>
                    </div>
                </section>
                <section class="libro-info-container">
                    <div class="titulo-modal-container">
                        <h3 id="libro-titulo"></h3>
                    </div>
                    <div>
                        <h3 class="libro-info-h3" id="libro-autor"></h3>
                    </div>
                    <div class="editorial-modal-container">
                        <h3 class="libro-info-h3" id="libro-editorial"></h3>
                    </div>
                    <div class="categoria-modal-container">
                        <h3 id="libro-categoria"></h3>
                    </div>
                    <div class="sinopsis-modal-container">
                        <p id="libro-sinopsis"></p>
                    </div>
                </section>
            </div>
        </dialog>

    <!-- ---------------------------------------------------------------- -->
    <!-- MODAL TRAMITAR PRESTAMO -->
     <!-- ---------------------------------------------------------------- -->
     <dialog class="modal" id="modal-prestamo">
        <div class="modal-content" id="modal-content-prestamo">
            <div class="info-libro-prestamo">
                <img src="" alt=""
                    class="modal-img-libro"
                    id="imagen-libro-prestamo">
                <h4 id="titulo-libro-prestamo"></h4>
                <h5 id="autor-libro-prestamo"></h5>
            </div>
            <div id="data-container" style="text-align: center; justify-content: center; align-items: center; display: flex; ">
                <form action="" id="form-prestamo" method="post">
                    <h1>Vas a tramitar este libro</h1>
                    <input type="hidden" value="<?php echo $_SESSION['idUsuario']; ?>" id="id-usuario-prestamo-libro" name="id-usuario-prestamo-libro">
                    <input type="hidden" value="6073116330" id="isbn-prestamo-libro" name="isbn-prestamo-libro">
                    <label for="fecha-esperada-entrega">¿Que dia planeas devolver el libro?</label>
                    <input type="date" id="fecha-esperada-entrega-input" name="fecha-esperada-entrega" max="2025-12-31" >
                    <button  id="confirmar-prestamo-btn" class="btns-modal" >Confirmar prestamo</button>
                </form>
                <div id="mensaje-container-prestamo"></div>
            </div>
        </div>
    </dialog>
    <!-- ---------------------------------------------------------------- -->


    <aside class="aside-nav-section">
        <div class="library-title">
            <img src="../../assets/logo1.webp" alt="" id="imgL" />
            <h1>Librería</h1>
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
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-world-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M21 12a9 9 0 1 0 -9 9" /><path d="M3.6 9h16.8" /><path d="M3.6 15h7.9" /><path d="M11.5 3a17 17 0 0 0 0 18" /><path d="M12.5 3a16.984 16.984 0 0 1 2.574 8.62" /><path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M20.2 20.2l1.8 1.8" /></svg>
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
        <section class="recommended-books">
            <header>
                <h1>Recomendados</h1>
            </header>
            <div class="books-container">
                <?php

                require_once '../../db/Database.php';
                $db = new Database();
                $pdo = $db->getConnection();

                $idusuarioactual = "00000001";
                $sql = "SELECT libro FROM recomendados WHERE estudiante = :idusuario";

                $stmt = $pdo->prepare($sql);

                $stmt->bindParam(":idusuario", $idusuarioactual, PDO::PARAM_STR);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if (!empty($result)) {
                    foreach ($result as $row) {
                        $isbn = $row['libro'];

                        $sql_datos_libro = "SELECT isbn,titulo,autor,imagen FROM libros WHERE isbn = :isbn";
                        $stmt_libro = $pdo->prepare($sql_datos_libro);
                        $stmt_libro->bindParam(":isbn", $isbn, PDO::PARAM_STR);
                        $stmt_libro->execute();
                        $libro = $stmt_libro->fetch(PDO::FETCH_ASSOC);

                        if ($libro) {
                            echo '<div class="book-card" id = "' . $libro['isbn'] . '">
                                        <img
                                            src="' . $libro['imagen'] . '"
                                            alt=""
                                            class="img-book-card"
                                        />
                                        <div class="book-card-info-container">
                                            <h4 class="book-name">
                                               ' . $libro['titulo'] . '
                                            </h4>
                                            <h5>' . $libro['autor'] . '</h5>
                                        </div>
                                    </div>';
                        }
                    }
                } else {
                    echo '<h4>No te han recomendado ningun libro</h4>';
                }
                ?>

            </div>
        </section>


    </main>
</body>

</html>