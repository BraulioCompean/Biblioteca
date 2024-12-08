<?php
session_start();
$_SESSION['idUsuario'] = "00000001";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../../styles/alumno/alumno-libreria-page.css">
    <script src="../../scripts/alumno/alumno-libreria-page.js" defer></script>
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
                    <button class="btns-modal" id="devolver-libro-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-back-up">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 14l-4 -4l4 -4" />
                            <path d="M5 10h11a4 4 0 1 1 0 8h-1" />
                        </svg>
                        <span>Devolver libro</span>
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

    <dialog class="modal" id="modal-devolver-libro">
        <div class="modal-content" id="modal-content-devolver">
            <div id="form-container-devolver-libro">
                <h2>¿Estas seguro que deseas devolver este libro?</h2>
                <form action="../../db/devolver-libro.php" id="form-devolver-libro" method="post">
                    <input type="hidden" id="isbn-devolver-libro-modal" name="isbn-devolver-libro">
                    <input type="hidden" id="id-usuario-devolver-libro" name="id-usuario-devolver-libro" value="<?php echo $_SESSION['idUsuario']; ?>">
                    <button class="btn-devolver-prestamo" id="confirmar-devolver-btn">Confirmar</button>
                    <button class="btn-devolver-prestamo" id="cancelar-devolver-btn">Cancelar</button>
                </form>
            </div>
            <div id="container-mensaje-devolver-libro">
            </div>
        </div>
        <div id="container-mensaje-devolver-libro">

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
                <li class="nav-element" id="recommended-page">
                    <a href="../alumno/alumno-recommended-page.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-bookmark-question">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M15 19l-3 -2l-6 4v-14a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v4" /> c
                            <path d="M19 22v.01" />
                            <path d="M19 19a2.003 2.003 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483" />
                        </svg>
                        <h4>Recomendados</h4>
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
                    <a href="../alumno/alumno-historial-prestamos-page.php">
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
                    <a href="">
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
        <section class="mi-libreria">
            <header>
                <h1>Mi libreria</h1>
            </header>
            <div class="books-container">
                <?php

                require_once '../../db/Database.php';
                $db = new Database();
                $pdo = $db->getConnection();
                $idUsuario = $_SESSION['idUsuario'];
                // $idusuarioactual = "00000001";
                $sql = "SELECT isbn FROM prestamos WHERE id_estudiante = :idusuario AND fecha_entrega IS NULL LIMIT 5";

                $stmt = $pdo->prepare($sql);

                $stmt->bindParam(":idusuario", $idUsuario, PDO::PARAM_STR);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if (count($result) > 0) {

                    for ($i = 0; $i < count($result); $i++) {
                        $isbn = $result[$i]['isbn'];

                        $sql_datos_libro = "SELECT isbn,titulo,autor,imagen FROM libros WHERE isbn = :isbn LIMIT 5";
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
                    echo '<h4 style>No haz añadido ningun libro a tu libreria</h4>';
                }

                ?>

            </div>
        </section>


    </main>
</body>

</html>