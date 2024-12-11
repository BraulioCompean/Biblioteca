<?php include '../sesion.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
        rel="stylesheet"
        href="../../styles/admin/admin-principal-page.css" />
    <title>Principal</title>
    <link rel="icon" href="assets/logo1.webp" />
    <script src="../../scripts/admin/admin-principal-page.js" defer></script>
</head>

<body>


    <dialog class="modal" id="modal-agregar-libro">
        <div class="modal-content" id="modal-content-agregar-libro">
            <form action=""  id="form-agregar-libro" method="post">
                <div class="container-input">
                    <label for="titulo-libro">Titulo del Libro</label>
                    <input type="text"
                        id="titulo-libro"
                        name="titulo-libro" />
                </div>

                <div class="container-input">
                    <label for=" autor-libro">Autor del Libro</label>
                    <input type="text"
                        id="autor-libro"
                        name="autor-libro" />
                </div>
                <div class="container-input">
                    <label for=" isbn-libro">ISBN</label>
                    <input type="text"
                        name="isbn-libro"
                        id="isbn-libro" />
                </div>
                <div class="container-input">
                    <label for=" url-cover-libro">URL Portada</label>
                    <input
                        type="url"
                        name="url-cover-libro"
                        id="url-cover-libro" />
                </div>
                <div class="container-input">
                    <label for=" editorial-libro">Editorial</label>
                    <input
                        type="text"
                        name="editorial-libro"
                        id="editorial-libro" />
                </div>
                <div class="container-input">
                    <label for="">Año de Publicacion</label>
                    <input
                        type=" number"
                        name="anio-publicacion-libro"
                        id="anio-publicacion-libro" />
                </div>
                <div class="container-input">
                    <label for=" cantidad-disponibles-libro">Cantidad disponible</label>
                    <input
                        type="number"
                        name="cantidad-disponibles-libro"
                        id="cantidad-disponibles-libro" />
                </div>
                <div class="container-input">
                    <label for=" categoria-libro">Categoria</label>
                    <input
                        type="text"
                        name="categoria-libro"
                        id="categoria-libro" />
                </div>
                <div class="container-input">
                    <label for=" numero-paginas-libro">Numero de paginas</label>
                    <input type="text" name="numero-paginas-libro" id="numero-paginas-libro">
                </div>
                <div class="container-input">
                    <label for=" sinopsis-libro">Sinopsis</label>
                    <textarea
                        name="sinopsis-libro"
                        id="sinopsis-libro"></textarea>
                </div>
                <button id="confirmar-agregar-libro" class="btns-modal" value="form1">Enviar
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-send-2">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4.698 4.034l16.302 7.966l-16.302 7.966a.503 .503 0 0 1 -.546 -.124a.555 .555 0 0 1 -.12 -.568l2.468 -7.274l-2.468 -7.274a.555 .555 0 0 1 .12 -.568a.503 .503 0 0 1 .546 -.124z" />
                        <path d="M6.5 12h14.5" />
                    </svg>
                </button>
            </form>
            <div id="agregar-libro-mensaje">

            </div>
        </div>
    </dialog>
    <dialog class="modal" id="modal-borrar-libro">
        <div class="modal-content">
            <div id="busqueda">
                <form class="search-libro-eliminar" id="form-search-libro-eliminar">
                    <label for="">Buscar libro a eliminar(ISBN)</label>
                    <input type="text" id="search-libro-borrar" name="search-libro-borrar-isbn">
                </form>
                <button id="buscar-libro-eliminar-btn" value="form2" class="btns-modal">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                    Buscar
                </button>
                <div id="busqueda-libro-eliminar-mensaje"></div>
            </div>
            <div id="datos-libro-eliminar" style="display: none;">
                <h1>Estas a punto de eliminar este libro del sistema</h1>
                <form action="">
                    <input type="hidden" id="isbn-libro-eliminar">
                </form>
                <div class="info-libro">
                    <img src="" alt="" id="imagen-eliminar">
                    <h4 id="titulo-eliminar"></h4>
                    <h4 id="autor-eliminar"></h4>
                </div>
            </div>
        </div>
    </dialog>
    <dialog class="modal" id="modal-opciones-registrar-usuario">
        <div class="modal-content-opciones-registrar-usuario">
            <h2>¿Que clase de Usuario desea registrar?</h2>
            <div id="container-btns-opciones-registrar">
                <button id="estudiante">Estudiante</button>
                <button id="profesor">Profesor</button>
            </div>
        </div>
    </dialog>
    <dialog class="modal" id="modal-registrar-usuario-estudiante">
        <div class="modal-content-registrar-usuario-estudiante">
            <h2>Registrar estudiante</h2>
            <form action="">
                <label for="">Nombre</label>
                <input type="text" name="nombre-estudiante" id="nombre-estudiante">
                <label for="">Apellidos</label>
                <input type="text" name="apellidos-estudiante" id="apellidos-estudiante">
                <label for="">Correo</label>
                <input type="email" name="correo-estudiante" id="correo-estudiante">
                <label for="">Telefono</label>
                <input type="tel" name="telefono-estudiante" id="telefono-estudiante">
                <label for="">Direccion</label>
                <input type="text" name="direccion-estudiante" id="direccion-estudiante">
                <label for="">Carrera</label>
                <input type="text" name="carrera-estudiante" id="carrera-estudiante">
                <label for="">Semestre</label>
                <input type="number" name="semestre-estudiante" id="semestre-estudiante">
                <label for="">Contraseña</label>
                <input type="password" name="contraseña-estudiante" id="contraseña-estudiante">
            </form>
            <button id="registrar-estudiante-btn">Registrar</button>
        </div>
    </dialog>
    <dialog class="modal" id="modal-registrar-usuario-profesor">
        <div class="modal-content-registrar-usuario-profesor">
            <h2>Registrar profesor</h2>
            <form action="">
                <label for="">Nombre</label>
                <input type="text" name="nombre-profesor" id="nombre-profesor">
                <label for="">Apellidos</label>
                <input type="text" name="apellidos-profesor" id="apellidos-profesor">
                <label for="">Correo</label>
                <input type="email" name="correo-profesor" id="correo-profesor">
                <label for="">Telefono</label>
                <input type="tel" name="telefono-profesor" id="telefono-profesor">
                <label for="">Direccion</label>
                <input type="text" name="direccion-profesor" id="direccion-profesor">
                <label for="">Rol</label>
                <input type="text" name="rol-profesor" id="rol-profesor">
                <label for="">Departamento</label>
                <input type="number" name="departamento-profesor" id="departamento-profesor">
                <label for="">Contraseña</label>
                <input type="password" name="contraseña-profesor" id="contraseña-profesor">
            </form>
            <button id="registrar-profesor-btn">Registrar</button>
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
                    <a href="../admin/admin-prestamos-page.php">
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
                    <a href="../admin/admin-multas-page.php">
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
                    <a href="../login.php  ">
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
        <header class="principal-page-header">
            <h2>Instituto Tecnologico De Ciudad Valles</h2>
            <a href="" class="perfil-usuario-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                </svg>
                <h3 id="header-user-name">
                    <h3 id="header-user-name">
                        <?php
                        require_once '../../db/Database.php';
                        try {
                            $db = new Database();
                            $pdo = $db->getConnection();
                            $idUsuario = $_SESSION['idUsuario'];
                            $sql = "SELECT nombres,apellidos FROM profesores WHERE id_usuario = :idUsuario";

                            $stmt = $pdo->prepare($sql);
                            $stmt->bindParam(":idUsuario", $idUsuario, PDO::PARAM_STR);
                            $stmt->execute();
                            $result = $stmt->fetch(PDO::FETCH_ASSOC);

                            if ($result) {
                                echo $result['nombres'] . " " . $result['apellidos'];
                            } else {
                                echo "Sin nombre";
                            }
                        } catch (PDOException $e) {
                            echo 'Sin nombre';
                        }
                        ?>

                    </h3>
                </h3>
            </a>
        </header>
        <nav class="opciones-navegar-principal">
            <div class="agregar-libros navegar-card">
                <div class="header-agregar-libros navegar-card-header">
                    <h2>Agregar Libro</h2>
                    <button id="agregar-libro" class="navegar-card-btns">
                        Agregar
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                    </button>
                </div>
                <p>Añade libros al catalogo</p>
            </div>
            <div class="eliminar-libros navegar-card">
                <div class="header-eliminar-libros navegar-card-header">
                    <h2>Eliminar Libro</h2>
                    <button id="eliminar" class="navegar-card-btns">
                        Eliminar
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 7l16 0" />
                            <path d="M10 11l0 6" />
                            <path d="M14 11l0 6" />
                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                        </svg>
                    </button>
                </div>
                <p>
                    Elimina libros del catalogo
                </p>
            </div>

            <div class="registrar-usuarios navegar-card">
                <div class="header-registrar-usuarios  navegar-card-header">
                    <h2>Registrar Usuario</h2>
                    <button id="registrar" class="navegar-card-btns">
                        Registrar
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-plus">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                            <path d="M16 19h6" />
                            <path d="M19 16v6" />
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                        </svg>
                    </button>
                </div>
                <p>
                    Registra a usuarios (alumnos , profesores) en el sistema
                </p>
            </div>
        </nav>
    </main>



</body>

</html>