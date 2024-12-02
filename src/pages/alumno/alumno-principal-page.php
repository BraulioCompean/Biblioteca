<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../../styles/alumno/alumno-principal-page.css" />
        <title>Libreria</title>
        <link rel="icon" href="assets/logo1.webp" />
        <script src="../../scripts/alumno/alumno-principal-page.js" defer></script>
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
                        <a href="">
                            <svg id="home-svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-home" > <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <path d="M5 12l-2 0l9 -9l9 9l-2 0" /> <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /> <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /> </svg>
                            <h4>Home</h4>
                        </a>
                    </li>
                    <li class="nav-element" id="recommended-page">
                        <a href="../alumno/alumno-recommended-page.html">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-bookmark-question" > <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <path d="M15 19l-3 -2l-6 4v-14a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v4" /> c <path d="M19 22v.01" /> <path d="M19 19a2.003 2.003 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483" /> </svg> 
                            <h4>Recomendados</h4>
                        </a>
                    </li>
                    <li class="nav-element">
                        <a href="../alumno/alumno-libreria-page.html">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-book" > <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0" /> <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0" /> <path d="M3 6l0 13" /> <path d="M12 6l0 13" /> <path d="M21 6l0 13" /> </svg>
                            <h4>Mi libreria</h4>
                        </a>
                    </li>
                    <li class="nav-element">
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-heart" > <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /> </svg>
                            <h4>Favoritos</h4>
                        </a>
                    </li>
                  
                </ul>
                <hr />
                <ul class="user-menu">
                    <li class="nav-element">
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-logout-2" > <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <path d="M10 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2" /> <path d="M15 12h-12l3 -3" /> <path d="M6 15l-3 -3" /> </svg>
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
                        id="input-search-books"
                    />
                </div>
                <div class="login-section">
                    <button class="login-btn" id="login-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user" > <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /> <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /> </svg>
                        <h3 class="login-link">Usuario Alumno</h3>
                    </button>
                </div>
            </div>
            <div class="recomendados">
                <div class="header-recommended">
                    <h2>Recomendados</h2>
                    <a href="../alumno/alumno-recommended-page.html" id="see-all">
                        Ver todos
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right" > <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <path d="M9 6l6 6l-6 6" /> </svg>
                    </a>
                </div>
                <div class="recommended-books">
                    <div class="book-card">
                        <img
                            src="../../assets/jardinmariposas.jpg"
                            alt=""
                            class="img-book-card"
                        />
                        <div class="book-card-info-container">
                            <h4 class="book-name">
                                El Jardin De Las Mariposas
                            </h4>
                            <h5>Dot Hutchison</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="favorites">
                <div class="favorites-header">
                    <h2>Tus Favoritos</h2>
                   
                </div>
                <div class="favorites-container">


                    <?php
                        
                        require_once '../../db/Database.php';
                        $db = new Database();
                        $pdo = $db->getConnection();

                        $idusuarioactual = "22690128";
                        $sql = "SELECT isbn FROM favoritos WHERE id_usuario = :idusuario";

                        $stmt = $pdo->prepare($sql);

                        $stmt->bindParam(":idusuario",$idusuarioactual,PDO::PARAM_STR);
                        $stmt->execute();

                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        for ($i=0; $i < count($result); $i++) { 
                            $isbn = $result[$i]['isbn'];

                            $sql_datos_libro = "SELECT isbn,titulo,autor,imagen FROM libros WHERE isbn = :isbn LIMIT 5";
                            $stmt_libro = $pdo->prepare($sql_datos_libro);
                            $stmt_libro->bindParam(":isbn",$isbn,PDO::PARAM_STR);
                            $stmt_libro->execute();


                            $libro = $stmt_libro->fetch(PDO::FETCH_ASSOC);

                            if($libro){
                                echo '<div class="book-card" id = "'.$libro['isbn'].'">
                                        <img
                                            src="'. $libro['imagen'] . '"
                                            alt=""
                                            class="img-book-card"
                                        />
                                        <div class="book-card-info-container">
                                            <h4 class="book-name">
                                               '.$libro['titulo'].'
                                            </h4>
                                            <h5>'.$libro['autor'].'</h5>
                                        </div>
                                    </div>';
                            }
                        }

                    ?>
                    <!-- <div class="book-card">
                        <img
                            src="../../assets/jardinmariposas.jpg"
                            alt=""
                            class="img-book-card"
                        />
                        <div class="book-card-info-container">
                            <h4 class="book-name">
                                El Jardin De Las Mariposas
                            </h4>
                            <h5>Dot Hutchison</h5>
                        </div>
                    </div> -->
                </div>
            </div>
        </main>
        <dialog class="modal" id="modal"> 
            <div class="modal-content">
                <section class="image-modal-book-container">
                    <img
                        src="../../assets/jardinmariposas.jpg"
                        class="modal-img-book"
                        alt=""
                        id="modal-img"
                    />
                    <div class="modal-btns-interactive">
                        <button class="btns-modal" id="add-favorites-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-heart" > <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /> </svg>
                            <span>Agregar a Favoritos</span>
                        </button>
                    </div>
                </section>
                <section class="book-info-container">
                    <div class="title-modal-container">
                        <h2>Titulo</h2>
                        <h3 id="book-title">El Jardin De Las Mariposas</h3>
                    </div>
                    <div>
                        <h2>Autor</h2>
                        <h3 class="book-info-h3" id="book-author">Dot Hutchison</h3>
                    </div>
                    <div class="editorial-modal-container">
                        <h2>Editorial</h2>
                        <h3 class="book-info-h3" id="book-editorial">Planeta</h3>
                    </div>

                    <div class="categories-modal-container">
                        <h2>Categoria</h2>
                        <h3 id="book-category">Novela</h3>
                    </div>
                    <div class="synopsis-modal-container">
                        <h2>Sinopsis</h2>
                        <p id="book-synopsis">
                            Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Cras sollicitudin eget dui vel mattis. Mauris
                            dictum urna nulla, in semper quam lobortis quis.
                            Nunc vitae est pulvinar, aliquet magna et, commodo
                            odio. Nam volutpat nec dui at posuere. Quisque
                            pretium turpis sit amet ipsum lobortis, nec congue
                            arcu pulvinar. Suspendisse orci nisi, rhoncus
                            venenatis ultricies sit amet, maximus lobortis
                            velit. Ut quis accumsan felis, quis tincidunt dui.
                            Integer ullamcorper ex commodo risus auctor feugiat.
                            Pellentesque sollicitudin metus vel justo tristique
                            commodo. Morbi lacus neque, rutrum ut ligula eu,
                            ultrices faucibus quam. Sed mollis rhoncus laoreet.
                            Nunc a lectus a ipsum fermentum congue. Nulla vel
                            mollis lorem, id laoreet mauris. Orci varius natoque
                            penatibus et magnis dis parturient montes, nascetur
                            ridiculus mus. Fusce commodo rutrum tortor sed
                            dignissim.
                        </p>
                    </div>
                </section>
            </div>
        </dialog>
    </body>
</html>
