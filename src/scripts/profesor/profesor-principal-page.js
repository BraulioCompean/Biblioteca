// ------------------------------------------------------------------------------------------------
// MODAL -> MOSTRAR LIBRO -> ELEMENTOS -> GENERAL PARA TODOS LOS USUARIOS

const modalMostrarLibro = document.getElementById("modal-libro");
const modalMostrarLibro_imagen = document.getElementById("modal-img-libro");
const modalMostrarLibro_titulo = document.getElementById("libro-titulo");
const modalMostrarLibro_autor = document.getElementById("libro-autor");
const modalMostrarLibro_editorial = document.getElementById("libro-editorial");
const modalMostrarLibro_categoria = document.getElementById("libro-categoria");
const modalMostrarLibro_sinopsis = document.getElementById("libro-sinopsis");

const modalMostrarLibro_isbn = document.getElementById("isbn-modal-mostrar-libro");



// BOOK CARDS

const bookCards = document.querySelectorAll(".book-card")

const cacheInfoLibros = {}


// FUNCION PARA CARGAR CON LOS DATOS DEL LIBRO SELECCIONADO EL MODAL MOSTRAR LIBRO

function actualizarModalMostrarLibro(data) {
    modalMostrarLibro_isbn.value = data.isbn;
    modalMostrarLibro_imagen.setAttribute("src", data.imagen);
    modalMostrarLibro_titulo.innerText = data.titulo;
    modalMostrarLibro_autor.innerText = `Por :  ${data.autor}`;
    modalMostrarLibro_editorial.innerText = `Editorial: ${data.editorial}`;
    modalMostrarLibro_categoria.innerText =`Categoria:  ${data.categoria}`;
    modalMostrarLibro_sinopsis.innerText = data.sinopsis;
    modalMostrarLibro.style.display = "flex";
}


bookCards.forEach((card) => {
    card.addEventListener("click", (event) => {
        const isbnCardBook = event.target.closest(".book-card").id;
        if (cacheInfoLibros[isbnCardBook]) {
            actualizarModalMostrarLibro(cacheInfoLibros[isbnCardBook]);
        } else {
            fetch(`../../db/info-libro.php?isbn=${isbnCardBook}`)
                .then((response) => response.json())
                .then((data) => {
                    actualizarModalMostrarLibro(data);
                    cacheInfoLibros[isbnCardBook] = data;
                })
                .catch((error) => {
                    console.error(
                        "Error al obtener datos de info-libro.php : ",
                        error
                    );
                });
        }
    });
});
// ------------------------------------------------------------------------------------------------
// MODAL RECOMENDAR LIBRO -> ELEMENTS
const modalRecomendarLibro = document.getElementById("modal-recomendar")
const modalRecomendarLibro_isbn = document.getElementById("isbn-recomendar-libro")
const openRecomendarLibro = document.getElementById("recomendar-libro-btn")

const formRecomendar = document.getElementById("form-recomendar")
const confirmarRecomendar = document.getElementById("confirmar-recomendar")
const recomendarRespuestaMensaje = document.getElementById("recomendar-respuesta-mensaje")



// FUNCION PARA ABRIR EL MODAL DE RECOMENDAR<
openRecomendarLibro.addEventListener("click",()=>{
    modalRecomendarLibro_isbn.value = modalMostrarLibro_isbn.value
    modalMostrarLibro.style.display = "none"
    modalRecomendarLibro.style.display = "flex"
})


// FUNCION PARA EL BOTON DE CONFIRMAR RECOMENDACION PARA HACER LA SOLICITUD AL ARCHIVO RECOMENDAR.PHP
confirmarRecomendar.addEventListener("click",async (event)=>{
    event.preventDefault();
    const formDatos = new FormData(formRecomendar)
    try {
        const response = await fetch("../../db/recomendar.php",{
            method: "POST",
            body: formDatos
        })
        if(!response.ok){
            const errorText = await response.text();
            console.error(errorText)
            throw new Error(`Error!: ${response.status}`)
        }

        const data = await response.json();
        console.log(data)
        formRecomendar.style.display = "none";
        if(data.exito){
            recomendarRespuestaMensaje.style.display = "flex"
            recomendarRespuestaMensaje.innerHTML = `<h4 style="color: green;">${data.mensaje}</h4>`

        }else{
            recomendarRespuestaMensaje.style.display = "flex"
            recomendarRespuestaMensaje.innerHTML = `<h4 style="color: red;">${data.mensaje}</h4>`;
        }
    } catch (Error) {
        console.error("Error al recomendar el libro: ",Error)
        formRecomendar.style.display = "none";
        recomendarRespuestaMensaje.innerHTML = `<h4 style="color: red;">Ocurrio un error al intentar recomendar el libro.</h4>`
    }
})

