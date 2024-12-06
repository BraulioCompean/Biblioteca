const añadirBtn = document.getElementById("agregar")
const eliminarBtn = document.getElementById("eliminar")
const registrarBtn = document.getElementById("registrar")

const estudianteBtn = document.getElementById("estudiante")
const profesorBtn = document.getElementById("profesor")


const modalAddBook = document.getElementById("modal-add-book")
const modalDeleteBook = document.getElementById("modal-delete-book")
const buscarLibroDeleteBtn = document.getElementById("buscar-libro-delete-btn")
const modalShowInfoDeleteBook = document.getElementById("modal-show-info-delete-book")
const modalOpcionesRegistrarUsuario = document.getElementById("modal-opciones-registrar-usuario")
const modalRegistrarUsuarioEstudiante = document.getElementById("modal-registrar-usuario-estudiante")
const modalRegistrarUsuarioProfesor = document.getElementById("modal-registrar-usuario-profesor")


estudianteBtn.addEventListener("click",()=>{
    modalOpcionesRegistrarUsuario.style.display = "none"
    modalRegistrarUsuarioEstudiante.style.display = "flex"
})

profesorBtn.addEventListener("click",()=>{
    modalOpcionesRegistrarUsuario.style.display = "none"
    modalRegistrarUsuarioProfesor.style.display = "flex"
})
registrarBtn.addEventListener("click",()=>{
    modalOpcionesRegistrarUsuario.style.display = "flex"
})


eliminarBtn.addEventListener("click",()=>{
    modalDeleteBook.style.display = "flex"
})
añadirBtn.addEventListener("click",()=>{
    modalAddBook.style.display = "flex"
})
window.addEventListener("click" ,function(event){
    if(event.target === modalAddBook){
        modalAddBook.style.display =  "none"
    }
    if(event.target === modalDeleteBook){
        modalDeleteBook.style.display =  "none"
    }
    if(event.target  === modalShowInfoDeleteBook){
        modalShowInfoDeleteBook.style.display = "none"
    }
    if(event.target === modalOpcionesRegistrarUsuario){
        modalOpcionesRegistrarUsuario.style.display = "none"
    }
    if(event.target === modalRegistrarUsuarioEstudiante){
        modalRegistrarUsuarioEstudiante.style.display = "none"
    }
    if(event.target === modalRegistrarUsuarioProfesor){
        modalRegistrarUsuarioProfesor.style.display = "none"
    }
})

buscarLibroDeleteBtn.addEventListener("click",()=>{
    modalDeleteBook.style.display = "none"
    modalShowInfoDeleteBook.style.display = "flex"
})  