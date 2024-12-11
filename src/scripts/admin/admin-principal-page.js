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




// ------------------------------------------------------------------------------------------------------------------
// MODAL ELIMINAR LIBRO
// ------------------------------------------------------------------------------------------------------------------
const modalEliminarLibro = document.getElementById("modal-borrar-libro")
const openModalEliminarLibro = document.getElementById("eliminar")
const modalEliminarLibro_busqueda = document.getElementById("busqueda")
const modalEliminarLibro_formBuscar = document.getElementById("form-search-libro-eliminar")
const modalEliminarLibro_buscarBtn = document.getElementById("buscar-libro-eliminar-btn")

const modalEliminarLibro_buscarMensaje = document.getElementById("busqueda-libro-eliminar-mensaje")

const modalEliminarLibro_mostrarLibro = document.getElementById("datos-libro-eliminar")

// ELEMENTOS DENTRO DEL CONTENEDOR DATOS-LIBRO-ELIMINAR


const modalEliminarLibro_mostrarLibro_imagen = document.getElementById("imagen-eliminar")
const modalEliminarLibro_mostrarLibro_autor = document.getElementById("autor-eliminar")
const modalEliminarLibro_mostrarLibro_itulo =document.getElementById("titulo-eliminar")
const containerFormBuscarEliminar = document.getElementById("busqueda")
// 
modalEliminarLibro_buscarBtn.addEventListener("click",async(event)=>{
    event.preventDefault()

    const formDatos = new FormData(modalEliminarLibro_formBuscar)
    try{
        const response = await fetch("../../db/info-libro.php",{
            method : "POST",
            body: formDatos
        })
        if(!response.ok){
            throw new Error(`Error!: ${response.status}`);
            
        }
        const data = await response.json()
        if(data.exito){
            modalEliminarLibro_formBuscar.style.display = "none"
            modalEliminarLibro_mostrarLibro.style.display = "flex"
        }else{
            containerFormBuscarEliminar.style.display = "none"
            modalEliminarLibro_buscarMensaje.innerHTML = `<h4 style="color: red;">${data.mensaje}</h4>`
        }
    }catch(error){
        console.error(error)
        modalEliminarLibro_buscarMensaje.innerHTML = `<h4 style="color: red;">${error}</h4>`

    }
})

openModalEliminarLibro.addEventListener("click",()=>{
    modalEliminarLibro.style.display = "flex"
})

window.addEventListener("click", (event) => {
    switch (event.target) {
        case modalAgregarLibro:
            modalAgregarLibro.style.display = "none";
            formAgregarLibro.style.display ="flex"
            modalAgregarLibro_mensaje.innerHTML = ""
            break;
        case modalEliminarLibro:
            modalEliminarLibro.style.display = "none"
            break;
    }
});
