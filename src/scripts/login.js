//funciones ejecutando
document
  .getElementById("btn__iniciar-sesion")
  .addEventListener("click", iniciarSesion);
document.getElementById("btn__registrarse").addEventListener("click", register);
window.addEventListener("resize", anchoPage);

var formulario_login = document.querySelector(".formulario__login");
var formulario_register = document.querySelector(".formulario__register");
var contenedor_login_register = document.querySelector(
  ".contenedor__login-register"
);
var caja_trasera_login = document.querySelector(".caja__trasera-login");
var caja_trasera_register = document.querySelector(".caja__trasera-register");

//transicin

function anchoPage() {
  if (window.innerWidth > 850) {
    caja_trasera_register.style.display = "block";
    caja_trasera_login.style.display = "block";
  } else {
    caja_trasera_register.style.display = "block";
    caja_trasera_register.style.opacity = "1";
    caja_trasera_login.style.display = "none";
    formulario_login.style.display = "block";
    contenedor_login_register.style.left = "0px";
    formulario_register.style.display = "none";
  }
}

anchoPage();

function iniciarSesion() {
  if (window.innerWidth > 850) {
    formulario_login.style.display = "block";
    contenedor_login_register.style.left = "10px";
    formulario_register.style.display = "none";
    caja_trasera_register.style.opacity = "1";
    caja_trasera_login.style.opacity = "0";
  } else {
    formulario_login.style.display = "block";
    contenedor_login_register.style.left = "0px";
    formulario_register.style.display = "none";
    caja_trasera_register.style.display = "block";
    caja_trasera_login.style.display = "none";
  }
}

function register() {
  if (window.innerWidth > 850) {
    formulario_register.style.display = "block";
    contenedor_login_register.style.left = "410px";
    formulario_login.style.display = "none";
    caja_trasera_register.style.opacity = "0";
    caja_trasera_login.style.opacity = "1";
  } else {
    formulario_register.style.display = "block";
    contenedor_login_register.style.left = "0px";
    formulario_login.style.display = "none";
    caja_trasera_register.style.display = "none";
    caja_trasera_login.style.display = "block";
    caja_trasera_login.style.opacity = "1";
  }
}


// Mostrar datos del formulario de inicio de sesión
document.querySelector(".formulario__login button").addEventListener("click", (e) => {
  e.preventDefault();

  // Capturamos los valores de los inputs del formulario de login
  const correo = document.querySelector(".formulario__login input[type=text]").value;
  const contrasena = document.querySelector(".formulario__login input[type=password]").value;

  // Mostramos los datos en la consola o en la página
  console.log("Datos de Inicio de Sesión:");
  console.log(`Correo Electrónico: ${correo}`);
  console.log(`Contraseña: ${contrasena}`);

  alert(`Datos ingresados:\nCorreo Electrónico: ${correo}\nContraseña: ${contrasena}`);
});

// Mostrar datos del formulario de registro
document.querySelector(".formulario__register button").addEventListener("click", (e) => {
  e.preventDefault();

  // Capturamos los valores de los inputs del formulario de registro
  const nombre = document.querySelector(".formulario__register input[placeholder='Nombre']").value;
  const apellido = document.querySelector(".formulario__register input[placeholder='Apellido']").value;
  const matricula = document.querySelector(".formulario__register input[placeholder='Matrícula']").value;
  const correo = document.querySelector(".formulario__register input[placeholder='Correo Electrónico']").value;
  const usuario = document.querySelector(".formulario__register input[placeholder='Usuario']").value;
  const contrasena = document.querySelector(".formulario__register input[placeholder='Contraseña']").value;
  const telefono = document.querySelector(".formulario__register input[placeholder='Número de Teléfono']").value;
  const direccion = document.querySelector(".formulario__register input[placeholder='Dirección']").value;
  const rol = document.getElementById("rol").value;

  // Mostramos los datos en la consola o en la página
  console.log("Datos de Registro:");
  console.log(`Nombre: ${nombre}`);
  console.log(`Apellido: ${apellido}`);
  console.log(`Matrícula: ${matricula}`);
  console.log(`Correo Electrónico: ${correo}`);
  console.log(`Usuario: ${usuario}`);
  console.log(`Contraseña: ${contrasena}`);
  console.log(`Teléfono: ${telefono}`);
  console.log(`Dirección: ${direccion}`);
  console.log(`Rol: ${rol}`);

  alert(
    `Datos ingresados:\nNombre: ${nombre}\nApellido: ${apellido}\nMatrícula: ${matricula}\nCorreo Electrónico: ${correo}\nUsuario: ${usuario}\nContraseña: ${contrasena}\nTeléfono: ${telefono}\nDirección: ${direccion}\nRol: ${rol}`
  );
});
