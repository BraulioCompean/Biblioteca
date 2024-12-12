<?php include '../sesion.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta
        name="viewport"
        content="width=
    , initial-scale=1.0" />
    <link rel="stylesheet" href="../../styles/admin/admin-perfil-page.css" />
    <link rel="icon" href="../../assets/logo1.webp" />
    <title>Perfil</title>
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
    <section class="perfil">
            <header class="header-perfil">
                <h1>Bienvenido a tu Perfil</h1>
            </header>
            <div class="perfil-container">
                

                <?php 

                        require_once '../../db/Database.php';
                        $db = new Database();
                        $pdo = $db->getConnection();
                        $idUsuario = $_SESSION['idUsuario']; //Obtenemos el id del usuario actual
                        try {
                            //Instruccion sql para buscar la informacion del usuario actual
                            $sql = "SELECT id_usuario,nombres,apellidos,correo,telefono,direccion,rol,departamento FROM profesores WHERE id_usuario = :idUsuario";
                            $stmt = $pdo->prepare($sql);
    
                            $stmt->bindParam(":idUsuario", $idUsuario, PDO::PARAM_STR);
                            $stmt->execute();
    
                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                            if ($result) { //Si el usuario se encontro, esta sera la estructura de su perfil , con los datos recopilados
                                        echo '<div class="general-info-container">
                                                <img src="../../assets/user.png" alt="" class="usuario-imagen">
                                                <h3 title="Nombre del Usuario"> '.$result['nombres']. " " .$result['apellidos'].'</h3>
                                                <div class="info">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-mail">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                                                        <path d="M3 7l9 6l9 -6" />
                                                    </svg>
    
                                                    <h3>'.$result['correo'].'</h3>
                                                </div>
                                                <div class="telefono-usuario info">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-phone">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                                                    </svg>
                                                    <h3>'.$result['telefono'].'</h3>
                                                </div>
                                            </div>
                                            <div class="informacion">
                                                <header class="informacion-header">
                                                    <h1>Informacion</h1>
                                                </header>
                                                <div class="informacion-container">
                                                    <div class="info">
                                                        <h3>Numero de Control : </h3>
                                                        <h3>'.$result['id_usuario'].'</h3>
                                                    </div>
                                                    <div class="info">
                                                        <h3>Direccion : </h3>
                                                        <h3>'.$result['direccion'].'</h3>
                                                    </div>
                                                    <div class="info">
                                                        <h3>Rol : </h3>
                                                        <h3>'.$result['rol'].'</h3>
                                                    </div>
                                                    <div class="info">
                                                        <h3>Departamento : </h3>
                                                        <h3>'.$result['departamento'].'</h3>
                                                    </div>
                                                </div>
                                            </div>';
                                    
                            } else { //En caso de que no encuentre ningun registro , mostrara el siguiente mensaje
                                echo '<h1>No se pudo cargar la informacion del usuario</h1>';
                            }
                        } catch (PDOException $e) { //En caso de que el try catch atrape un error , mostrara este mensaje
                            echo '<h1>No se pudo cargar la informacion del usuario</h1>';

                        }   
                        ?> 

            </div>
        </section>


    </main>
</body>

</html>