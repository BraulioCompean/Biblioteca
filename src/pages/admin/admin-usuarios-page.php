
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
        rel="stylesheet"
        href="../../styles/admin/admin-usuarios-page.css" />
    <title>Principal</title>
    <link rel="icon" href="assets/logo1.webp" />
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