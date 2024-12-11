<?php include '../sesion.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
        rel="stylesheet"
        href="../../styles/admin/admin-usuarios-page.css" />
    <title>Principal</title>
    <link rel="icon" href="../../assets/logo1.webp" />
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
                    <a href="">
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
        <section class="lista-usuarios">
            <header class="principal-page-header">
                <h2>Lista de Usuarios</h2>
            </header>
            <div class="usuarios-container">
                 <?php
                    require_once '../../db/Database.php';
                    try {

                        $db = new Database();
                        $pdo = $db->getConnection();
                        $sqlProfesores = "SELECT id_usuario ,nombres,apellidos , rol FROM profesores";

                        $stmt = $pdo->prepare($sqlProfesores);


                        $stmt->execute();
                        
                        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        if (count($resultados) > 0) {
                            foreach ($resultados as $resultado) {
                                $rol;
                                if($resultado['rol'] == "profesor"){
                                    $rol = "Profesor";
                                }else{
                                    $rol = "Administrador";
                                }                             
                                echo "<div class='usuario-card {$resultado['rol']}'>
                                            <div class='img-usuario-container'>
                                                <img src='../../assets/{$resultado['rol']}.png'  class='img-usuario'>
                                            </div>
                                            <div class='info-usuario-card'>
                                                <h4>{$resultado['id_usuario']}</h4>
                                                <h4>{$resultado['nombres']}</h4>
                                                <h4>{$rol}</h4>
                                            </div>
                                        </div>";
                            }
                        }
                        $sqlEstudiantes ="SELECT id_usuario ,nombres,apellidos FROM estudiantes";
                        $stmtEstudiantes = $pdo->prepare($sqlEstudiantes);

                        $stmtEstudiantes->execute();

                        $resultadosEstudiantes = $stmtEstudiantes->fetchAll(PDO::FETCH_ASSOC);
                        if(count($resultados)>0){
                            foreach ($resultadosEstudiantes as $resultadoEstudiante) {
                                $rol = "Estudiante";
                                echo "<div class='usuario-card estudiante'>
                                            <div class='img-usuario-container'>
                                                <img src='../../assets/student.png'  class='img-usuario'>
                                            </div>
                                            <div class='info-usuario-card'>
                                                <h4>{$resultadoEstudiante['id_usuario']}</h4>
                                                <h4>{$resultadoEstudiante['nombres']}</h4>
                                                <h4>{$rol}</h4>
                                            </div>
                                    </div>";
                            }
                        }

                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                    ?> 
                
            </div>
        </section>

    </main>



</body>

</html>