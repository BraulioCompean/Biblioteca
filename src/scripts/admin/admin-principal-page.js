const modalAgregarLibro = document.getElementById("modal-agregar-libro")

const openModalAgregarLibro = document.getElementById("agregar-libro")
const modalAgregarLibro_mensaje = document.getElementById("agregar-libro-mensaje")

const confirmarAgregarLibro = document.getElementById("confirmar-agregar-libro")

const formAgregarLibro = document.getElementById("form-agregar-libro")

openModalAgregarLibro.addEventListener("click",()=>{
    modalAgregarLibro.style.display = "flex"
})


confirmarAgregarLibro.addEventListener("click",async(event)=>{
    event.preventDefault();
    const formDatos = new FormData(formAgregarLibro)

    try{
        const response = await fetch("../../db/agregar-libro.php",{
            method: "POST",
            body: formDatos
        })
        if(!response.ok){
            throw new Error(`Error!: ${response.status}`);
        }
        
        const data = await response.json();
        formAgregarLibro.style.display = "none";

        if (data.exito) {
            modalAgregarLibro_mensaje.style.display = "flex"
            modalAgregarLibro_mensaje.innerHTML = `<h4 style="color: green;">${data.mensaje}</h4>`;
        } else {
            modalAgregarLibro_mensaje.style.display = "flex"
            modalAgregarLibro_mensaje.innerHTML = `<h4 style="color: red;">${data.mensaje}</h4>`;
        }
    } catch(error){
        console.error("Error al procesar el prestamo: ", error);
        formAgregarLibro.style.display = "none";
        modalAgregarLibro_mensaje.innerHTML = `<h4 style="color: red;">Ocurrio un error al procesar el prestamo, intentalo otra vez.</h4>`;    }
        
})



// MODAL REGISTRAR USUARIOS-OPCIONES
const modalRegistrarUsuariosOpciones = document.getElementById("modal-opciones-registrar-usuario")

const openModalRegistrarUsuariosOpciones = document.getElementById("registrar")
openModalRegistrarUsuariosOpciones.addEventListener("click",()=>{
    modalRegistrarUsuariosOpciones.style.display = "flex"
})



// MODAL REGISTRAR PROFESORES

const modalRegistrarProfesores = document.getElementById("modal-registrar-usuario-profesor")
const openModalRegistrarProfesores = document.getElementById("profesor")

openModalRegistrarProfesores.addEventListener("click",()=>{
    modalRegistrarUsuariosOpciones.style.display = "none"
    modalRegistrarProfesores.style.display = "flex"
})


const confirmarRegistrarProfesores = document.getElementById("registrar-profesor-btn")
const formRegistrarProfesores = document.getElementById("form-registrar-profesor")
const registrarProfesoresMensaje = document.getElementById("mensaje-registrar-profesor")


confirmarRegistrarProfesores.addEventListener("click",async(event)=>{
    event.preventDefault();
    const formDatos = new FormData(formRegistrarProfesores)

    try{
        const response = await fetch("../../db/registrar-usuario-profesor.php",{
            method: "POST",
            body: formDatos
        })
        if(!response.ok){
            throw new Error(`Error!: ${response.status}`);
        }
        
        const data = await response.json();
        formRegistrarProfesores.style.display = "none";

        if (data.exito) {
            registrarProfesoresMensaje.style.display = "flex"
            confirmarRegistrarProfesores.style.display = "none"
            registrarProfesoresMensaje.innerHTML = `<h4 style="color: green;">${data.mensaje}</h4>`;
        } else {
            registrarProfesoresMensaje.style.display = "flex"
            confirmarRegistrarProfesores.style.display = "none"
            registrarProfesoresMensaje.innerHTML = `<h4 style="color: red;">${data.mensaje}</h4>`;
        }
    } catch(error){
        console.error("Error al procesar el prestamo: ", error);
        formAgregarLibro.style.display = "none";
        registrarProfesoresMensaje.innerHTML = `<h4 style="color: red;">Ocurrio un error al procesar el prestamo, intentalo otra vez.</h4>`;    }
        
})


// MODAL REGISTRAR ESTUDIANTES 

const modalRegistrarEstudiantes = document.getElementById("modal-registrar-usuario-estudiante")
const openModalRegistrarEstudiantes = document.getElementById("estudiante")

openModalRegistrarEstudiantes.addEventListener("click",()=>{
    modalRegistrarEstudiantes.style.display = "flex"
    modalRegistrarUsuariosOpciones.style.display = "none"

})


const confirmarRegistrarEstudiante = document.getElementById("registrar-estudiante-btn")
const formRegistrarEstudiante = document.getElementById("form-registrar-estudiante")
const registrarEstudianteMensaje = document.getElementById("mensaje-registrar-estudiante")

confirmarRegistrarEstudiante.addEventListener("click",async(event)=>{
    event.preventDefault();
    const formDatos = new FormData(formRegistrarEstudiante)

    try{
        const response = await fetch("../../db/registrar-usuario-estudiante.php",{
            method: "POST",
            body: formDatos
        })
        if(!response.ok){
            throw new Error(`Error!: ${response.status}`);
        }
        console.log("asdasd")
        const data = await response.json();
        formRegistrarEstudiante.style.display = "none";

        if (data.exito) {
            registrarEstudianteMensaje.style.display = "flex"
            confirmarRegistrarEstudiante.style.display = "none"
            registrarEstudianteMensaje.innerHTML = `<h4 style="color: green;">${data.mensaje}</h4>`;
        } else {
            registrarEstudianteMensaje.style.display = "flex"
            confirmarRegistrarEstudiante.style.display = "none"
            registrarEstudianteMensaje.innerHTML = `<h4 style="color: red;">${data.mensaje}</h4>`;
        }
    } catch(error){
        console.error("Error al procesar el prestamo: ", error);
        formAgregarLibro.style.display = "none";
        registrarEstudianteMensaje.innerHTML = `<h4 style="color: red;">Ocurrio un error al procesar el prestamo, intentalo otra vez.</h4>`;    }
        
})


window.addEventListener("click", (event) => {
    switch (event.target) {
        case modalAgregarLibro:
            modalAgregarLibro.style.display = "none";
            formAgregarLibro.style.display ="flex"
            modalAgregarLibro_mensaje.innerHTML = ""
            break;
        case modalRegistrarUsuariosOpciones:
            modalRegistrarUsuariosOpciones.style.display = "none"
            break
        case modalRegistrarProfesores:
            modalRegistrarProfesores.style.display = "none"
            formRegistrarProfesores.style.display = "flex"
            registrarProfesoresMensaje.innerHTML = ""
            registrarProfesoresMensaje.style.display  = "none"
            confirmarRegistrarProfesores.style.display = "flex"

            break;
        case modalRegistrarEstudiantes:
            modalRegistrarEstudiantes.style.display = "none"
            formRegistrarEstudiante.style.display = "flex"
            registrarEstudianteMensaje.innerHTML = ""
            registrarEstudianteMensaje.style.display  = "none"
            confirmarRegistrarEstudiante.style.display = "flex"
    }
});
