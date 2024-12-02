<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login / Register</title>

    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="../styles/login.css" />
  </head>
  <body>
    <main>
      <div class="contenedor__todo">
        <div class="caja__trasera">
          <div class="caja__trasera-login">
            <h3>¿Ya tienes una cuenta?</h3>
            <p>Inicia sesión para entrar en la página</p>
            <button id="btn__iniciar-sesion">Iniciar Sesión</button>
          </div>
          <div class="caja__trasera-register">
            <h3>¿Aún no tienes una cuenta?</h3>
            <p>Regístrate para que puedas iniciar sesión</p>
            <button id="btn__registrarse">Regístrarse</button>
          </div>
        </div>

        <!--formulario de Login y registro-->
        <div class="contenedor__login-register">
          <!--login-->
          <form action="" class="formulario__login">
            <h2>Iniciar Sesión</h2>
            <input type="text" placeholder="Correo Electronico" />
            <input type="password" placeholder="Contraseña" />
            <button>Entrar</button>
          </form>

          <!--registro-->
          <form action="" class="formulario__register">
            <h2>Regístrarse</h2>
            <input type="text" placeholder="Nombre" />
            <input type="text" placeholder="Apellido" />
            <input type="text" placeholder="Matrícula" />
            <input type="text" placeholder="Correo Electrónico" />
            <input type="text" placeholder="Usuario" />
            <input type="password" placeholder="Contraseña" />
            <input type="text" placeholder="Número de Teléfono" />
            <input type="text" placeholder="Dirección" />
            <select placeholder="Rol" id="rol">
              <option value="usuario">Usuario</option>
              <option value="admin">Administrador</option>
              <option value="editor">Editor</option>
            </select>            
            <button>Regístrarse</button>
          </form>
        </div>
      </div>
    </main>

    <script src="../scripts/login.js"></script>
  </body>
</html>