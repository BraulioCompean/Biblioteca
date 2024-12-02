<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
        rel="stylesheet"
        href="../../styles/admin/admin-principal-page.css" />
    <title>Libreria</title>
    <link rel="icon" href="assets/logo1.webp" />
    <script src="../../scripts/admin/admin-principal-page.js" defer></script>
</head>

<body>
    <aside class="aside-nav-section">
        <div class="library-title">
            <img src="../../assets/logo1.webp" alt="" id="imgL" />
            <h1>Librería</h1>
        </div>
        <nav class="nav-section">
            <ul class="nav-options-list">
                <li class="nav-element">
                    <a href="../../pages/admin/admin-principal-page.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-home">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                        </svg>
                        <h4>Home</h4>
                    </a>
                </li>
                <li class="nav-element">
                    <a href="../admin/admin-prestamos-page.html">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-books">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 4m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                            <path d="M9 4m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                            <path d="M5 8h4" />
                            <path d="M9 16h4" />
                            <path d="M13.803 4.56l2.184 -.53c.562 -.135 1.133 .19 1.282 .732l3.695 13.418a1.02 1.02 0 0 1 -.634 1.219l-.133 .041l-2.184 .53c-.562 .135 -1.133 -.19 -1.282 -.732l-3.695 -13.418a1.02 1.02 0 0 1 .634 -1.219l.133 -.041z" />
                            <path d="M14 9l4 -1" />
                            <path d="M16 16l3.923 -.98" />
                        </svg>
                        <h4>Prestamos</h4>
                    </a>
                </li>
                <li class="nav-element">
                    <a href="../admin/admin-multas-page.html">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-report-money">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                            <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                            <path d="M14 11h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" />
                            <path d="M12 17v1m0 -8v1" />
                        </svg>
                        <h4>Multas</h4>
                    </a>
                </li>
            </ul>
            <hr />
            <ul class="user-menu">
                <li class="nav-element">
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-settings">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                            <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                        </svg>
                        <h4>Configuración</h4>
                    </a>
                </li>
                <li class="nav-element">
                    <a href="../login.html">
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
            <div class="search-container">
                <input
                    type="text"
                    placeholder="Buscar libros"
                    id="input-search-books" />
            </div>
            <div class="login-section">
                <button class="login-btn" id="login-container">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    </svg>
                    <h3 class="login-link">Iniciar Sesión</h3>
                </button>
            </div>
        </div>
        <div class="agregar-libros">
            <div class="header-agregar-libros">
                <h2>Agregar Libro</h2>
                <button id="agregar">
                    <h3>Agregar</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 5l0 14" />
                        <path d="M5 12l14 0" />
                    </svg>
                </button>
            </div>
            <p>Añade libros al catalogo</p>
        </div>

        <?php

        $dsn = "pgsql:host=ep-quiet-frost-a5om3mkk.us-east-2.aws.neon.tech;port=5432;dbname=neondb;sslmode=require";
        $user = "neondb_owner";
        $password = "eHsJkUPn41Wm";



        try {
            $pdo = new PDO($dsn, $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

                $sql = "INSERT INTO libros (isbn,titulo,autor,editorial,cantidad,categoria,imagen,sinopsis,num_pag,anio_pub) VALUES (:isbn,:titulo,:autor,:editorial,:cantidad,:categoria,:imagen,:sinopsis,:num_pag,:anio_pub)";
                $stmt = $pdo->prepare($sql);

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

                $stmt->execute();
            };
        } catch (PDOException $e) {
            echo "ERROR : " . $e->getMessage();
        }


        ?>


    </main>

        
    <dialog class="modal" id="modal">
        <div class="modal-content">
            <form action="" class="form-add-book" method="post">
                <label for="titulo-libro">Titulo del Libro</label>
                <input type="text"
                    id="titulo-libro"
                    name="titulo-libro" />
                <label for="autor-libro">Autor del Libro</label>
                <input type="text"
                    id="autor-libro"
                    name="autor-libro" />
                <label for="isbn-libro">ISBN</label>
                <input type="number"
                    name="isbn-libro"
                    id="isbn-libro" />
                <label for="url-cover-libro">URL Portada</label>
                <input
                    type="url"
                    name="url-cover-libro"
                    id="url-cover-libro" />
                <label for="editorial-libro">Editorial</label>
                <input
                    type="text"
                    name="editorial-libro"
                    id="editorial-libro" />
                <label for="">Año de Publicacion</label>
                <input
                    type="number"
                    name="anio-publicacion-libro"
                    id="anio-publicacion-libro" />
                <label for="cantidad-disponibles-libro">Cantidad disponible</label>
                <input
                    type="number"
                    name="cantidad-disponibles-libro"
                    id="cantidad-disponibles-libro" />
                <label for="categoria-libro">Categoria</label>
                <input
                    type="text"
                    name="categoria-libro"
                    id="categoria-libro" />
                <label for="numero-paginas-libro">Numero de paginas</label>
                <input type="text" name="numero-paginas-libro" id="numero-paginas-libro">
                <label for="sinopsis-libro">Sinopsis</label>
                <textarea
                    name="sinopsis-libro"
                    id="sinopsis-libro"></textarea>
                <button>Enviar</button>
            </form>
            


        </div>
    </dialog>
</body>

</html>