// ------------------------------------------------------------------------------------------------



// ------------------------------------------------------------------------------------------------
// MODAL PRESTAMO -> ELEMETNS

const openTramitarPrestamo = document.getElementById("tramitar-prestamo-btn")

const modalTramitarLibro = document.getElementById("modal-prestamo")
const modalTramitarLibro_imagen = document.getElementById("imagen-libro-prestamo")
const modalTramitarLibro_titulo = document.getElementById("titulo-libro-prestamo")
const modalTramitarLibro_autor = document.getElementById("autor-libro-prestamo")
const modalTramitarLibro_fechaEsperadaEntrega = document.getElementById("fecha-esperada-entrega-input")

const modalTramitarLibro_resultadoMensaje = document.getElementById("mensaje-resultado-prestamo")
const modalTramitarLibro_isbn = document.getElementById("isbn-prestamo-libro");

openTramitarPrestamo.addEventListener("click",()=>{
    modalTramitarLibro_imagen.setAttribute("src",modalMostrarLibro_imagen.src)
    modalTramitarLibro_titulo.innerText = modalMostrarLibro_titulo.innerText
    modalTramitarLibro_autor.innerText = modalMostrarLibro_autor.innerText
    modalTramitarLibro_fechaEsperadaEntrega.min= new Date().toISOString().split("T")[0]
    modalTramitarLibro_isbn.value = modalMostrarLibro_isbn.value

    modalMostrarLibro.style.display = "none"
    modalTramitarLibro.style.display = "flex"
})


const confirmarPrestamo = document.getElementById("confirmar-prestamo-btn")
const formPrestamo = document.getElementById("form-prestamo")
confirmarPrestamo.addEventListener("click",async (event)=>{

    event.preventDefault();
    const formDatos = new FormData(formPrestamo)

    try{
        const response = await fetch("../../db/procesar-prestamo.php",{
            method: "POST",
            body: formDatos
        })
        if(!response.ok){
            throw new Error(`Error!: ${response.status}`);
        }
 
        const data = await response.json();
        formPrestamo.style.display = "none";

        if (data.exito) {
            modalTramitarLibro_resultadoMensaje.style.display = "flex"
            modalTramitarLibro_resultadoMensaje.innerHTML = `<h4 style="color: green;">${data.mensaje}</h4>`;
        } else {
            modalTramitarLibro_resultadoMensaje.style.display = "flex"
            modalTramitarLibro_resultadoMensaje.innerHTML = `<h4 style="color: red;">${data.error}</h4>`;
        }
    } catch(error){
        console.error("Error al procesar el prestamo: ", error);
        formPrestamo.style.display = "none";
        modalTramitarLibro_resultadoMensaje.innerHTML = `<h4 style="color: red;">Ocurrio un error al procesar el prestamo, intentalo otra vez.</h4>`;    }

})


// ------------------------------------------------------------------------------------------------
// SALIDAS DE LOS MODAL
window.addEventListener("click", (event) => {
    switch (event.target) {
        case modalMostrarLibro:
            modalMostrarLibro.style.display = "none";
            break;
        case modalRecomendarLibro:
            modalRecomendarLibro.style.display = "none"
            formRecomendar.style.display = "flex"
            recomendarRespuestaMensaje.style.display = "none"
            recomendarRespuestaMensaje.innerHTML = ""
            break;
        case modalTramitarLibro:
            modalTramitarLibro.style.display = "none"
            formPrestamo.style.display = "flex"
            modalTramitarLibro_resultadoMensaje.innerHTML = ""
            break;
        
    }
});




