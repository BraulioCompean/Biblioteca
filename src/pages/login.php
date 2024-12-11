<?php
session_start();
include '../db/Database.php'; 
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $rol = $_POST['rol']; 

    if ($rol === "estudiante") {
        $tabla = "estudiantes";
        $dashboard = "../pages/alumno/alumno-principal-page.php";
    } else if ($rol === "profesor") {
        $tabla = "profesores";
        $dashboard = "../pages/profesor/profesor-principal-page.php";
    } else {
        $error = "Rol no reconocido";
        exit();
    }
    $sql = "SELECT * FROM $tabla WHERE correo = :correo";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['correo' => $correo]);

    if ($stmt->rowCount() > 0) {
        $usuarioData = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($contraseña, $usuarioData['password'])) {
            $_SESSION['correo'] = $correo;
            $_SESSION['rol'] = $usuarioData['rol'];
            $_SESSION['idUsuario'] = $usuarioData['id_usuario'];
            $_SESSION['nombres'] = $usuarioData['nombres'];
            $_SESSION['apellidos'] = $usuarioData['apellidos'];

            if($_SESSION['rol'] === "administrador"){
                $dashboard = "../pages/admin/admin-principal-page.php";
            }

            header("Location: $dashboard");
            exit();
        } else {
            $error = "Credenciales incorrectas";
        }
    } else {
        $error = "Credenciales incorrectas";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="icon" href="../assets/logo1.webp" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
    <script>
      function setRole(role) {
        document.getElementById('rol').value = role;
      }
    </script>
</head>
<body>
    <main>
        <div class="contenedor__principal">
            <div class="contenedor__info">
                <h2>Biblioteca</h2>
                <img src="../assets/logo1.webp" alt="Biblioteca">
            </div>
            <div class="contenedor__todo">
                <div class="contenedor__login-register">
                    <form method="POST" action="login.php">
                        <h2>Iniciar sesión</h2>
                        <div class="role-buttons">
                            <button type="button" class="estudiante-btn" onclick="setRole('estudiante')">Estudiante</button>
                            <button type="button" class="profesor-btn" onclick="setRole('profesor')">Profesor</button>
                        </div>
                        <input type="text" name="correo" placeholder="Correo" required>
                        <input type="password" name="contraseña" placeholder="Contraseña" required>
                        <input type="hidden" name="rol" id="rol" value="estudiante">
                        <button type="submit">Iniciar sesión</button>
                    </form>

                    <?php if (!empty($error)) { ?>
                        <script type="text/javascript">
                            alert("<?php echo $error; ?>"); 
                        </script>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>
</body>
</html> -->
