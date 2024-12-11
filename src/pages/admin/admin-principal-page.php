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
    <link rel="icon" href="../../assets/logo1.webp" />
    <script src="../../scripts/admin/admin-principal-page.js" defer></script>
</head>

<body>


    <dialog class="modal" id="modal-agregar-libro">
        <div class="modal-content" id="modal-content-agregar-libro">
            <form action="" id="form-agregar-libro" method="post">
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
            </form>
            <button id="confirmar-agregar-libro" class="btns-modal" value="form1">
                Enviar
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-send-2">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M4.698 4.034l16.302 7.966l-16.302 7.966a.503 .503 0 0 1 -.546 -.124a.555 .555 0 0 1 -.12 -.568l2.468 -7.274l-2.468 -7.274a.555 .555 0 0 1 .12 -.568a.503 .503 0 0 1 .546 -.124z" />
                    <path d="M6.5 12h14.5" />
                </svg>
            </button>
            <div id="agregar-libro-mensaje">

            </div>
        </div>
    </dialog>
    
    <dialog class="modal" id="modal-opciones-registrar-usuario">
        <div class="modal-content" id="modal-content-opciones-registrar">
            <h2>¿Que clase de Usuario desea registrar?</h2>
            <div id="container-btns-opciones-registrar">
                <button id="estudiante" class="btns-modal">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-vocabulary"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 19h-6a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1h6a2 2 0 0 1 2 2a2 2 0 0 1 2 -2h6a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-6a2 2 0 0 0 -2 2a2 2 0 0 0 -2 -2z" /><path d="M12 5v16" /><path d="M7 7h1" /><path d="M7 11h1" /><path d="M16 7h1" /><path d="M16 11h1" /><path d="M16 15h1" /></svg>    
                Estudiante</button>
                <button id="profesor" class="btns-modal">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-briefcase"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" /><path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2" /><path d="M12 12l0 .01" /><path d="M3 13a20 20 0 0 0 18 0" /></svg>    
                Profesor</button>
            </div>
        </div>
    </dialog>
    <dialog class="modal" id="modal-registrar-usuario-estudiante">
        <div class="modal-content" id="modal-content-registrar-estudiante">
            <h2>Registrar estudiante</h2>
            <div id="mensaje-registrar-estudiante"></div>
            <form action="../../db/registrar-usuario-estudiante.php" id="form-registrar-estudiante" method="post">
                <label for="">Numero de control</label>
                <input type="text" name="numero-control" maxlength="8">
                <label for="">Nombre</label>
                <input type="text" name="nombre-estudiante" id="nombre-estudiante">
                <label for="">Apellidos</label>
                <input type="text" name="apellidos-estudiante" id="apellidos-estudiante">
                <label for="">Correo</label>
                <input type="email" name="correo-estudiante" id="correo-estudiante">
                <label for="">Telefono</label>
                <input type="tel" name="telefono-estudiante" id="telefono-estudiante" maxlength="10">
                <label for="">Direccion</label>
                <input type="text" name="direccion-estudiante" id="direccion-estudiante">
                <label for="">Carrera</label>
                <input type="text" name="carrera-estudiante" id="carrera-estudiante">
                <label for="">Semestre</label>
                <input type="number" name="semestre-estudiante" id="semestre-estudiante">
                <label for="">Contraseña</label>
                <input type="password" name="contraseña-estudiante" id="contraseña-estudiante">
            </form>
            <button id="registrar-estudiante-btn" class="btns-modal">Registrar
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-telegram"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" /></svg>

            </button>
        </div>
    </dialog>
    <dialog class="modal" id="modal-registrar-usuario-profesor">
        <div class="modal-content" id="modal-content-registrar-profesor">
            <h2>Registrar profesor</h2>
            <div id="mensaje-registrar-profesor"></div>
            <form action="" id="form-registrar-profesor" method="post">
                <label for="">Numero de Control</label>
                <input type="text" maxlength="8" name="numero-control" id="numero-control">
                <label for="">Nombre</label>
                <input type="text" name="nombre-profesor" id="nombre-profesor">
                <label for="">Apellidos</label>
                <input type="text" name="apellidos-profesor" id="apellidos-profesor">
                <label for="">Correo</label>
                <input type="email" name="correo-profesor" id="correo-profesor">
                <label for="">Telefono</label>
                <input type="tel" name="telefono-profesor" id="telefono-profesor" maxlength="10">
                <label for="">Direccion</label>
                <input type="text" name="direccion-profesor" id="direccion-profesor">
                <label for="">Rol</label>
                <input type="text" name="rol-profesor" id="rol-profesor">
                <label for="">Departamento</label>
                <input type="text" name="departamento-profesor" id="departamento-profesor">
                <label for="">Contraseña</label>
                <input type="password" name="contraseña-profesor" id="contraseña-profesor">
            </form>
            <button id="registrar-profesor-btn" class="btns-modal">
                Registrar
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-telegram"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" /></svg>
            </button>
        </div>
    </dialog>

    <aside class="aside-nav-section">
        <div class="library-title">
            <img src="../../assets/logo1.webp" alt="" id="imgL" />
            <h1>Biblioteca</h1>
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
                    <a href="../admin/admin-usuarios-page.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-users">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                        </svg>
                        <h4>Usuarios</h4>
                    </a>
                </li>
                <li class="nav-element">
                    <a href="../admin/admin-explorar-page.php">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-world-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M21 12a9 9 0 1 0 -9 9" /><path d="M3.6 9h16.8" /><path d="M3.6 15h7.9" /><path d="M11.5 3a17 17 0 0 0 0 18" /><path d="M12.5 3a16.984 16.984 0 0 1 2.574 8.62" /><path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M20.2 20.2l1.8 1.8" /></svg>
                        <h4>Explorar</h4>
                    </a>
                </li>
            </ul>
            <hr />
            <ul class="user-menu">
                <li class="nav-element">
                    <a href="../admin/admin-perfil-page.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                        </svg>
                        <h4>Perfil</h4>
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
                    Registra a usuarios ( Estudiantes , Profesores ) en el sistema
                </p>
            </div>
        </nav>
    </main>



</body>

</html>