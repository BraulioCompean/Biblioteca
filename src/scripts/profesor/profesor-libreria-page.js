// MODAL -> MOSTRAR LIBRO -> ELEMENTOS

const modalMostrarLibro = document.getElementById("modal-libro");
const modalMostrarLibro_imagen = document.getElementById("modal-img-libro");
const modalMostrarLibro_titulo = document.getElementById("libro-titulo");
const modalMostrarLibro_autor = document.getElementById("libro-autor");
const modalMostrarLibro_editorial = document.getElementById("libro-editorial");
const modalMostrarLibro_categoria = document.getElementById("libro-categoria");
const modalMostrarLibro_sinopsis = document.getElementById("libro-sinopsis");

const modalMostrarLibro_isbn = document.getElementById("isbn-modal-mostrar-libro");



// OBTENEMOS TODAS LAS CARDS DE LOS LIBROS

const bookCards = document.querySelectorAll(".book-card")
// OBJETO PARA ALMACENAR LOS DATOS DE LOS LIBROS TEMPORALMENTE, ESTO PARA MEJROAR EL RENDIMIENTO
const cacheInfoLibros = {}


// FUNCION PARA ACTUALIZAR LOS DATOS DEL MODAL MOSTRAR LIBRO CON LOS DATOS DEL LIBRO SELECCIONADO

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

// LE AGREGAMOS UN EVENTLISTENER A CADA BOOK CARD PARA QUE CUANDO SE DE CLICK, TE CARGUE EL MODAL MOSTRAR LIBRO CON SUS RESPECTIVOS DATOS
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




// MODAL DEVOLVER LIBRO


const modalDevolverLibro = document.getElementById("modal-devolver-libro"); //MODAL DEVOLVER LIBRO
const devolverLibroBtn = document.getElementById("devolver-libro-btn"); //BOTON PARA ABRIR EL MODAL DEVOLVER LIBRO
const isbnDevolverLibroModal = document.getElementById( //INPUT PARA ALMACENAR EL ISBN DEL LIBRO A DEVOLVER
    "isbn-devolver-libro-modal"
);


devolverLibroBtn.addEventListener("click", () => { // FUNCION PARA ABRIR EL MODAL DEVOLVER LIBRO
    modalMostrarLibro.style.display = "none"; 
    isbnDevolverLibroModal.value = modalMostrarLibro_isbn.value;
    modalDevolverLibro.style.display = "flex";
});


const confirmarDevolverLibroBtn = document.getElementById("confirmar-devolver-btn")
const formDevolverLibro = document.getElementById("form-devolver-libro")
const containerMensajeDevolverLibro = document.getElementById("container-mensaje-devolver-libro")
const formContainerDevolverLibro = document.getElementById("form-container-devolver-libro")


const cancelarDevolverLibroBtn = document.getElementById("cancelar-devolver-btn")
cancelarDevolverLibroBtn.addEventListener("click",()=>{
    modalDevolverLibro.style.display = "none"
})
 

confirmarDevolverLibroBtn.addEventListener("click",async (event)=>{
    event.preventDefault();

    const formDatos = new FormData(formDevolverLibro)

    try {
        const response = await fetch("../../db/devolver-libro.php",{
            method : "POST",
            body: formDatos,
        })
        if(!response.ok){
            throw new Error(`Error!: ${response.status}`);

        }
        console.log(response)
        const data  =await response.json();

        if(data.exito){
            formContainerDevolverLibro.style.display = "none"
            containerMensajeDevolverLibro.style.display = "flex"
            containerMensajeDevolverLibro.innerHTML = `<h4 style="color: green;">${data.mensaje}</h4>`;
        }else{
            formContainerDevolverLibro.style.display = "none"
            containerMensajeDevolverLibro.style.display = "flex"
            containerMensajeDevolverLibro.innerHTML = `<h4 style="color: red;">${data.mensaje}</h4>`;
        }
    } catch (Error) {
        console.error("Error al devolver el libro: ",Error)
        formContainerDevolverLibro.style.display = "none";
        containerMensajeDevolverLibro.style.display = "flex"
        containerMensajeDevolverLibro.innerHTML = `<h4 style="color: red;">Ocurrio un error el intentar devolver el libro.</h4>`;
    }
})



window.addEventListener("click", (event) => {
    switch (event.target) {
        case modalMostrarLibro:
            modalMostrarLibro.style.display = "none";
            break;
        case modalDevolverLibro:
            modalDevolverLibro.style.display = "none"
            formContainerDevolverLibro.style.display = "flex";
            containerMensajeDevolverLibro.style.display = "none"
            break;
    }
});
